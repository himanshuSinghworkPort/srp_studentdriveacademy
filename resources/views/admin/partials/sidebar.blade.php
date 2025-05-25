<div class="sidebar d-flex flex-column p-3" id="sidebar">
    <h4 class="text-white mb-4">Student Management</h4>
    <nav class="nav flex-column">
        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
            href="{{ route('admin.dashboard') }}">
            <i class="fas fa-home me-2"></i> Dashboard
        </a>
        <a class="nav-link" href="#"><i class="fas fa-user-graduate me-2"></i> Students</a>
        <a class="nav-link" href="#"><i class="fas fa-book me-2"></i> Courses</a>
        <a class="nav-link" href="#"><i class="fas fa-clipboard-check me-2"></i> Grades</a>
        <a class="nav-link {{ request()->routeIs('admin.resources') ? 'active' : '' }}"
            href="{{ route('admin.resources') }}">
            <i class="fas fa-file-alt me-2"></i> Resources
        </a><a class="nav-link" href="#"><i class="fas fa-chart-pie me-2"></i> Reports</a>
        <a class="nav-link" href="#"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
    </nav>
</div>
