<html>
<main class="col-md-11 ms-sm-auto" style="margin-right:4%">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
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
        }

        @media only screen and (max-width: 400px) {

            .table th,
            .table td {
                font-size: 14px;
                padding: 4px;
            }
        }
    </style>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="/images/logo.png" alt="Logo" style="height:100px;width:100px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav" style="margin-left:65%">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" style="cursor: pointer; color: #ff6a76; font-size: 20px;margin-right:20px" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="goToProfile()" style="cursor: pointer; color: #ff6a76; font-size: 20px;margin-right:20px">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="cursor: pointer; color: #ff6a76; font-size: 20px;margin-right:20px" aria-current="page" href="{{ route('logout') }}" onclick="localStorage.clear();event.preventDefault();  document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header><br><br>
    <script>
        function goToProfile() {
            window.location.href = '/profile';
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Ticket</th>
                    <th scope="col">Summary</th>
                    <th scope="col">Status</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Project</th>
                    <th scrope="col">Time</th>
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
                    <td>{{$ticket['time']}}</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6">No tickets found.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</main>