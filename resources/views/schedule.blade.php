@extends('layouts.app')

@section('title', 'Your Academic Schedule')

@section('content')
    <div class="schedule-overview">
        <h2 class="mb-4">Your Academic Schedule</h2>

        <!-- Search Bar and View Toggle -->
        <div class="mb-4 d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div class="input-group" style="max-width: 400px;">
                <input type="text" class="form-control" id="scheduleSearch" placeholder="Search schedules..."
                    aria-label="Search schedules">
                <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </span>
            </div>
            <div>
                <button class="btn btn-outline-primary btn-sm me-2" onclick="toggleView('table')">Table View</button>
                <button class="btn btn-outline-primary btn-sm" onclick="toggleView('cards')">Cards View</button>
            </div>
        </div>

        <!-- Tabs for Duration -->
        <ul class="nav nav-tabs mb-4" id="durationTabs" role="tablist">
            @foreach (['1 Month' => 'One Month', '4 Months' => '04 Month', '6 Months' => '06 Month'] as $displayDuration => $dbDuration)
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $loop->first ? 'active' : '' }}"
                        id="{{ str_replace(' ', '-', $displayDuration) }}-tab" data-bs-toggle="tab"
                        data-bs-target="#{{ str_replace(' ', '-', $displayDuration) }}" type="button" role="tab"
                        aria-controls="{{ str_replace(' ', '-', $displayDuration) }}"
                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $displayDuration }}</button>
                </li>
            @endforeach
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="durationTabContent">
            @foreach (['1 Month' => 'One Month', '4 Months' => '04 Month', '6 Months' => '06 Month'] as $displayDuration => $dbDuration)
                @php
                    $schedules = \App\Models\Schedule::with('course')
                        ->whereHas('course', function ($query) use ($dbDuration) {
                            $query->where('duration', $dbDuration);
                        })
                        ->get();
                @endphp
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                    id="{{ str_replace(' ', '-', $displayDuration) }}" role="tabpanel"
                    aria-labelledby="{{ str_replace(' ', '-', $displayDuration) }}-tab">
                    <!-- Table View -->
                    <div class="schedule-table" style="display: block;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Course Name</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Timing (Mon-Fri)</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $schedule)
                                    <tr class="schedule-item" data-name="{{ strtolower($schedule->course->name) }}">
                                        <td>{{ $schedule->course->name }}</td>
                                        <td>{{ $schedule->course->code }}</td>
                                        <td>{{ $schedule->timing === '--/--/----' ? 'TBD' : $schedule->timing }}</td>
                                        <td>
                                            @if ($schedule->highlight)
                                                <span class="badge bg-primary">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Pending</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Cards View -->
                    <div class="schedule-cards" style="display: none;">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                            @foreach ($schedules as $schedule)
                                <div class="col schedule-item" data-name="{{ strtolower($schedule->course->name) }}">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="card-title {{ $schedule->highlight ? 'fw-bold' : '' }}">
                                                {{ $schedule->course->name }}</h5>
                                            <p class="card-text">
                                                <strong>Code:</strong> {{ $schedule->course->code }}<br>
                                                <strong>Timing (Mon-Fri):</strong>
                                                {{ $schedule->timing === '--/--/----' ? 'TBD' : $schedule->timing }}<br>
                                                <strong>Status:</strong>
                                                @if ($schedule->highlight)
                                                    <span class="badge bg-primary">Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Pending</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Calendar View -->
                    <h3 class="mt-5 mb-3">Weekly Calendar ({{ $displayDuration }})</h3>
                    <div class="calendar-view">
                        <div class="row g-2">
                            @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'] as $day)
                                <div class="col-md-2 col-12">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white text-center">{{ $day }}
                                        </div>
                                        <div class="card-body p-2">
                                            @foreach ($schedules->where('highlight', true) as $schedule)
                                                @if ($schedule->timing !== '--/--/----')
                                                    <div class="mb-1 small">
                                                        <span class="fw-bold">{{ $schedule->timing }}</span><br>
                                                        {{ Str::limit($schedule->course->name, 20) }}
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
