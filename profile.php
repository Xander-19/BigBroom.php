<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $page_title = "Profile";
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }

    $conn = new mysqli('localhost', 'root', '', 'bigbroomDB');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_SESSION['username'];
    $query = "SELECT fullname, profile_picture FROM users WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "No user data found.";
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="img/iconBSM.jpg">
    <title><?php if(isset($page_title)) { echo "$page_title"; } ?> - BigBroom Shop</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="modal.css">
</head>
<body onload="loadXMLDoc()">
    <div class="container">
        <header>
            <div class="navbar">
                <div class="logo">
                    <img src="img/logoBSM.jpg" alt="BSM Logo" id="BSMLogo">
                </div>
                <div class="openMenu"><i class="fa fa-bars fa-lg"></i></div>
                <div class="navi <?php echo isset($_SESSION['username']) ? 'logged-in' : ''; ?>" id="navi">
                    <a href="index.php" id="nav" class="home">Home</a>
                    <a href="menupage.php" id="nav" class="motorcycles">Motorcycles</a>
                    <a href="contact.php" id="nav" class="contact">Contact</a>
                    <a href="loan.php" id="nav" class="loan">Loan</a>
                    <a href="aboutus.php" id="nav" class="about-us">About us</a>
                    <?php
                    if(isset($_SESSION['username'])) { 
                        echo '<a href="profile.php" class="vertical" id="nav">' . $_SESSION['username'] . '</a>';
                    } else { 
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
            <div class="profileDetails">
                <div>
                    <img src="<?php echo $user['profile_picture']; ?>" alt="Profile Picture" class="DpPicture">
                </div>
                <div class="userNmCb">
                    <div class="fname">
                        <h2><?php echo $user['fullname']; ?></h2>
                    </div>
                </div>
                <div id="editlogout">
                    <button id="editBtn">Edit Profile</button>
                    <button id="logOutBtn">Log out</button>
                </div>
            </div>
        </div>

        <!-- Modal HTML -->
        <div id="editModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Edit Profile</h2>
                <form id="editForm" enctype="multipart/form-data">
                    <label for="profilePicture">Profile Picture:</label>
                    <input type="file" id="profilePicture" name="profilePicture" accept="image/*">
                    
                    <label for="fullname">Full Name:</label>
                    <input type="text" id="fullname" name="fullname" value="<?php echo $user['fullname']; ?>" required>
                    
                    <button type="button" id="saveBtn">Save</button>
                </form>
            </div>
        </div>

        <div class="content2">
            <div class="messageBox">
                <div class="messageDiv" data-aos="fade-right">
                    <h1>Leave a message</h1>
                    <input type="text" name="Name" id="name" placeholder="Enter your name." class="mess">
                    <input type="number" name="Phone" id="phone" placeholder="Enter your number." class="mess">
                    <input type="email" name="Email" id="email" placeholder="Enter your email." class="mess">
                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter your message." class="msg"></textarea>
                    <input type="submit" id="messageSubmit">
                </div>
            </div>
        </div>

        <div class="content3">
            <div class="menu">
                <div id="products" data-aos="fade-in"></div>
            </div>
            <div class="seemor">
                <a class="seem" href="menupage.php" style="vertical-align:middle"><span>SEE ALL</span></a>
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

    <script src="profile.js"></script>
    <script src="modal.js"></script>
    <script src="menu.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>
</html>
