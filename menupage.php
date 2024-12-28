<?php 
    $page_title = "Menu";
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
    <link rel="stylesheet" href="menustyle.css">
</head>

<body onload="searchMoto()">
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

        <div class="content2" data-aos="fade-right">
            <div class="searchbar">
                <img src="img/logoBSM.jpg" alt="BSM Logo" id="BSMLogoo">
                <div id="verti"></div>
                <div>
                    <div class="serc">
                        <input type="search" id="Search" placeholder="Search motorcycle.">
                        <button class="fa-solid fa-magnifying-glass fa-flip-horizontal fa-lg" style="color: #6b6b6b;" id="sercicon" onclick="searchMoto()"></button>
                    </div>
                    <div class="soti">
                        <div>
                            <label for="brand">Brand: </label>
                            <select name="sort" id="brand" class="sor-brand" onchange="searchMoto()">
                                <option value="">All Motorcycle</option>
                                <option value="kawasaki">kawasaki</option>
                                <option value="Yamaha">Yamaha</option>
                                <option value="Ducati">Ducati</option>
                                <option value="Honda">Honda</option>
                                <option value="BMW">BMW</option>
                                <option value="Suzuki">Suzuki</option>
                            </select>
                        </div>
                        <div>
                            <label for="Sort">Sort by: </label>
                            <select name="sort" id="Sort" class="sor-brand" onchange="searchMoto()">
                                <option value="Lowest-Highest">Lowest to Highest Price</option>
                                <option value="Highest-Lowest">Highest to Lowest Price</option>
                            </select>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
        <div class="menu">
            <div id="products">
                
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

        <footer data data-aos="fade-up">
            <img src="img/logoBSM.jpg" alt="BSM Logo" id="FBSMLogo">
            <div class="navig">
                <<a href="index.php" class="" id="nag">Home</a>
                <a href="menupage.php" id="nag">Motorcycles</a>
                <a href="contact.php" id="nag">Contact</a>
                <a href="loan.php" id="nag">Loan</a>
                <a href="aboutus.php" id="nag">About us</a>  
            </div>
            <p>&copy; 2024 BigBroom Motorcycles. All rights reserved.</p>
        </footer>
        
    </div>

    <script src="menupage.js"></script>
    <script src="menu.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>
</html>