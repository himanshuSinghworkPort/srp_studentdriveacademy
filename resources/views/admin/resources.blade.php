<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Student Management System - Resources</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f9;
            overscroll-behavior: none;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #1a2b4b;
            color: #ffffff;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            transition: transform 0.3s ease-in-out;
            z-index: 1000;
        }
        .sidebar.hidden {
            transform: translateX(-100%);
        }
        .sidebar .nav-link {
            color: #a3bffa;
            padding: 0.75rem 1rem;
            border-radius: 0.25rem;
            margin: 0.2rem 0;
            touch-action: manipulation;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background-color: #2b3e6b;
            color: #ffffff;
        }
        .content {
            margin-left: 250px;
            padding: 1.5rem;
            transition: margin-left 0.3s ease-in-out;
        }
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 900;
        }
        .card {
            border: none;
            border-radius: 0.75rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .table {
            background-color: #ffffff;
            border-radius: 0.5rem;
            overflow: hidden;
        }
        .sidebar-toggle {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
        }
        .nav-tabs .nav-link {
            border-radius: 0.5rem 0.5rem 0 0;
        }
        .tab-content {
            background-color: #ffffff;
            border-radius: 0 0 0.5rem 0.5rem;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .content {
                margin-left: 0;
            }
            .sidebar-toggle {
                display: block;
            }
        }
        @media (max-width: 576px) {
            .content {
                padding: 1rem;
            }
            .card {
                margin-bottom: 1rem;
            }
            .table {
                font-size: 0.9rem;
            }
        }
        @media (max-width: 400px) {
            .table {
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
@include('admin.partials.sidebar')
    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg p-3">
            <div class="container-fluid">
                <i class="fas fa-bars sidebar-toggle me-3" id="sidebarToggle"></i>
                <h5 class="navbar-brand mb-0">Resources Management</h5>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-bell"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-user-circle"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Resources Content -->
        <div class="container-fluid mt-4">
            <div class="card">
                <div class="card-body">
                    <!-- Tabs -->
                    <ul class="nav nav-tabs" id="resourceTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="upload-tab" data-bs-toggle="tab" data-bs-target="#upload" type="button" role="tab" aria-controls="upload" aria-selected="true">Upload Resource</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="manage-tab" data-bs-toggle="tab" data-bs-target="#manage" type="button" role="tab" aria-controls="manage" aria-selected="false">Manage Resources</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="resourceTabContent">
                        <!-- Upload Resource Tab -->
                        <div class="tab-pane fade show active" id="upload" role="tabpanel" aria-labelledby="upload-tab">
                            <h5 class="mt-3 mb-4">Upload New Resource</h5>
                            <form action="{{ route('admin.resources.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="course_id" class="form-label">Course</label>
                                    <select class="form-select" id="course_id" name="course_id" required>
                                        <option value="">Select a course</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Resource Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="file" class="form-label">Upload File</label>
                                    <input type="file" class="form-control" id="file" name="file" accept=".pdf,.doc,.docx,.txt" required>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-upload me-2"></i>Upload</button>
                            </form>
                        </div>
                        <!-- Manage Resources Tab -->
                        <div class="tab-pane fade" id="manage" role="tabpanel" aria-labelledby="manage-tab">
                            <h5 class="mt-3 mb-4">Manage Resources</h5>
                            <div class="table-responsive">
                                <table id="resourceTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Course</th>
                                            <th scope="col">File</th>
                                            <th scope="col">File Type</th>
                                            <th scope="col">File Size</th>
                                            <th scope="col">Uploaded At</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($resources as $resource)
                                            <tr>
                                                <td>{{ $resource->id }}</td>
                                                <td>{{ $resource->name }}</td>
                                                <td>{{ $resource->course ? $resource->course->name : 'N/A' }}</td>
                                                <td><a href="{{ asset('storage/' . $resource->file_path) }}" target="_blank">{{ basename($resource->file_path) }}</a></td>
                                                <td>{{ $resource->file_type }}</td>
                                                <td>{{ number_format($resource->file_size / 1024, 2) }} KB</td>
                                                <td>{{ $resource->created_at->format('Y-m-d H:i') }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary edit-resource me-1" data-id="{{ $resource->id }}" data-name="{{ $resource->name }}" data-course-id="{{ $resource->course_id }}" data-bs-toggle="modal" data-bs-target="#editResourceModal"><i class="fas fa-edit"></i></button>
                                                    <form action="{{ route('admin.resources.destroy', $resource->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this resource?')"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Resource Modal -->
        <div class="modal fade" id="editResourceModal" tabindex="-1" aria-labelledby="editResourceModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editResourceModalLabel">Edit Resource</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="editResourceForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="edit_course_id" class="form-label">Course</label>
                                <select class="form-select" id="edit_course_id" name="course_id" required>
                                    <option value="">Select a course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="edit_name" class="form-label">Resource Name</label>
                                <input type="text" class="form-control" id="edit_name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_file" class="form-label">Upload New File (optional)</label>
                                <input type="file" class="form-control" id="edit_file" name="file" accept=".pdf,.doc,.docx,.txt">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery (required for DataTables) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Bootstrap 5 JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <!-- DataTables Buttons for Export -->
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script>
        // Sidebar toggle functionality
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const content = document.querySelector('.content');

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            if (sidebar.classList.contains('active')) {
                content.style.marginLeft = '250px';
            } else {
                content.style.marginLeft = '0';
            }
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', (e) => {
            if (window.innerWidth <= 992 && !sidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
                sidebar.classList.remove('active');
                content.style.marginLeft = '0';
            }
        });

        // Initialize DataTable with export buttons
        $(document).ready(function () {
            $('#resourceTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'csv',
                        text: '<i class="fas fa-file-csv me-2"></i> CSV',
                        className: 'btn btn-sm btn-outline-primary me-2 text-success bg-white'
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf me-2"></i> PDF',
                        className: 'btn btn-sm btn-outline-danger text-danger bg-white'
                    }
                ],
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50],
                responsive: true
            });

            // Populate edit modal
            $('.edit-resource').on('click', function () {
                const id = $(this).data('id');
                const name = $(this).data('name');
                const courseId = $(this).data('course-id');
                $('#editResourceForm').attr('action', '{{ url("admin/resources") }}/' + id);
                $('#edit_name').val(name);
                $('#edit_course_id').val(courseId);
            });
        });
    </script>
</body>
</html>
