@extends('layouts.app')

@section('title', 'Courses Overview')

@section('content')
    <div class="courses-overview">
        <h2 class="mb-4">Courses Overview</h2>

        <!-- Search Bar -->
        <div class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" id="courseSearch" placeholder="Search courses..." aria-label="Search courses">
                <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </span>
            </div>
        </div>

        <!-- Available Courses -->
        <h3 class="mb-3">Available Courses</h3>
        <div class="accordion" id="coursesAccordion">
            @foreach(['1 Month' => 'One Month', '4 Months' => '04 Month', '6 Months' => '06 Month'] as $displayDuration => $dbDuration)
                @php
                    $courses = \App\Models\Course::where('duration', $dbDuration)->get();
                @endphp
                @if($courses->isNotEmpty())
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ str_replace(' ', '', $displayDuration) }}">
                            <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ str_replace(' ', '', $displayDuration) }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapse{{ str_replace(' ', '', $displayDuration) }}">
                                {{ $displayDuration }} Courses
                            </button>
                        </h2>
                        <div id="collapse{{ str_replace(' ', '', $displayDuration) }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="heading{{ str_replace(' ', '', $displayDuration) }}" data-bs-parent="#coursesAccordion">
                            <div class="accordion-body">
                                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 courses-list">
                                    @foreach($courses as $course)
                                        <div class="col course-item" data-name="{{ strtolower($course->name) }}">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                    <p class="card-text">
                                                        <strong>Code:</strong> {{ $course->code }}<br>
                                                        <strong>Duration:</strong> {{ $displayDuration }}
                                                    </p>
                                                    <div class="d-flex flex-wrap gap-2">
                                                        <form action="{{ route('enroll', $course->code) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary btn-sm">Enroll</button>
                                                        </form>
                                                        <a href="{{ route('quotes', $course->code) }}" class="btn btn-outline-primary btn-sm">Get Quote</a>
                                                        @if($course->extra_buttons)
                                                            <button onclick="viewCourseModule('{{ $course->code }}')" class="btn btn-outline-secondary btn-sm">View Modules PDF</button>
                                                            <button onclick="buyCoursePDF('{{ $course->code }}')" class="btn btn-outline-secondary btn-sm">Buy Modules PDF</button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <!-- Your Courses -->
        <h3 class="mt-5 mb-3">Your Courses</h3>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach([
                ['name' => 'Machine Learning', 'id' => 'ML201'],
                ['name' => 'Artificial Intelligence', 'id' => 'AI301']
            ] as $course)
                <div class="col">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">{{ $course['name'] }}</h5>
                            <a href="{{ route('access-course', $course['id']) }}" class="btn btn-primary btn-sm">Access Course</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
