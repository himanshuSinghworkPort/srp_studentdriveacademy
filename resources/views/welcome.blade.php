@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="dashboard-overview">
        <!-- Welcome Banner -->
        <div class="card mb-4 bg-primary text-white">
            <div class="card-body">
                <h2 class="card-title mb-0">Welcome, {{ auth()->user()->name }}!</h2>
                <p class="card-text">Your one-stop portal for managing all your academic resources. Access courses, schedules, and study materials below.</p>
            </div>
        </div>

        <!-- Search Bar -->
        <div class="mb-4">
            <div class="input-group" style="max-width: 400px;">
                <input type="text" class="form-control" id="dashboardSearch" placeholder="Search courses or resources..." aria-label="Search courses or resources">
                <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </span>
            </div>
        </div>

        <!-- Summary Widget -->
        <div class="row mb-4">
            <div class="col-md-6 col-lg-3 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Enrolled Courses</h5>
                        <p class="card-text display-6">{{ \App\Models\Course::count() > 0 ? 2 : 0 }}</p> <!-- Placeholder: Replace with dynamic count -->
                        <a href="{{ route('courses') }}" class="btn btn-primary btn-sm">View Courses</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Upcoming Events</h5>
                        <p class="card-text display-6">{{ \App\Models\Event::where('event_date', '>=', now())->count() }}</p>
                        <a href="#events" class="btn btn-primary btn-sm">View Events</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Links -->
        <h3 class="mb-3">Quick Links</h3>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-4">
            @foreach([
                ['title' => 'Courses', 'desc' => 'View and enroll in courses.', 'icon' => 'book', 'route' => 'courses'],
                ['title' => 'Schedule', 'desc' => 'Check classes and deadlines.', 'icon' => 'calendar', 'route' => 'schedule'],
                ['title' => 'Resources', 'desc' => 'Access learning materials.', 'icon' => 'file-earmark-text', 'route' => 'resources'],
                ['title' => 'Profile', 'desc' => 'Update your information.', 'icon' => 'person', 'route' => 'profile.edit'],
            ] as $link)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#2563eb" class="bi bi-{{ $link['icon'] }} mb-2" viewBox="0 0 16 16">
                                @if($link['icon'] === 'book')
                                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                                @elseif($link['icon'] === 'calendar')
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                @elseif($link['icon'] === 'file-earmark-text')
                                    <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
                                    <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                                @elseif($link['icon'] === 'person')
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                @endif
                            </svg>
                            <h5 class="card-title">{{ $link['title'] }}</h5>
                            <p class="card-text">{{ $link['desc'] }}</p>
                            <a href="{{ route($link['route']) }}" class="btn btn-primary btn-sm">Go to {{ $link['title'] }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Announcements -->
        <h3 class="mb-3">Announcements</h3>
        @php
            $announcements = \App\Models\Announcement::orderBy('created_at', 'desc')->take(3)->get();
        @endphp
        @if($announcements->isEmpty())
            <div class="card mb-4">
                <div class="card-body">
                    <p class="card-text text-muted">No new announcements.</p>
                </div>
            </div>
        @else
            <div class="row row-cols-1 row-cols-md-2 g-4 mb-4">
                @foreach($announcements as $announcement)
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $announcement->title }}</h5>
                                <p class="card-text announcement-text" style="max-height: 4.5rem; overflow: hidden;">
                                    {{ Str::limit($announcement->description, 100) }}
                                </p>
                                <p class="card-text"><small class="text-muted">Posted on {{ $announcement->created_at->format('M d, Y') }}</small></p>
                                @if(strlen($announcement->description) > 100)
                                    <button class="btn btn-link btn-sm read-more" data-full-text="{{ $announcement->description }}">Read More</button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Upcoming Events -->
        <h3 class="mb-3" id="events">Upcoming Events</h3>
        @php
            $events = \App\Models\Event::where('event_date', '>=', now())->orderBy('event_date')->take(3)->get();
        @endphp
        @if($events->isEmpty())
            <div class="card">
                <div class="card-body">
                    <p class="card-text text-muted">No upcoming events.</p>
                </div>
            </div>
        @else
            <div class="row row-cols-1 row-cols-md-2 g-4">
                @foreach($events as $event)
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $event->title }}</h5>
                                <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                                <p class="card-text"><strong>Date:</strong> {{ $event->event_date->format('M d, Y') }}</p>
                                <button class="btn btn-primary btn-sm">Register</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
