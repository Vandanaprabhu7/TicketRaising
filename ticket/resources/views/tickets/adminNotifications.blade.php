<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Notification Page</title>
</head>

<body>
    <div class="container mt-5">
        <h3>Admin Notifications</h3>
        <div class="tab-content mt-2">
            <div class="tab-pane fade show active" id="all">
                <div class="container">
                    @if(isset($readNotifications) && is_array($readNotifications) && !empty($readNotifications))
                    <div class="alert alert-success" role="alert">
                        <ul style="list-style-type: none; padding: 0; margin: 0;">
                            @php
                            $reversedNotifications = array_reverse($readNotifications);
                            @endphp
                            @foreach($reversedNotifications as $notification)
                            <li style="margin-bottom: 10px; border-bottom: 1px solid #ccc; padding: 10px; background-color: #fff;">{!! $notification['message'] !!}</li>
                            @endforeach
                        </ul>
                    </div>
                    @else
                    <p>No notifications found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and Popper.js scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="scripts.js"></script>
</body>

</html>