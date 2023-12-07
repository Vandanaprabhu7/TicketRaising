<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Tickets</title>
    <style>
        .notification-container {
            display: flex;
            align-items: center;
            position: relative;
        }

        .notification-badge {
            position: absolute;
            top: 20%;
            /* Center vertically */
            left: 100%;
            /* Adjust the horizontal position to the right of the bell icon */
            transform: translate(-50%, -50%);
            /* Center horizontally and vertically */
            padding: 2px 5px;
            border-radius: 50%;
            background-color: grey;
            color: white;
            font-size: small;
        }

        /* Add some general styles to improve responsiveness */
        .table {
            width: 100%;
            max-width: 100%;
            overflow-x: auto;
        }

        /* Adjust font size and spacing for smaller screens if needed */
        @media only screen and (max-width: 576px) {

            .table th,
            .table td {
                font-size: 14px;
                padding: 8px;
            }

            .navbar-collapse {
                margin-left: 0;
            }

            .navbar-nav {
                margin-top: 10px;
            }

            .navbar-brand {
                margin-left: 5px;
            }

            .navbar-toggler {
                margin-right: 5px;
            }

            .nav-item {
                margin-right: 0;
            }

            .nav-link {
                font-size: 16px;
                margin-right: 10px;
            }

            .notification-container {
                margin-left: 10px;
                /* Adjust margin to separate from the logout link */
            }

            .notification-badge {
                padding: 1px 3px;
                font-size: 12px;
            }
        }

        @media only screen and (max-width: 400px) {

            .table th,
            .table td {
                font-size: 14px;
                padding: 4px;
            }

            .navbar-brand {
                margin-left: 2px;
                font-size: 18px;
            }

            .nav-link {
                font-size: 14px;
                margin-right: 5px;
            }

            .notification-container {
                margin-left: 5px;
            }

            .notification-badge {
                padding: 1px 2px;
                font-size: 10px;
            }
        }
    </style>


</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <img src="/images/logo.png" alt="Logo" style="height:100px;width:100px;">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav" style="margin-left:70%">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" style="cursor: pointer; color: #ff6a76; font-size: 20px;margin-right:20px" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="goToProfile()" style="cursor: pointer; color: #ff6a76; font-size: 20px;margin-right:20px">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="localStorage.clear();event.preventDefault();  document.getElementById('logout-form').submit();" style="cursor: pointer; color: #ff6a76; font-size: 20px;margin-right:20px">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="openNotifications()" style="cursor: pointer; color: #ff6a76; font-size: 24px;margin-right:20px">
                                <div class="notification-container">
                                    <i class="fas fa-bell" style="color: #ff6a76; font-size: 24px;"></i>
                                    <span class="notification-badge">{{ $countOfUnread }}</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


    </header>
    <div style="padding-left:30px;padding-right:30px">
        <script>
            function goToProfile() {
                window.location.href = '/profile';
            }

            function openNotifications() {
                window.location.href = "/adminNotifications";
            }
        </script>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Tickets</h1>
        </div>
        <!-- <a class="btn btn-primary" onclick="addTicket()">Add New Ticket</a> -->
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Ticket</th>
                        <th scope="col">Summary</th>
                        <th scope="col">Status</th>
                        <th scope="col">Priority</th>
                        <th scope="col">Project</th>
                        <th scope="col">Raised By</th>
                        <th scrope="col">Time</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($tickets))
                    @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket['tname'] }}</td>
                        <td>{{ $ticket['summary'] }}</td>
                        <td>{{ $ticket['status'] }}</td>
                        <td>{{$ticket['priority']}}</td>
                        <td>{{$ticket['project']}}</td>
                        <td>{{$ticket['raisedByName']}}</td>
                        <td>{{$ticket['time']}}</td>
                        <td><a onclick="update('<?php echo addslashes($ticket['id']); ?>')" class="btn btn-primary">Update</a>
                            <a onclick="deletee('<?php echo addslashes($ticket['id']); ?>')" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="9">No tickets found.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        </main>

        <script>
            function addTicket() {
                var token = localStorage.getItem('token');
                if (token) {
                    window.location.href = '/adminTickets/create/' + token;
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Error',
                        text: 'Login before adding a new ticket',
                        showConfirmButton: false,
                        timer: 1000
                    });
                }
            }

            function update(id) {
                var updateUrl = '/update/' + id;
                window.location.href = updateUrl;
            }

            function deletee(id) {
                var updateUrl = '/deletee/' + id;
                window.location.href = updateUrl;
            }
        </script>
    </div>
</body>

</html>