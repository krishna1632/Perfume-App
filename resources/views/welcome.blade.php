<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfume Website</title>
    <link rel="stylesheet" href="welcome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
        }

        .dropdown:hover .dropdown-menu.show {
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>

<body>

    <!-- ***********************Header Section********************* -->
    <header>
        <nav id="nav1" class="bg-dark text-white p-2">
            <marquee>FLAT 20% OFF ON ORDERS ABOVE ₹1000 | </marquee>
        </nav>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-white shadow-sm py-2 px-3">
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <a class="navbar-brand" href="#">
                    <img src="https://static-assets-web.flixcart.com/batman-returns/batman-returns/p/images/fkheaderlogo_exploreplus-44005d.svg"
                        width="160" height="40" alt="Flipkart">
                </a>
                <form class="d-flex flex-grow-1 mx-3" style="max-width: 500px;">
                    <input class="form-control" type="search" placeholder="Search for Products, Brands and More"
                        aria-label="Search">
                </form>
                <div class="d-flex align-items-center gap-3">
                    <div class="dropdown" onmouseover="showDropdown()" onmouseout="hideDropdown()">
                        <a href="#" class="text-dark dropdown-toggle" id="loginDropdown" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa-regular fa-user"></i> Login
                        </a>
                        <ul class="dropdown-menu p-2 shadow" aria-labelledby="loginDropdown">
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user"></i> My Profile</a>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-star"></i> Flipkart Plus
                                    Zone</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-box"></i> Orders</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-heart"></i> Wishlist</a>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-gift"></i> Rewards</a>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-credit-card"></i> Gift
                                    Cards</a></li>
                        </ul>
                    </div>
                    <a href="#" class="text-dark"><i class="fa-solid fa-cart-shopping"></i> Cart</a>
                </div>
            </div>
        </nav>



        <!-- Category Section -->
        <div class="container mt-3">
            <div class="d-flex justify-content-around border-bottom pb-2">
                <div class="text-center">
                    <img src="assets/kilos.png" alt="Kilos" width="50">
                    <p>Kilos</p>
                </div>
                <div class="text-center">
                    <img src="assets/mobiles.png" alt="Mobiles" width="50">
                    <p>Mobiles</p>
                </div>
                <div class="text-center">
                    <img src="assets/fashion.png" alt="Fashion" width="50">
                    <p>Fashion</p>
                </div>
                <div class="text-center">
                    <img src="assets/electronics.png" alt="Electronics" width="50">
                    <p>Electronics</p>
                </div>
                <div class="text-center">
                    <img src="assets/home.png" alt="Home & Furniture" width="50">
                    <p>Home & Furniture</p>
                </div>
                <div class="text-center">
                    <img src="assets/appliances.png" alt="Appliances" width="50">
                    <p>Appliances</p>
                </div>
                <div class="text-center">
                    <img src="assets/flight.png" alt="Flight" width="50">
                    <p>Flight</p>
                </div>
                <div class="text-center">
                    <img src="assets/toys.png" alt="Toys" width="50">
                    <p>Beauty & Toys</p>
                </div>
                <div class="text-center">
                    <img src="assets/bike.png" alt="Two Wheelers" width="50">
                    <p>Two Wheelers</p>
                </div>
            </div>
        </div>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function showDropdown() {
            document.querySelector('.dropdown-menu').classList.add('show');
        }

        function hideDropdown() {
            document.querySelector('.dropdown-menu').classList.remove('show');
        }
    </script>
</body>


</html>
