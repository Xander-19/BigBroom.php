<?php 
    $page_title = "Admin log in";
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
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="navbar">
                <div class="logo">
                    <img src="img/logoBSM.jpg" alt="BSM Logo" id="BSMLogo">
                </div>
            </div>
        </header>

        <div class="containlog" data-aos="fade-left">
            <div class="regheader">
                <p class="regp">ADMIN LOG IN</p>
            </div>
            <div class="logform">
                <form id="loginForm">
                    <div class="logemailrow">
                        <label class="emaillog">Email:</label>
                        <div class="regcol">
                            <input type="text" class="logemailinput" placeholder="Enter your username." name="adminUser" id="adminUser" required>
                        </div>
                    </div>
                    <div class="logpassrow">
                        <label class="passlog">Password:</label>
                        <div class="regcol">
                            <input type="password" class="logpassinput" placeholder="Enter your password." name="adminPassword" id="adminPassword" required>
                        </div>
                    </div>
                    <?php if(isset($error_message)) { ?>
                        <p class="error-message"><?php echo $error_message; ?></p>
                    <?php } ?>
                    <button type="submit" id="crtbtn">LOGIN</button>
                    <div id="have">
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
                    <a href="login.php" class="" id="nag"><i class="fa fa-user fa-lg"></i></a>
            </div>
            <p>&copy; 2024 BigBroom Motorcycles. All rights reserved.</p>
        </footer>
    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
        document.addEventListener('DOMContentLoaded', function () {
        const loginForm = document.getElementById('loginForm');
        const errorMessage = document.getElementById('errorMessage');

        loginForm.addEventListener('submit', function (event) {
            event.preventDefault();

            const username = document.getElementById('adminUser').value;
            const password = document.getElementById('adminPassword').value;

            if (validateLogin(username, password)) {
                window.location.href = 'admin_index.php';
            } else {
                errorMessage.textContent = 'Invalid username or password. Please try again.';
            }
        });

        function validateLogin(username, password) {
            return username === 'admin' && password === 'user';
        }
    });
    </script>

</body>
</html>