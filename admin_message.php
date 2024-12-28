<?php 
    $page_title = "Admin Message";

    $conn = new mysqli('localhost', 'root', '', 'bigbroomDB');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['delete'])) {
        $messageId = $_POST['message_id'];
        $deleteSql = "DELETE FROM messages WHERE id = ?";
        $stmt = $conn->prepare($deleteSql);
        $stmt->bind_param("i", $messageId);
        $stmt->execute();
        $stmt->close();
        header("Location: admin_message.php");
        exit;
    }

    // Fetch messages from the database
    $sql = "SELECT * FROM messages";
    $result = $conn->query($sql);

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
    <link rel="stylesheet" href="adminMessage.css">
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
                    <a href="admin_index.php" id="nav" class="home">Home</a>
                    <a href="admin_menu.php" id="nav" class="motorcycles">Edit Menu</a>
                    <a href="admin_message.php" id="nav" class="contact">Message</a>
                    <a href="admin.php" id="nav" class="logIn">Log out</a>
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
                <div class="qout">
                    <h2>Hello!</h2>
                    <p>Admin!</p>
                </div>
            </div>
            
        </div>

        <div class="content2">
            <p id="mes">Messages</p>
            <div class="messageMenu">
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<div class="message-card" data-aos="fade-left">';
                            echo '<h2>' . htmlspecialchars($row["name"]) . '</h2>';
                            echo '<p><strong>Phone:</strong> ' . htmlspecialchars($row["phone"]) . '</p>';
                            echo '<p><strong>Email:</strong> ' . htmlspecialchars($row["email"]) . '</p>';
                            echo '<p class="con">' . htmlspecialchars($row["message"]) . '</p>';
                            echo '<p class="meta"><strong>Submitted At:</strong> ' . htmlspecialchars($row["submitted_at"]) . '</p>';
                            echo '<form method="POST" action="admin_message.php" onsubmit="return confirm(\'Are you sure you want to delete this message?\');">';
                            echo '<input type="hidden" name="message_id" value="' . $row["id"] . '">';
                            echo '<button type="submit" name="delete" class="delete-button">Delete</button>';
                            echo '</form>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>No messages found</p>';
                    }
                    ?>
            </div>

        </div>

        <div class="content3">
            
            <div class="menu">
                <div id="products" data-aos="fade-in">
                </div>

                <div class="seemor">
                    <a class="seem" href="admin_menu.php" style="vertical-align:middle"><span>SEE ALL</span></a>
                </div>
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
                <a href="admin_index.php" id="nag" class="home">Home</a>
                <a href="admin_menu.php" id="nag" class="motorcycles">Edit Menu</a>
                <a href="admin_message.php" id="nag" class="contact">Message</a>
                <a href="admin.php" id="nag" class="logIn">Log out</a> 
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

<?php

    $conn->close();

?>