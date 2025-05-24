<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Student Management System Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
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

        .chart-placeholder {
            height: 250px;
            background-color: #ffffff;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .sidebar-toggle {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
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

            .chart-placeholder {
                height: 200px;
            }
        }

        @media (max-width: 400px) {
            .table {
                font-size: 0.8rem;
            }

            .card h3 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column p-3" id="sidebar">
        <h4 class="text-white mb-4">Student Management</h4>
        <nav class="nav flex-column">
            <a class="nav-link active" href="#"><i class="fas fa-home me-2"></i> Dashboard</a>
            <a class="nav-link" href="#"><i class="fas fa-user-graduate me-2"></i> Students</a>
            <a class="nav-link" href="#"><i class="fas fa-book me-2"></i> Courses</a>
            <a class="nav-link" href="#"><i class="fas fa-clipboard-check me-2"></i> Grades</a>
            <a class="nav-link" href="#"><i class="fas fa-chart-pie me-2"></i> Reports</a>
            <a class="nav-link" href="/logout"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg p-3">
            <div class="container-fluid">
                <i class="fas fa-bars sidebar-toggle me-3" id="sidebarToggle"></i>
                <h5 class="navbar-brand mb-0">Welcome, Admin</h5>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

        <!-- Dashboard Content -->
        <div class="container-fluid mt-4">
            <!-- Stats Cards -->
            <div class="row g-3 mb-4">
                <div class="col-6 col-md-3">
                    <div class="card p-3">
                        <div class="card-body">
                            <h6 class="card-title text-muted">Total Students</h6>
                            <h3 class="card-text">{{ $students->count() }}</h3>
                            <p class="text-success"><i class="fas fa-arrow-up"></i> 5% this semester</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card p-3">
                        <div class="card-body">
                            <h6 class="card-title text-muted">Active Courses</h6>
                            <h3 class="card-text">45</h3>
                            <p class="text-success"><i class="fas fa-arrow-up"></i> 10% this semester</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card p-3">
                        <div class="card-body">
                            <h6 class="card-title text-muted">Attendance Rate</h6>
                            <h3 class="card-text">92%</h3>
                            <p class="text-danger"><i class="fas fa-arrow-down"></i> 2% this month</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card p-3">
                        <div class="card-body">
                            <h6 class="card-title text-muted">Average Grade</h6>
                            <h3 class="card-text">B+</h3>
                            <p class="text-success"><i class="fas fa-arrow-up"></i> 3% this semester</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student List -->
            <div class="row g-3 mb-4">
                <div class="col-12">
                    <div class="card p-3">
                        <div class="card-body">
                            <h5 class="card-title">Student List</h5>
                            <div class="table-responsive">
                                <table id="studentTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Student ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Enrollment Date</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{ $student->id }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->email }}</td>
                                                <td>{{ $student->created_at->format('Y-m-d') }}</td>
                                                <td><span
                                                        class="badge {{ $student->status == 'active' ? 'bg-success' : ($student->status == 'pending' ? 'bg-warning' : 'bg-danger') }}">{{ ucfirst($student->status) }}</span>
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
    </div>

    <!-- jQuery (required for DataTables) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Bootstrap 5 JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
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
        $(document).ready(function() {
            $('#studentTable').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'csv',
                        text: '<i class="fas fa-file-csv me-2"></i> CSV',
                        className: 'btn btn-sm btn-outline-primary bg-white me-2'
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf me-2"></i> PDF',
                        className: 'btn btn-sm btn-outline-danger bg-white'
                    }
                ],
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50],
                responsive: true
            });
        });
    </script>
</body>

</html>
