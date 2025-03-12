<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfume Website</title>
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
            /* Extra space for underline */
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
            /* Make icon bigger */
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

        /* Show dropdown on hover */
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



        /* Pendulum Animation on Hover */
        @keyframes pendulumSwing {
            0% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(-10deg);
            }

            50% {
                transform: rotate(10deg);
            }

            75% {
                transform: rotate(-5deg);
            }

            100% {
                transform: rotate(0deg);
            }
        }

        .user-dropdown:hover .icon-hover {
            animation: pendulumSwing 0.5s ease-in-out;
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

        /* Show dropdown on hover */
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


        /* Dropdown Menu Shadow Effect */
        .user-dropdown:hover .dropdown-menu-custom {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            /* Shadow effect */
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>

<body>

    <!-- ********************************************** Header **************************************************** -->
    <header class="shadow-sm sticky-top " style="z-index:1000">
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

</body>

</html>
