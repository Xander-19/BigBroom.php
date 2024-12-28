<?php

session_start();

$conn = new mysqli('localhost', 'root', '', 'bigbroomDB');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' OR email='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            header("Location: index.php");
            exit;
        } else {
            $error_message = "Invalid username/email or password.";
        }
    } else {
        $error_message = "User not found!";
    }
}

$conn->close();

?>

<?php 
    $page_title = "log in";
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
    <link rel="stylesheet" href="login.css">
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

        <div class="containlog" data-aos="fade-left">
            <div class="regheader">
                <p class="regp">LOG IN</p>
            </div>
            <div class="logform">
                <form action="login.php" method="POST">
                    <div class="logemailrow">
                        <label class="emaillog">Email:</label>
                        <div class="regcol">
                            <input type="text" class="logemailinput" placeholder="Enter your email/username." name="email" id="email" required>
                        </div>
                    </div>
                    <div class="logpassrow">
                        <label class="passlog">Password:</label>
                        <div class="regcol">
                            <input type="password" class="logpassinput" placeholder="Enter your password." name="password" id="password" required>
                        </div>
                    </div>
                    <?php if(isset($error_message)) { ?>
                        <p class="error-message"><?php echo $error_message; ?></p>
                    <?php } ?>
                    <button type="submit" id="crtbtn">LOGIN</button>
                    <div id="have">
                    <p class="have">Don't have an account? <a href="register.php" class="hvlink">Register</a> here.</p>
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
                    <a href="admin.php" id="nag"><i class="fa-solid fa-user"></i></a>
            </div>
            <p>&copy; 2024 BigBroom Motorcycles. All rights reserved.</p>
        </footer>
    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>
</html>