<?php 
    $page_title = "About us";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="img/iconBSM.jpg">
    <title>
        <?php if(isset($page_title)) { echo "$page_title"; } ?> - BigBroom Shop
    </title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="about.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="navbar">
                <div class="logo">
                    <img src="img/logoBSM.jpg" alt="BSM Logo" id="BSMLogo">
                </div>
                <div class="openMenu"><i class="fa fa-bars fa-lg "></i></div>
                <div class="navi <?php session_start(); echo isset($_SESSION['username']) ? 'logged-in' : ''; ?>" id="navi">
                    <?php
                        if(isset($_SESSION['username'])) { 
                            echo '<a href="index.php" id="nav" class="home">Home</a>';
                            echo '<a href="menupage.php" id="nav" class="motorcycles">Motorcycles</a>';
                            echo '<a href="loan.php" id="nav" class="loan">Loan</a>';
                            echo '<a href="contact.php" id="nav" class="contact">Contact</a>';
                            echo '<a href="aboutus.php" id="nav" class="about-us">About us</a>';
                            echo '<a href="profile.php" class="vertical" id="nav">' . $_SESSION['username'] . '</a>';
                        } else { 
                            echo '<a href="index.php" id="nav" class="home">Home</a>';
                            echo '<a href="contact.php" id="nav" class="contact">Contact</a>';
                            echo '<a href="aboutus.php" id="nav" class="about-us">About us</a>';
                            echo '<a href="login.php" id="nav" class="logIn">Sign Up</a>';
                        } 
                    ?>
                    <div class="closeMenu"><i class="fa fa-times fa-lg"></i></div>
                    <span class="icons">
                        <i class="fab fa-facebook fa-lg"></i>
                        <i class="fab fa-instagram fa-lg"></i>
                        <i class="fab fa-github fa-lg"></i>
                        <i class="fab fa-telegram fa-lg"></i>
                    </span>
                </div>
            </div>
        </header>
        
        <div class="content1" data-aos="fade-right">
            <div id="quodiv">
                <p class="quote">"Ride with Passion, Explore with Confidence: Your Journey Starts Here!"</p>
            </div>
            <div id="slider-container">
                <div id="slider">
                </div>
            </div>
            <svg class="wave" viewBox="0 0 100 20" preserveAspectRatio="none">
                <path d="M0 10 Q25 8, 50 10 T100 10 V20 H0 Z" />
            </svg>
        </div>

        <div class="ab-div">
            <div class="content">
                <div class="aboutusTxt">
                    <h2>The Team</h2>
                </div>
                <div class="profile" data-aos="fade-left">
                    <div class="imahe">
                        <img src="img/Alex.jpg" alt="Alex Picture">
                    </div>
                    <div class="detal">
                        <h4>Alexander E. Madrigal Jr.</h4>
                        <p>BSIT 3 - DG2</p>
                    </div>
                </div>
                <div class="profile" data-aos="fade-left">
                    <div class="imahe">
                        <img src="img/paula.jpg" alt="paula Picture">
                    </div>
                    <div class="detal">
                        <h4>Paula Mae S. Pascual</h4>
                        <p>BSIT 3 - DG2</p>
                    </div>
                </div>
            </div>
            
            <div class="content3" data-aos="fade-left">
                <section id="products">
                    <h2>Welcome to BigBroom Shop Motorcycles!</h2>
                    <p>BigBroom, we're passionate about motorcycles and providing the best experience for our customers. Established in [year], we've been serving motorcycle enthusiasts for [number of years] with a commitment to quality, service, and reliability.</p>
                    <p>Our journey began with a simple mission: to bring the thrill of riding to everyone. Whether you're a seasoned rider or just starting out, we're here to help you find the perfect motorcycle to suit your needs and style.</p>
                    <p>What sets us apart is our dedication to customer satisfaction. From our expert team of sales professionals to our skilled technicians in the service department, we go above and beyond to ensure that every customer leaves our dealership with a smile on their face.</p>
                    <p>But our dedication doesn't stop there. We're also deeply committed to our community and the environment. That's why we actively participate in local events and support initiatives that promote safe riding practices and environmental sustainability.</p>
                    <p>Thank you for choosing BigBroom Motorcycles. We look forward to being your trusted partner on your motorcycle journey!</p>
                </section>
            </div>
        </div>
        

        <div class="content4" data-aos="fade-right">
            <div class="photos">
                <img src="img/kawasaki-z1000r.jpg" alt="kawasaki-z1000r" id="pic">
                <img src="img/Kawasaki Ninja-ZX-10RR.jpg" alt="Kawasaki Ninja-ZX-10RR" id="pic">
                <img src="img/YamahaR1.jpeg" alt="YamahaR1" id="pic">
                <img src="img/2024-Yamaha-MT10.jpg" alt="2024-Yamaha-MT10" id="pic">
                <img src="img/repsol.jpg" alt="" id="pic">
                <img src="img/Image.jpg" alt="" id="pic">
                <img src="img/AboutusBG.jpg" alt="" id="pic">

            </div>
        </div>
        <footer data-aos="fade-up">
            <img src="img/logoBSM.jpg" alt="BSM Logo" id="FBSMLogo">
            <div class="navig">
                <a href="index.php" class="" id="nag">Home</a>
                <a href="menupage.php" id="nag">Motorcycles</a>
                <a href="contact.php" id="nag">Contact</a>
                <a href="loan.php" id="nag">Loan</a>
                <a href="aboutus.php" id="nag">About us</a> 
            </div>
            <p>&copy; 2024 BigBroom Motorcycles. All rights reserved.</p>
        </footer>
    </div>

    <script src="homepage.js"></script>
    <script src="menu.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>