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


</head>

<body>

    <!-- ***********************Header Section********************* -->
    <header>

        <nav id="nav1" class="bg-dark text-white p-2">
            <marquee>FLAT 20% OFF ON ORDERS ABOVE ₹1000 | </marquee>

        </nav>

        <nav class="navbar navbar-expand-lg bg-white border-bottom">
            <div class="container">
                <!-- Navbar Toggle for Mobile -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Logo -->
                <a class="navbar-brand" href="#">
                    <img src="assets/nav_logo.png" alt="Embark Logo" class="w-50">
                </a>



                <!-- Navbar Links -->
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="#">SHOP BY GENDER</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">SHOP BY COLLECTION</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">SHOP BY FRAGRANCE</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">GIFT SETS</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">OUR WORLD</a></li>
                    </ul>
                </div>

                <!-- Icons (Search, User, Cart) -->
                <div class="d-flex gap-4 icon-links ">
                    <i class="fas fa-search"></i>
                    <i class="fas fa-user"></i>
                    <i class="fas fa-shopping-cart"></i>
                </div>
            </div>

        </nav>



        <div class="hero_image">

        </div>

        <!-- Hero Section Start -->
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="4000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/Hero_image1.jpg" class="d-block w-100" alt="Women's Day Offer 1">
                </div>
                <div class="carousel-item">
                    <img src="assets/Hero_image2.jpg" class="d-block w-100" alt="Women's Day Offer 2">
                </div>
                <div class="carousel-item">
                    <img src="assets/Hero_image3.jpg" class="d-block w-100" alt="Women's Day Offer 3">
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>

    </header>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
