@extends('layouts.app')

@section('title', 'Educational Resources')

@section('content')
    <div class="resources-overview">
        <h2 class="mb-4">Educational Resources</h2>

        <!-- Search Bar -->
        <div class="mb-4">
            <div class="input-group" style="max-width: 400px;">
                <input type="text" class="form-control" id="resourceSearch" placeholder="Search resources..." aria-label="Search resources">
                <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </span>
            </div>
        </div>

        <!-- Tabs for Duration -->
        <ul class="nav nav-tabs mb-4" id="durationTabs" role="tablist">
            @foreach(['1 Month' => 'One Month', '4 Months' => '04 Month', '6 Months' => '06 Month'] as $displayDuration => $dbDuration)
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{ str_replace(' ', '-', $displayDuration) }}-tab" data-bs-toggle="tab" data-bs-target="#{{ str_replace(' ', '-', $displayDuration) }}" type="button" role="tab" aria-controls="{{ str_replace(' ', '-', $displayDuration) }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $displayDuration }}</button>
                </li>
            @endforeach
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="durationTabContent">
            @foreach(['1 Month' => 'One Month', '4 Months' => '04 Month', '6 Months' => '06 Month'] as $displayDuration => $dbDuration)
                @php
                    $resources = \App\Models\Resource::with('course')
                        ->whereHas('course', function ($query) use ($dbDuration) {
                            $query->where('duration', $dbDuration);
                        })
                        ->orderBy('name')
                        ->get();
                @endphp
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ str_replace(' ', '-', $displayDuration) }}" role="tabpanel" aria-labelledby="{{ str_replace(' ', '-', $displayDuration) }}-tab">
                    @if($resources->isEmpty())
                        <p class="text-muted">No resources available for {{ $displayDuration }} courses.</p>
                    @else
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                            @foreach($resources as $resource)
                                <div class="col resource-item" data-name="{{ strtolower($resource->name) }}">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-2">
                                                @if($resource->file_type === 'pdf')
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#dc3545" class="bi bi-file-earmark-pdf me-2" viewBox="0 0 16 16">
                                                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                                        <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.054.765.113 1.19.206.142.035.283.068.412.092a.757.757 0 0 1 .592.545c.033.22-.003.447-.136.606-.133.166-.358.297-.608.302a2.888 2.888 0 0 1-.695-.055 5.4 5.4 0 0 0-1.066-.167 6.647 6.647 0 0 0-1.166-.208 6.67 6.67 0 0 0-1.147.404c-.136.082-.295.175-.473.283a2.686 2.686 0 0 0-.66.44c-.204.161-.364.316-.475.417-.114.1-.194.177-.252.216a.81.81 0 0 1-.436.119zm2.46-7.858c-.042.006-.085.009-.127.009a.738.738 0 0 0-.458.144c-.137.108-.324.284-.393.478a2.097 2.097 0 0 0-.015.606c.022.203.098.404.23.566a1.351 1.351 0 0 0 .766.346c.155.027.316.04.477.04.65 0 1.058-.606.936-1.243a1.323 1.323 0 0 0-.416-.695 1.234 1.234 0 0 0-.77-.255zm-2.56 5.795c-.117.048-.24.085-.363.111-.145.03-.294.047-.44.05-.39.008-.753-.117-.996-.34-.112-.103-.18-.22-.207-.34-.027-.12-.006-.247.06-.363.092-.159.255-.28.462-.346a1.88 1.88 0 0 1 .596-.096c.152-.006.304.008.451.04.222.048.435.127.628.235.165.092.305.208.412.34.107.13.171.28.171.44 0 .165-.068.325-.2.44-.132.116-.31.184-.494.208-.083.01-.167.013-.25.011zm4.746 1.548a2.07 2.07 0 0 0 .576.098c.216-.01.416-.094.543-.238.127-.144.178-.33.136-.515-.042-.186-.15-.35-.304-.463a1.85 1.85 0 0 0-.496-.258 2.47 2.47 0 0 0-.578-.098c-.304-.015-.59.058-.815.204-.225.147-.375.37-.412.615-.037.245.048.493.227.666.18.174.44.27.723.267.135-.002.27-.026.4-.078z"/>
                                                    </svg>
                                                @elseif($resource->file_type === 'mp4')
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#0d6efd" class="bi bi-file-earmark-play me-2" viewBox="0 0 16 16">
                                                        <path d="M6 6.883v4.234a.5.5 0 0 0 .757.429l3.528-2.117a.5.5 0 0 0 0-.858L6.757 6.454a.5.5 0 0 0-.757.429z"/>
                                                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                                    </svg>
                                                @endif
                                                <h5 class="card-title mb-0">{{ $resource->name }}</h5>
                                            </div>
                                            <p class="card-text">
                                                <strong>Course:</strong> {{ $resource->course->name }}<br>
                                                <strong>Type:</strong> {{ strtoupper($resource->file_type) }}<br>
                                                <strong>Size:</strong> {{ $resource->file_size }} MB
                                            </p>
                                            <a href="{{ asset($resource->file_path) }}" target="_blank" class="btn btn-primary btn-sm" onclick="trackDownload('{{ $resource->id }}')">
                                                Download
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
