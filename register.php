<?php
    session_start();
     
    $conn = new mysqli('localhost', 'root', '', 'bigbroomDB');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $username = $_POST['username'];
         $email = $_POST['email'];
         $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
 
         $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
 
         if ($conn->query($sql) === TRUE) {
             header("Location: login.php");
             exit;
         } else {
             echo "Error: " . $sql . "<br>" . $conn->error;
         }
 
         $conn->close();
    }
?>

<?php 
    $page_title = "Register";
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
    <link rel="stylesheet" href="register.css">
</head>
<body onload="loadXMLDoc()">
    <div class="container">
        <header>
            <div class="navbar">
                <div class="logo">
                    <img src="img/logoBSM.jpg" alt="BSM Logo" id="BSMLogo">
                </div>
                <div class="openMenu"><i class="fa fa-bars fa-lg "></i></div>
                <div class="navi" id="navi">
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

        <div class="containReg" data-aos="fade-up">
            <div class="regheader">
                <p class="regp">Create an Account</p>
            </div>
            <div class="regform">
                <form action="register.php" method="POST">
                        <div class="regcol">
                            <Label class="regLbl" for="username">USERNAME:</Label>
                            <input type="text" class="reginput" placeholder="Enter your username." name="username" id="username" required>
                        </div>
                        <div class="regcol">
                            <Label class="regLbl" for="email">EMAIL:</Label>
                            <input type="text" class="reginput" placeholder="Enter your email address." name="email" id="email" required>
                        </div>
                        <div class="regcol">
                            <Label class="regLbl" for="password">PASSWORD:</Label>
                            <input type="password" class="reginput" placeholder="Password" name="password" id="password" min="8" max="16" required>
                        </div>
                        <div class="regcol">
                            <Label class="regLbl" for="cpassword">CONFIRM PASSWORD:</Label>
                            <input type="password" class="reginput" placeholder="Confirm password" name="cpassword" id="cpassword" min="8" max="16" required>
                        </div>
                        <div class="tncDiv">
                            <input type="checkbox" class="regtncinput" name="termncondi" id="TnC" required>
                            <Label class="tncreg"><a href="termsCondition.php" target="_blank" id="tnclink">Terms and Conditions.</a></Label>
                        </div>
                    <button type="submit" id="crtbtn">Register</button>
                    <div id="have">
                        <p class="have">You have an account? <a href="login.php" class="hvlink">Login</a> here.</p>
                    </div>
                </form>
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

    <script src="loan.js"></script>
    <script src="menu.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>
</html>