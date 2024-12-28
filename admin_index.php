<?php 
    $page_title = "Admin Homepage";

    $conn = new mysqli('localhost', 'root', '', 'bigbroomDB');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
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
    <link rel="stylesheet" href="admin_index.css">
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

        <div class="content">
            <p id="mes">Loan or Cash Acivities:</p>
            <div class="loandis">
            <?php
                $sql = "SELECT * FROM loan_applications";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="card" id="card-' . $row["id"] . '">';
                        echo '<img src="./'.htmlspecialchars($row["selfiePhoto"]).'" alt="Selfie Photo" class="selPic">';
                        echo '<h3>' . htmlspecialchars($row["firstName"]) . ' ' . htmlspecialchars($row["lastName"]) . '</h3>';
                        echo '<p><strong>Loan or Cash:</strong> ' . htmlspecialchars($row["loanOcash"]) . '</p>';
                        echo '<p><strong>Motor Unit:</strong> ' . htmlspecialchars($row["motorUnit"]) . '</p>';
                        echo '<p><strong>Motor Price:</strong> $' . htmlspecialchars($row["motorPrice"]) . '</p>';
                        echo '<p><strong>Downpayment:</strong> $' . htmlspecialchars($row["motorDp"]) . '</p>';
                        echo '<p><strong>Birthday:</strong> ' . htmlspecialchars($row["birthday"]) . '</p>';
                        echo '<p><strong>Age:</strong> ' . htmlspecialchars($row["age"]) . '</p>';
                        echo '<p><strong>Civil Status:</strong> ' . htmlspecialchars($row["civilStatus"]) . '</p>';
                        echo '<p><strong>Address:</strong> ' . htmlspecialchars($row["address"]) . '</p>';
                        echo '<p><strong>Permanent Address:</strong> ' . htmlspecialchars($row["permanentAddress"]) . '</p>';
                        echo '<p><strong>Email:</strong> ' . htmlspecialchars($row["email"]) . '</p>';
                        echo '<p><strong>Facebook:</strong> ' . htmlspecialchars($row["facebook"]) . '</p>';
                        echo '<p><strong>Phone Number 1:</strong> ' . htmlspecialchars($row["phoneNumber1"]) . '</p>';
                        echo '<p><strong>Phone Number 2:</strong> ' . htmlspecialchars($row["phoneNumber2"]) . '</p>';
                        echo '<p><strong>Submitted At:</strong> ' . htmlspecialchars($row["submitted_at"]) . '</p>';
                        echo '<img src="./'.htmlspecialchars($row["validId1"]).'" alt="validId1" class="valPic">';
                        echo '<img src="./'.htmlspecialchars($row["validId2"]).'" alt="validId2" class="valPic">';
                        echo '<button class="print-button" onclick="printApplication(' . $row["id"] . ')">Print</button>';
                        echo '<button class="delete-button" onclick="deleteApplication(' . $row["id"] . ')">Delete</button>';
                        echo '</div>';
                    }
                } else {
                    echo "No loan applications found.";
                }

                $conn->close();
                ?>
            </div>
            

        </div>

        <div class="content2">
            <div class="menu">
                <div id="products" data-aos="fade-in">
            </div>

            <div class="seemor">
                <a class="seem" href="Admin_menu.php" style="vertical-align:middle"><span>SEE ALL</span></a>
            </div>
        </div>

        <div class="content3" data-aos="fade-right">
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

    <script src="loan.js"></script>
    <script src="menu.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();

        function printApplication(id) {
            var printContents = document.getElementById('card-' + id).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            window.location.reload();
        }

        function deleteApplication(id) {
            if (confirm('Are you sure you want to delete this application?')) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "delete_application.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        alert(xhr.responseText);
                        document.getElementById('card-' + id).remove();
                    }
                };
                xhr.send("id=" + id);
            }
        }

    </script>

</body>
</html>