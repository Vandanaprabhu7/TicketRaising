@extends('layout')

@section('content')

<head>
    <!-- Include SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function validateProjectLink() {
            // Get the project link input value
            var projectLinkInput = document.getElementById("projectLinkInput").value;

            // Create a regular expression to validate the URL format
            var urlRegex = /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-zA-Z0-9.-]+\.[a-zA-Z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;

            // Test the input value against the regular expression
            if (!urlRegex.test(projectLinkInput)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Project Link',
                    text: 'Please enter a valid URL for the project link.'
                });
            }
        }
    </script>
</head>

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '{{ session("error") }}'
    });
</script>
@endif

<style>
    #background-image-div {
        background-image: url('/images/bg_ticket.png');
        background-size: cover;
        background-position: center;
        opacity: 0.5;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
    }

    nav.navbar {
        background-color: transparent;
    }

    .background-container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 90vh;
        /* Adjusted height */
        margin-top: -40px;
        /* Reduced top margin */
    }

    #bg-color {
        background-color: rgba(255, 255, 255, 0.8);
        /* Adjust the opacity as needed */
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Added box shadow */
        max-width: 600px;
        /* Adjust the maximum width as needed */
        width: 100%;
        left: 5%;
    }

    .close-button {
        position: absolute;
        top: 10px;
        /* Adjusted top position */
        text-decoration: none;
        color: #000;
        /* Change the color as needed */
    }

    form {
        margin-top: 20px;
    }

    .form-control {
        margin-bottom: 20px;
    }

    button {
        background-color: #ff6a76;
        color: #fff;
        border: none;
        padding: 15px 30px;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #ff4c5a;
    }
</style>
</style>

<!-- Navigation menu -->
<nav class="navbar navbar-expand-lg">
    <!-- ... Your existing navigation menu ... -->
</nav>
<!-- Navigation ends -->

<div class="background-container">
    <div id="background-image-div"></div>
    <div id="bg-color">
        <a href="/newadmin" class="close-button">x</a>
        <form method="post" action="{{ url('/projectstore') }}">
            {!! csrf_field() !!}
            <div class="mb-3">
                <input type="text" class="form-control" name="pname" placeholder="Project Name" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="plink" id="projectLinkInput" placeholder="Project Link" required onblur="validateProjectLink()">
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</div>

@endsection