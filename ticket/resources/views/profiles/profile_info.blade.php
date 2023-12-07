<!DOCTYPE html>
<html>

<head>
    <title>User Profile</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Custom CSS styles -->
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: #ffffff;
            margin-top: 20px;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        p {
            margin: 0;
        }

        #f {
            text-align: center;
        }

        .btn {
            margin: 10px;
        }

        .centered-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* Center vertically */
            align-items: center;
            /* Center horizontally */
        }

        .profile-picture {
            width: 150px;
            /* Set the desired width for your profile picture container */
            height: 150px;
            /* Set the desired height for your profile picture container */
            border-radius: 50%;
            /* Makes the container and image round */
            overflow: hidden;
            /* Hides any content outside the container */
            border: 3px solid #ffffff;
        }

        .profile-picture img {
            width: 100%;
            /* Ensures the image fills the container */
            height: 100%;
            /* Ensures the image fills the container */
            object-fit: cover;
            /* Scales the image to cover the entire container */
        }

        .hidden {
            display: none !important;
        }
    </style>
</head>

<body>
    <!-- Navigation menu -->
    <nav class="navbar navbar-expand-lg bg-transparent">
        <div class="container-fluid">
            <img src="/images/logo.png" alt="Logo" style="height:100px;width:100px;padding-left:10px">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                </ul>
            </div> -->
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Navigation ends -->

    <div class="container">

        <a class=" btn btn-primary" style="width: 115px;" aria-current="page" id="gobackbtn">
            <i class="fas fa-arrow-left"></i> Go Back
        </a>
        <script>
            document.getElementById('gobackbtn').addEventListener('click', function() {
                isAdmin = localStorage.getItem('isAdmin');
                if (isAdmin) {
                    window.location.href = "/newclient";
                } else {
                    window.location.href = "/newadmin";
                }
            });
        </script>

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h3 style="text-align:center;margin-bottom:0%">Your Unique Profile Palette</h3><br><br>
                <form id="profileForm" action="{{ route('profile.update', ['token' => $userData->token]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="centered-container">

                        <div class="profile-picture" style="width: 200px; height: 200px;margin-top:0%">
                            <img src="{{$userData->image}}" alt="Your Profile Picture">
                            <input type="file" id="imageInput" name="image" class="hidden">
                        </div>
                        <div class="form-group" style="margin-top:10%" id="imageUploadSection">
                            <label for="image">New Profile Image:</label>
                            <input type="file" id="imageInput" name="image" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="fname">First Name:</label>
                        <input type="text" id="fname" name="fname" class="form-control" value="{{ $userData->fname }}" disabled />
                    </div>

                    <div class="form-group">
                        <label for="lname">Last Name:</label>
                        <input type="text" id="lname" name="lname" class="form-control" value="{{ $userData->lname }}" disabled />
                    </div>

                    <div class="form-group">
                        <label for="semail">Email:</label>
                        <input type="email" id="semail" name="semail" class="form-control" value="{{ $userData->semail }}" disabled />
                    </div>
                    <div class="form-group">
                        <label for="type">Type:</label>
                        <input type="text" id="dropdown" name="dropdown" class="form-control" value="{{ $userData->dropdown }}" disabled />
                    </div>
                    <button type="submit" id="updateProfileBtn" class="btn btn-primary" style="display: none;">Update
                        Profile</button>
                </form>

                <div class="text-center">
                    <div class="d-flex justify-content-center">
                        <button id="editProfileBtn" class="btn btn-primary">Edit Profile</button>
                    </div>
                    <div class="d-flex justify-content-center">
                        <form action="{{ route('profile.destroy') }}" id="delete-form" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" onclick="showDeleteConfirmation()">Delete Account</button>
                        </form>

                        <script>
                            function showDeleteConfirmation() {
                                Swal.fire({
                                    title: 'Are you sure?',
                                    text: 'This action cannot be undone.',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: 'Yes, delete my account',
                                    cancelButtonText: 'No, cancel',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        localStorage.clear();
                                        document.getElementById('delete-form').submit();
                                    }
                                });
                            }
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleButtons() {
            var editButton = document.getElementById("editProfileBtn");
            var updateButton = document.getElementById("updateProfileBtn");
            var imageUploadInput = document.getElementById("imageUploadSection");
            if (editButton.style.display === "block" || editButton.style.display === "") {
                editButton.style.display = "none";
                updateButton.style.display = "block";
                imageUploadInput.style.display = "block";
            } else {
                editButton.style.display = "block";
                updateButton.style.display = "none";
                imageUploadInput.style.display = "none";
            }
        }

        function deleted() {
            if (localStorage.getItem('token') !== null) {
                localStorage.removeItem('token');
                Swal.fire({
                    icon: 'success',
                    title: 'Deleted',
                    text: 'Account deleted',
                    showConfirmButton: false,
                });
            }
        }

        document.getElementById("editProfileBtn").addEventListener("click", function() {
            toggleButtons();
            var fields = document.querySelectorAll('input[disabled]');
            fields.forEach(function(field) {
                field.disabled = false;
            });
            document.getElementById('dropdown').disabled = true;
        });

        // Hide the image upload section initially
        var imageUploadInput = document.getElementById("imageUploadSection");
        imageUploadInput.style.display = "none";
    </script>

    <style>
        .profile-pic-container {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>

</body>

</html>