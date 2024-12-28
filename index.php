<?php 
    $page_title = "Home";
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
    <link rel="stylesheet" href="home.css">
</head>
<body onload="loadXMLDoc()">
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

        <div class="content1">
            <div id="quodiv">
                <p class="quote">Unleash Your Inner Adventurer: </p>
                <p class="quotee">Dive into the world of big bikes and ignite your passion for exploration. From rugged terrains to winding highways, our big bikes offer unrivaled power, precision, and style.</p>
                <button class="button-log" style="vertical-align:middle" id="button-log"><span>Apply for Loan </span></button>
            </div>
            <div id="slider-container">
                <div id="slider">

                </div>
            </div>
            <svg class="wave" viewBox="0 0 100 20" preserveAspectRatio="none">
                <path d="M0 10 Q25 8, 50 10 T100 10 V20 H0 Z" />
            </svg>
        </div>
        
        <div class="content2">
            
            <div class="menu">
                <div id="products" data-aos="fade-in">
            </div>

            <div class="seemor">
                <a class="seem" href="menupage.php" style="vertical-align:middle"><span>SEE ALL</span></a>
            </div>
            <div class="messageBox">
                <div class="messageDiv" data-aos="fade-right">
                    <h1>leave a message.</h1>
                    <input type="text" name="Name" id="name" placeholder="Enter your name." class="mess">
                    <input type="number" name="Phone" id="phone" placeholder="Enter your number." class="mess">
                    <input type="email" name="Email" id="email" placeholder="Enter your email." class="mess">
                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter your message." class="msg"></textarea>
                    <input type="submit" id="messageSubmit">
                </div>
            </div>

        </div>

        <div class="content3" data-aos="fade-left">
            <section id="productss">
                <h2>BigBroom Shop Motorcycles!</h2>
                <p>Your premier destination for motorcycle enthusiasts. With a passion for quality and a commitment to excellence, we specialize in providing top-of-the-line big bike motorcycles to riders of all experience levels.</p>
                <p>At BigBroom Shop Motorcycles we believe that the journey is just as important as the destination. That's why we go above and beyond to ensure that every motorcycle we offer delivers an exceptional riding experience. From cutting-edge technology to innovative design, each bike in our collection is carefully selected to meet the highest standards of performance, reliability, and style.</p>
                <p>Explore our website to learn more about our company, browse our extensive selection of motorcycles, and discover the thrill of riding with BigBroom Shop motorcycle.</p>
            </section>
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