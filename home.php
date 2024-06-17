<?php

include "connection.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en"  data-bs-theme="dark">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Down South Furnitures</title>
        <link rel="icon" href="resources/icon/furniture.png">
     <link href="bootstrap.css" rel="stylesheet" />
        
        <link href="style.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- nav bar  -->
            <?php
                include "navbar.php";
            ?>

            <!-- nav bar  -->
  
            <header class="bg-dark py-5">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder text-white mb-2 text-center">Down South Furnitures</h1>
                                <p class="lead fw-normal text-white-50 mb-4 text-center">Srilankan No.1 Furniture Brand</p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-center">
                                    <a class="btn btn-outline-warning btn-lg px-4 me-sm-3 " href="index.php">Shop Now</a>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="resources/iimg/1.jpg" alt="..." /></div>
                    </div>
                </div>
            </header>
           
            <section class="py-5" id="features">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">You Can Get Your Furnitures As You Wish</h2></div>
                        <div class="col-lg-8">
                            <div class="row gx-5 row-cols-1 row-cols-md-2">
                                <div class="col mb-5 h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
                                    <h2 class="h5">Modern Designs</h2>
                                    <p class="mb-0">Down South Furnitures offers a contemporary collection that blends Southern charm with modern elegance. Our designs feature clean lines, natural materials, and subtle, sophisticated hues, creating inviting and stylish spaces. Each piece is crafted for comfort and durability, ensuring timeless appeal for any home. Visit Down South Furnitures to experience the perfect fusion of tradition and innovation.</p>
                                </div>
                                <div class="col mb-5 h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-building"></i></div>
                                    <h2 class="h5">Custamization</h2>
                                    <p class="mb-0">Down South Furnitures specializes in bespoke furniture customizations, allowing you to create pieces that perfectly match your style and needs. Choose from a wide range of materials, finishes, and designs to craft unique furniture that reflects your personal taste. Our skilled artisans ensure every customized piece is meticulously crafted for both beauty and functionality. Experience the joy of personalized furniture at Down South Furnitures.</p>
                                </div>
                                <div class="col mb-5 mb-md-0 h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                                    <h2 class="h5">Life Time Warranty</h2>
                                    <p class="mb-0">Down South Furnitures proudly offers a Lifetime Warranty on our products, ensuring your investment is protected for life. Our commitment to quality craftsmanship and durable materials means you can trust our furniture to stand the test of time. Enjoy peace of mind knowing that we are dedicated to providing lasting support and satisfaction with every purchase. Discover enduring quality at Down South Furnitures.</p>
                                </div>
                                <div class="col h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                                    <h2 class="h5">Affortable Price Scales</h2>
                                    <p class="mb-0">Down South Furnitures is committed to providing high-quality furniture at low price scales. We believe that stylish, durable furniture should be accessible to everyone, which is why we offer competitive pricing without compromising on design or craftsmanship. Shop with us for exceptional value and affordable elegance for every room in your home.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="container">
                <div class="row d-flex justify-content-center">
                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center d-flex justify-content-center"><img class="img-fluid rounded-3 my-5" src="resources/iimg/blue-armchair-against-blue-wall-living-room-interior-elegant-interior-design-with-copy-space-ai-generative.jpg" alt="..." /></div>
                </div>
                <div>
                <div class="col h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                                    <h2 class="h5 d-flex justify-content-center">About Us </h2>
                                    <p class="mb-0 text-center mt-4">Welcome to Down South Furnitures, Sri Lanka's premier destination for exquisite and affordable furniture. At Down South Furnitures, we believe that your home should be a reflection of your personality, filled with pieces that bring comfort, style, and joy to your everyday life.</p>
                                    
                                    <h2 class="h5 d-flex justify-content-center mt-5">Our Story </h2>
                                    <p class="mb-0 text-center mt-4">Founded in 1990, Down South Furnitures began with a simple mission: to provide high-quality, stylish furniture that enhances the beauty and functionality of every home. Our journey started with a small team of passionate designers and craftsmen who shared a common vision of redefining home interiors in Sri Lanka. Today, we have grown into a trusted name in the furniture industry, known for our commitment to excellence and customer satisfaction.</p>

                                    <h2 class="h5 d-flex justify-content-center mt-5">Our Products </h2>
                                    <p class="mb-0 text-center mt-4">Our collection offers a wide range of furniture, from modern and minimalist designs to classic and traditional pieces, to suit diverse tastes and preferences. We offer comfortable sofas, mattresses, dining sets, wardrobes, office furniture, and outdoor furniture for various spaces, including living rooms, bedrooms, dining areas, and offices. Our furniture is designed for comfort, style, and productivity, making it an ideal choice for any space.</p>

                                    
                                    <h2 class="h5 d-flex justify-content-center mt-5">Contact Us</h2>
                                    <p class="mb-0 text-center mt-4"> Address : No.13 Madapatha, Piliyandala</p>
                                    <p class="mb-0 text-center mt-2">Phone : 0112834676</p>
                                    <p class="mb-0 text-center mt-2">Email : dsfurnitures@gmail.com</p>

                                </div>
                </div>
            </div>
            
           
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto ">
            <div class="container px-5">
                <div class="row align-items-center justify-content-center flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">&copy; 2024 Down South Furnitures || All Right Reserved</div></div>
                    
                </div>
            </div>
        </footer>
       
        <script src="bootstrap.bundle.min.js"></script>
      
        <script src="script.js"></script>
    </body>
</html>
