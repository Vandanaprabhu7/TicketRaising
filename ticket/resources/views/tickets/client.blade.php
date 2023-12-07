<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css\home.css">
    <link rel="stylesheet" href="https://unpkg.com/sweetalert/dist/sweetalert.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

    <title>Client Page</title>
    <style>
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }


        .contact .content {
            width: 100%;
            max-width: 430px;
            border: 4px solid rgba(64, 112, 244, 0.1);
            padding: 15px 100px;
            margin: 0 auto;
            /* Center the content horizontally */
        }

        .card {
            max-width: 18rem;
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
        }

        #background-image-div {
            background-image: url('/images/bg_ticket.png');
            /* Replace with the actual path to your image */
            background-size: 90%;
            background-position: center;
            margin: 90px 0px 30px;
            margin-left: 0%;
            height: 100%;
            /* Adjust the height as needed */
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            /* Text color for better visibility */
        }

        /* Add this CSS for the shining arrow and message */
        .arrow-container {
            text-align: center;
            margin-top: 20px;
        }

        .shining-arrow {
            rotate: 45deg;
            width: 30px;
            height: 30px;
            border: solid #ff6a76;
            border-width: 0 3px 3px 0;
            display: inline-block;
            position: relative;
            animation: bounce 1s infinite;
        }

        .shining-arrow:hover {
            animation: none;
            /* Stop the bouncing animation on hover */
        }


        .click-here-message {
            color: black;
            font-size: 16px;
        }


        a.ticket-link {
            text-decoration: none;
            color: black;
            transition: color 0.3s;
            /* Add a smooth color transition on hover */
        }

        a.ticket-link:hover {
            color: red;
            /* Change the color to red on hover */
        }

        .card {
            margin: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #3498db;
            color: #fff;
            font-size: 20px;
            padding: 10px;
            border-radius: 5px 5px 0 0;
        }

        .card-body {
            background-color: #fff;
            padding: 20px;
            border-radius: 0 0 5px 5px;
        }

        .card-text {
            font-size: 16px;
            color: #333;
        }


        @media (max-width: 767px) {

            /* Add the following styles to prevent horizontal scrolling on small screens */
            body {
                max-width: 767px;
                margin: 0 auto;
            }

            .contact {
                max-width: 767px;
            }


            .contact .content {
                max-width: 767px;
            }

            .card-container {
                justify-content: center;
                /* Center cards on smaller screens */
            }

            .card {
                max-width: 100%;
                /* Make cards take full width on smaller screens */
                margin: 10px;
                /* Adjust margin for smaller screens */
            }

            #background-image-div {
                margin: 50px 0px 15px;
                /* Adjust margin for smaller screens */
            }

            .arrow-container {
                margin-top: 10px;
                /* Adjust margin for smaller screens */
            }

            .shining-arrow {
                width: 20px;
                /* Adjust arrow size for smaller screens */
                height: 20px;
            }

            .card-header {
                font-size: 18px;
                /* Adjust header font size for smaller screens */
                padding: 8px;
                /* Adjust padding for smaller screens */
            }

            .card-body {
                padding: 10px;
                /* Adjust padding for smaller screens */
            }

            .card-text {
                font-size: 14px;
                /* Adjust text font size for smaller screens */
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-danger bg-transparent">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="/images/logo.png" alt="Logo" style="height:100px;width:100px;">
            </a>
            <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon custom-icon"></span>
                <!-- Add the burger icon here -->
                <span class="navbar-toggler-icon custom-burger-icon">&#9776;</span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" style="color: red !important;margin-right:20px;" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#apply-process-section" style="margin-right:20px;">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact" style="margin-right:20px;">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="margin-right:20px;cursor: pointer;color: red !important;" onclick="goToProfile()">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="localStorage.clear();event.preventDefault();  document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="bg-color">
        <div id="background-image-div">
            <div id="left-column" style="float: left; width: 30%;margin-right:60%;margin-bottom:5%;margin-top:1%">
                <div id="content" style="color: black;">
                    <h1>Exemplary Support, Seamless Solutions</h1>
                    <p>Elevate support with streamlined ticket management—seamless solutions, efficient query navigation, and prioritized care for an unparalleled user experience</p>
                </div>
                @csrf
                <a class="nav-link" onclick="seeTicket()" style="cursor: pointer;background-color: #ff6a76; padding: 10px 20px;margin:40px; color: white; text-decoration: none; border-radius: 5px;width:175px">See My Tickets</a>
            </div>
        </div>
    </div>


    </div>

    <!-- <script>
        var token = localStorage.getItem('token');
        var isAdmin = localStorage.getItem('isAdmin');
        const currentPath = window.location.pathname;
        if (!token && currentPath === "/newclient") {
            window.location.href = "/";
        } else if ((token && (currentPath === "/check" || currentPath === "/register"))) {
            window.location.href = "/newclient";
        } else if (!isAdmin && token && currentPath == "/newclient") {
            window.location.href = "/newadmin";
        } else if (!token && currentPath !== "/") {
            window.location.href = "/";
        }

        if (token) {
            setTimeout(() => {
                localStorage.removeItem('token');
                localStorage.removeItem('isAdmin');
                // Show SweetAlert informing the user about the session ending
                Swal.fire({
                    icon: 'info',
                    title: 'Login Session Ended',
                    text: 'Your login session has ended. You will be redirected to the home page.',
                    showConfirmButton: false,
                    timer: 3000, // Display the alert for 3 seconds
                }).then(() => {
                    // Redirect to '/' after displaying the SweetAlert
                    window.location.href = "/";
                });
            }, 7 * 24 * 60 * 60 * 1000); // One week in milliseconds
        }
    </script>
    -->
    <section id="admins">
        <h3 class="centered-underline" style="text-align:center">Customer Support Representatives</h3>
        <div class="d-flex justify-content-center mt-4">
            @if ($admin)
            <button class="card m-2" onclick="showToken()">
                <div class="card-header">Click here to Raise Ticket</div>
            </button>
            @else
            <p>No admin available.
                <a class="nav-link" href="{{ route('logout') }}" onclick="localStorage.clear();event.preventDefault();  document.getElementById('logout-form').submit();">Logout</a>
                <!-- <script>
                    function logout() {
                        if (localStorage.getItem('token') !== null) {
                            localStorage.clear();
                            Swal.fire({
                                icon: 'success',
                                title: 'Logged Out',
                                text: 'Successfully logged out',
                                showConfirmButton: false,
                            });
                            window.location.href = "/";
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Cannot Logout',
                                text: 'Before you log out, make sure you are logged in.',
                                showConfirmButton: false,
                            });
                        }
                    } -->
                </script>
            </p>
            @endif
        </div>
        <br><br><br><br>

        <!-- Start Apply Process Area -->
        <section class="apply-process section" id="apply-process section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-4 col-12">
                        <div class="process-item">
                            <h4>Efficient Issue Reporting</h4>
                            <p>Experience efficient issue reporting for a streamlined problem-solving process</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-12">
                        <div class="process-item">
                            <h4>Comprehensive Ticket Tracking</h4>
                            <p>Stay informed with real-time ticket tracking and timely progress updates</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-12">
                        <div class="process-item">
                            <h4>Customer Support Assistance</h4>
                            <p>Receive professional support at your convenience, ensuring issue resolution satisfaction</p>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br>
            <!-- contct Section Start -->
            <section class="contact" id="contact" style="padding-bottom: 40px;">
                <div class="content">
                    <h3 style="text-align:center">Contact Us</h3><br>
                    <!-- Contact Form -->
                    @csrf
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" rows="5" class="form-control" required></textarea>
                    </div>
                    <button type="submit" id="#submitcontact" class="btn custom-btn" onclick="sendFeedback()">Submit</button>
                    <style>
                        .custom-btn {
                            background-color: #ff6a76;
                            color: #fff;
                            /* Change the text color to white for better contrast */

                        }
                    </style>
                    <!-- End Contact Form -->
                </div>
                <!-- Contact Page Content End -->
                </div>
            </section>
            <footer class="footer" style="padding: 1px 0;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12 text-center">
                            <p style="color:white;padding-top:20px;">&copy; 2023 CompanyName. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </footer>
            <script src="https://smtpjs.com/v3/smtp.js"></script>
            <script src="/js/home.js"></script>
            <script>
                function sendFeedback() {
                    email = document.getElementById('email').value;
                    name = document.getElementById('name').value;
                    message = document.getElementById('message').value;
                    if (email === '' || name === '' || message === '') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Please fill in all the fields.',
                            timer: 1000,
                            showConfirmButton: false,
                        });
                    } else {
                        var recipients = "vandanaprabhu702@gmail.com,shetvaish@gmail.com";
                        console.log(email, message, name);
                        Email.send({
                            Host: "smtp.elasticemail.com",
                            Username: "vandanaprabhu702@gmail.com",
                            Password: "ECE65D1578529A982F0CCF537C56FD007684",
                            To: email,
                            From: 'vandanaprabhu702@gmail.com',
                            Subject: "ScholarPath",
                            Body: "Dear " + name + ",<br><br>Thank you for your time!"
                        })
                        Email.send({
                            Host: "smtp.elasticemail.com",
                            Username: "vandanaprabhu702@gmail.com",
                            Password: "ECE65D1578529A982F0CCF537C56FD007684",
                            To: recipients,
                            From: 'vandanaprabhu702@gmail.com',
                            Subject: "Feedback",
                            Body: "Dear Admin,<br><br>" + name + " has sent you a feedback about ScholarPath:<br><br>\n" + message,
                        }).then(() => {
                            Swal.fire({
                                title: "Sent Successfully",
                                text: "Thank you for you time!",
                                icon: "success",
                                timer: 1000,
                                showConfirmButton: false,
                            });
                        });
                        document.getElementById('email').value = "";
                        document.getElementById('message').value = "";
                        document.getElementById('name').value = "";
                    }
                };
            </script>

        </section>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script>
            function seeTicket() {
                window.location.href = '/client';
            }

            function redirectTo(anchor) {
                $('html, body').animate({
                    scrollTop: $(anchor).offset().top
                }, 800);
            }

            function showToken() {
                window.location.href = '/clientTickets/create';
            }

            function logout() {
                if (localStorage.getItem('token') !== null) {
                    localStorage.clear();
                    Swal.fire({
                        icon: 'success',
                        title: 'Logged Out',
                        text: 'Successfully logged out',
                        showConfirmButton: false,
                    });
                    window.location.href = "/";
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Cannot Logout',
                        text: 'Before you log out, make sure you are logged in.',
                        showConfirmButton: false,
                    });
                }
            }

            function goToProfile() {
                window.location.href = '/profile';
            }
        </script>
</body>

</html>