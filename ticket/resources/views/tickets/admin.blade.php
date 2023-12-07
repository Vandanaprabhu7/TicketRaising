<html>

<head>
    <link rel="stylesheet" href="css\home.css">
    <link rel="stylesheet" href="https://unpkg.com/sweetalert/dist/sweetalert.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
</section>
<div class="overlay" id="overlay1">
    <!doctype html>
    <html lang="en" data-bs-theme="auto">


    <head>
        <link rel="stylesheet" href="css\home.css">
        <link rel="stylesheet" href="https://unpkg.com/sweetalert/dist/sweetalert.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.118.2">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <title>Ticket</title>
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
        <style>
            /* Common styles */

            #background-image-div {
                background-image: url('/images/bg_ticket.png');
                background-size: cover;
                background-position: center;
                margin: 0px 0px 30px;
                margin-left: 0%;
                height: 80%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
            }

            .nav-link {
                margin-right: 20px;
                cursor: pointer;
            }

            .notification-container {
                display: flex;
                align-items: center;
                position: relative;
            }

            .notification-badge {
                position: absolute;
                top: 20%;
                left: 100%;
                transform: translate(-50%, -50%);
                padding: 2px 5px;
                border-radius: 50%;
                background-color: grey;
                color: white;
                font-size: small;
            }

            .contact .content {
                width: 100%;
                max-width: 430px;
                border: 4px solid rgba(64, 112, 244, 0.1);
                padding: 15px 100px;
                margin: 0 auto;
                /* Center the content horizontally */
            }


            /* Responsive styles */



            @media (max-width: 767px) {
                #item1 {
                    margin-top: 500px;
                }

                .nav-link {
                    width: 100%;
                    margin: 10px 0;
                }

                #projectaddbtn {
                    width: 100%;
                }

                #left-column {
                    width: 100%;
                    margin-right: 0%;
                }

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
                }

                .card {
                    max-width: 100%;
                    margin: 10px;
                }

                #background-image-div {
                    margin: 50px 0px 15px;
                }

                .arrow-container {
                    margin-top: 10px;
                }

                .shining-arrow {
                    width: 20px;
                    height: 20px;
                }

                .card-header {
                    font-size: 18px;
                    padding: 8px;
                }

                .card-body {
                    padding: 10px;
                }

                .card-text {
                    font-size: 14px;
                }
            }
        </style>
    </head>
</div>

<body>
    <!-- Navigation menu -->
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
                        <a class="nav-link active" style="color: red !important; margin-right:20px;" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="margin-right:20px;" href="#apply-process-section">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="margin-right:20px;" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="margin-right:20px;cursor: pointer;" onclick="goToProfile()">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="localStorage.clear();event.preventDefault();  document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="openNotifications()" style="cursor: pointer; color: #ff6a76; font-size: 24px;margin-right:20px">
                            <div class="notification-container">
                                <i class="fas fa-bell" style="color: #ff6a76; font-size: 22px;"></i>
                                <span class="notification-badge">{{ $countOfUnread }}</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="bg-color">
        <div id="background-image-div">
            <div id="left-column" style="float: left; width: 30%;margin-right:60%;margin-bottom:5%;margin-top:1%">
                <div id="content" style="color: black;margin-top:90px">
                    <h1>Exemplary Support, Seamless Solutions</h1><br><br>
                    <p>Elevate support with streamlined ticket management—seamless solutions, efficient query navigation, and prioritized care for an unparalleled user experience</p>
                </div>
                @csrf
                <div style="display: flex; justify-content: space-around; flex-wrap: wrap;">
                    <a class="nav-link" onclick="seeTicket()" style="cursor: pointer; background-color: #ff6a76; padding: 10px 20px; margin: 10px; color: white; text-decoration: none; border-radius: 5px; width: 175px;">See My Tickets</a>
                    <a class="nav-link" id="projectaddbtn" style="cursor: pointer; background-color: #ff6a76; padding: 10px 20px; margin: 10px; color: white; text-decoration: none; border-radius: 5px; width: 195px;">Add New Project</a>
                </div>
            </div>
            <style>
                #projectaddbtn {
                    width: 195px;
                }

                @media screen and (max-width: 600px) {

                    #content h1 {
                        margin-top: 500px;
                    }

                    body {
                        max-width: 767px;
                        margin: 0 auto;
                    }

                    .contact {
                        max-width: 767px;
                    }

                    .contact .content {
                        max-width: 100%;
                        border: 4px solid rgba(64, 112, 244, 0.1);
                        padding: 15px 100px;
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

                    .nav-link {
                        width: 100%;
                        margin: 10px 0;
                    }

                    #projectaddbtn {
                        width: 100%;
                    }

                    #left-column {
                        width: 100%;
                        margin-right: 0;
                        text-align: center;
                    }

                    #content {
                        margin-top: 20px;
                    }

                    #projectaddbtn {
                        width: 100%;
                        margin-top: 10px;
                    }
                }

                .notification-container {
                    display: flex;
                    align-items: center;
                    position: relative;
                }

                .notification-badge {
                    position: absolute;
                    top: 20%;
                    left: 100%;
                    transform: translate(-50%, -50%);
                    padding: 2px 5px;
                    border-radius: 50%;
                    background-color: grey;
                    color: white;
                    font-size: small;
                }
            </style>
        </div>
    </div>
    </div>
    <!-- Start Apply Process Area -->
    <section class="apply-process section" id="apply-process section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-4 col-12">
                    <div class="process-item" id="item1">
                        <h4>Efficient Issue Reporting</h4>
                        <p>Experience efficient issue reporting for a streamlined problem-solving process</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4 col-12">
                    <div class="process-item">
                        <h4>Efficient Ticket Tracking</h4>
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
                <button type="submit" class="btn custom-btn" onclick="sendFeedback()">Submit</button>
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

            function goToProfile() {
                window.location.href = '/profile';
            }

            function openNotifications() {
                window.location.href = "/adminNotifications";
            }
        </script>
        <script>
            // var token = localStorage.getItem('token');
            // var isAdmin = localStorage.getItem('isAdmin');
            // const currentPath = window.location.pathname;
            // if (!token && currentPath === "/newadmin") {
            //     window.location.href = "/";
            // } else if (token && currentPath === "/check" || token && currentPath === "/register") {
            //     window.location.href = "/newadmin";
            // } else if (isAdmin && token && currentPath == "/newadmin") {
            //     window.location.href = "/newclient";
            // } else if (!token && currentPath !== "/") {
            //     window.location.href = "/";
            // }

            // if (token) {
            //     setTimeout(() => {
            //         localStorage.removeItem('token');
            //         localStorage.removeItem('isAdmin');
            //         // Show SweetAlert informing the user about the session ending
            //         Swal.fire({
            //             icon: 'info',
            //             title: 'Login Session Ended',
            //             text: 'Your login session has ended. You will be redirected to the home page.',
            //             showConfirmButton: false,
            //             timer: 3000, // Display the alert for 3 seconds
            //         }).then(() => {
            //             // Redirect to '/' after displaying the SweetAlert
            //             window.location.href = "/";
            //         });
            //     }, 7 * 24 * 60 * 60 * 1000); // One week in milliseconds
            // }
        </script>

        <script>
            function seeTicket() {
                window.location.href = '/admin';
            }
        </script>
        <script>
            document.getElementById('projectaddbtn').addEventListener('click', function() {
                window.location.href = '/addp';
            });
        </script>

</html>