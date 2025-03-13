<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfume Website - Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto:wght@100;400;700&display=swap"
        rel="stylesheet">
    <style>
        /* Navigation Link Hover Effect */
        .nav-links a {
            position: relative;
            text-decoration: none;
            color: black;
            font-weight: bold;
            transition: color 0.3s ease-in-out;
            padding-bottom: 5px;
        }

        .nav-links a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0%;
            height: 2px;
            background-color: orange;
            transition: width 0.3s ease-in-out;
        }

        .nav-links a:hover {
            color: orange;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        /* Icon Hover Effect */
        .icon-hover {
            font-size: 1.8rem;
            transition: color 0.3s ease-in-out;
            cursor: pointer;
        }

        .icon-hover:hover {
            color: orange;
        }

        .bg-orange {
            background-color: orange !important;
            color: white !important;
        }

        .user-dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-menu-custom {
            position: absolute;
            top: 50px;
            right: 0;
            width: 220px;
            background: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            padding: 10px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease-in-out;
            z-index: 1000;
        }

        .user-dropdown:hover .dropdown-menu-custom {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 10px;
            color: black;
            text-decoration: none;
            transition: background 0.2s;
        }

        .dropdown-item:hover {
            background: rgba(255, 165, 0, 0.1);
        }

        /* Profile Section Styles */
        .profile-section img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ddd;
        }

        .profile-section .card {
            border: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-section .list-group-item {
            border: none;
            padding: 10px 15px;
        }

        .profile-section .list-group-item:hover {
            background-color: rgba(255, 165, 0, 0.1);
        }

        .profile-section .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .profile-section .btn-secondary {
            background-color: #6c757d;
            border: none;
        }

        /* Toast Alert Styles */
        /* Custom Toast Styles */
        .toast {
            background-color: #28a745;
            /* Green background */
            color: white;
            /* White text */
            border-radius: 5px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .toast-header {
            background-color: #218838;
            /* Darker green for header */
            color: white;
            border-bottom: none;
        }

        .toast-body {
            padding: 1rem;
        }
    </style>
</head>

<body>
    <!-- ********************************************** Header **************************************************** -->
    <header class="shadow-sm sticky-top" style="z-index:1000">
        <div class="d-flex justify-content-between align-items-center px-5"
            style="height: 85px; background-color: rgb(255, 255, 255);">
            <!-- Logo -->
            <div class="cursor-pointer">
                <img src="assests/logo.svg" alt="Logo">
            </div>

            <!-- Navigation Links -->
            <div class="d-flex gap-5 nav-links">
                <div><a href="/">HOME</a></div>
                <div><a href="#">SHOP</a></div>
                <div><a href="#">MEN</a></div>
                <div><a href="#">WOMEN</a></div>
                <div><a href="#">UNISEX</a></div>
                <div><a href="#">ABOUT US</a></div>
                <div><a href="#">CONTACT US</a></div>
            </div>

            <!-- Icons -->
            <div class="d-flex gap-4">
                <div>
                    <i class="bi bi-search icon-hover"></i>
                </div>
                <!-- User Icon with Dropdown -->
                <div class="position-relative user-dropdown">
                    <i class="bi bi-person icon-hover"></i>
                    <!-- Dropdown Menu -->
                    <div class="dropdown-menu-custom">
                        <p class="text-muted">New customer? <a href="{{ route('userregister.index') }}"
                                class="text-primary">Register</a></p>
                        <hr>
                        <a href="{{ route('userprofile.index') }}" class="dropdown-item"><i class="bi bi-person"></i> My
                            Profile</a>
                        <a href="#" class="dropdown-item"><i class="bi bi-box"></i> Orders</a>
                        <a href="#" class="dropdown-item"><i class="bi bi-heart"></i> Wishlist</a>
                        <a href="#" class="dropdown-item"><i class="bi bi-award"></i> Rewards</a>
                        <a href="#" class="dropdown-item"><i class="bi bi-credit-card"></i> Gift Cards</a>
                    </div>
                </div>
                <div class="position-relative">
                    <i class="bi bi-cart icon-hover"></i>
                    <span
                        class="badge position-absolute top-0 start-100 translate-middle bg-orange rounded-circle px-2">3</span>
                </div>
            </div>
        </div>
    </header>

    <!-- ********************************************** Profile Section **************************************************** -->
    <main class="container mt-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-4 col-lg-3">
                <div class="card p-4 shadow-sm text-center profile-section">
                    <div class="mt-2 d-flex justify-content-center align-items-center">
                        @if ($user->profile_pic)
                            <img id="profile_preview" src="{{ asset('storage/' . $user->profile_pic) }}"
                                alt="Profile Picture" class="profile-picture">
                        @else
                            <svg id="profile_preview" class="profile-picture" xmlns="http://www.w3.org/2000/svg"
                                width="100" height="100" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd"
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                        @endif
                    </div>
                    <h5 class="mt-3 fw-bold text-primary">Hello, {{ $user->name }}</h5>
                    <hr>
                    <ul class="list-group list-group-flush text-start mb-3">
                        <li class="list-group-item"><a href="#" class="text-decoration-none d-block">📦 My
                                Orders</a></li>
                        <li class="list-group-item"><a href="#" class="text-decoration-none d-block">🛒
                                Cart</a></li>
                        <li class="list-group-item"><a href="#" class="text-decoration-none d-block">❤️
                                Wishlist</a></li>
                        <li class="list-group-item"><a href="#" class="text-decoration-none d-block">🔑 Change
                                Password</a></li>
                    </ul>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100 rounded-pill">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                    <form id="delete-form" method="POST" action="{{ route('user.destroy', $user->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary w-100 mt-2 rounded-pill"
                            onclick="confirmDelete()">
                            <i class="bi bi-trash"></i> Delete Account
                        </button>
                    </form>
                </div>
            </div>

            <!-- Main Content (Personal Info) -->
            <div class="col-md-8 col-lg-9">
                <div class="card p-4 shadow-sm">
                    <h4 class="mb-3 text-primary"><i class="bi bi-person-circle"></i> Personal Info</h4>
                    <hr>
                    <form method="POST" action="{{ route('user.update', $user->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name" class="form-label"><i class="bi bi-person"></i> Full
                                    Name</label>
                                <input type="text" class="form-control rounded-md" id="name" name="name"
                                    value="{{ old('name', $user->name) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label"><i class="bi bi-envelope"></i> Email
                                    Address</label>
                                <input type="email" class="form-control rounded-md" id="email" name="email"
                                    value="{{ old('email', $user->email) }}" required>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="phone" class="form-label"><i class="bi bi-telephone"></i> Phone
                                    Number</label>
                                <input type="text" class="form-control rounded-md" id="phone" name="phone"
                                    value="{{ old('phone', $user->phone) }}">
                            </div>
                            <div class="col-md-6">
                                <label for="address" class="form-label"><i class="bi bi-house"></i> Address</label>
                                <input type="text" class="form-control rounded-md" id="address" name="address"
                                    value="{{ old('address', $user->address) }}">
                            </div>
                        </div>

                        <div class="mb-3 mt-3">
                            <label class="form-label"><i class="bi bi-gender-ambiguous"></i> Gender</label>
                            <div class="d-flex gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="male"
                                        {{ $user->gender == 'male' ? 'checked' : '' }}>
                                    <label class="form-check-label">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="female"
                                        {{ $user->gender == 'female' ? 'checked' : '' }}>
                                    <label class="form-check-label">Female</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="other"
                                        {{ $user->gender == 'other' ? 'checked' : '' }}>
                                    <label class="form-check-label">Other</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="profile_pic" class="form-label"><i class="bi bi-camera"></i> Profile
                                Picture</label>
                            <input type="file" class="form-control" id="profile_pic" name="profile_pic"
                                onchange="previewImage(event)">
                            @if ($user->profile_pic)
                                <img id="profile_preview" src="{{ asset('storage/' . $user->profile_pic) }}"
                                    alt="Profile Picture" class="profile-picture mt-2"
                                    style="width: 100px; height: 100px;">
                            @else
                                <svg id="profile_preview" class="profile-picture mt-2"
                                    xmlns="http://www.w3.org/2000/svg" width="100" height="100"
                                    fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd"
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary w-100 rounded-md"><i class="bi bi-save"></i>
                            Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Toast for Success Message -->
    <div aria-live="polite" aria-atomic="true" class="position-fixed top-0 end-0 p-3" style="z-index: 10000;">
        <div id="successToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true"
            data-bs-delay="3000">
            <div class="toast-header bg-success text-white">
                <strong class="me-auto">Success</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Profile updated successfully!
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('profile_preview');
                output.src = reader.result;
                output.classList.remove("d-none");
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        function confirmDelete() {
            if (confirm("Are you sure you want to delete your account? This action cannot be undone.")) {
                document.getElementById('delete-form').submit();
            }
        }

        // Show toast if there is a success message
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                var toastEl = document.getElementById('successToast');
                var toast = new bootstrap.Toast(toastEl);
                toast.show();
            @endif
        });
    </script>
</body>

</html>
