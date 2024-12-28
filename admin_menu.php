<?php 
    $page_title = "Admin Menu";
?>

<?php
    if (isset($_POST['delete'])) {

        $xml = new DomDocument("1.0", "UTF-8");
        $xml->load('sales.xml');

        $motorDelete = $_POST['motorselect'];

        $xpath = new DOMXPATH($xml);

        foreach ($xpath->query("/motorcycles/motorcycle[name = '$motorDelete']") as $node) {
            $node->parentNode->removeChild($node);
            echo '<script>
                alert("Delete Successfully!");
            </script>'; 
        }

        $xml->formatoutput = true;
        $xml->save('sales.xml');
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
    <link rel="stylesheet" href="menustyle.css">
    <link rel="stylesheet" href="adminmodalmenu.css">
</head>

<body onload="searchMoto()">
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
            <div class="aud" data-aos="fade-up">
                <button id="addMotor" class="audBtn">ADD MOTROCYCLE</button>
                <button id="editMotor" class="audBtn">EDIT MOTORCYCLE</button>
                <button id="delMotor" class="audBtn">DELETE MOTORCYCLE</button>
            </div>
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
                <a href="admin_index.php" id="nag" class="home">Home</a>
                <a href="admin_menu.php" id="nag" class="motorcycles">Edit Menu</a>
                <a href="admin_message.php" id="nag" class="contact">Message</a>
                <a href="admin.php" id="nag" class="logIn">Log out</a> 
            </div>
            <p>&copy; 2024 BigBroom Motorcycles. All rights reserved.</p>
        </footer>

        <div id="addMotorcycleModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2>Add Motorcycle</h2>
                <form id="addMotorcycleForm">
                    <div>
                        <label for="motorImage">Motorcycle Image:</label>
                        <input type="file" id="motorImage" name="motorImage" accept="image/*" required>
                    </div>
                    <div>
                        <label for="motorAlteration">Alteration:</label>
                        <input type="text" id="motorAlteration" name="motorAlteration" required>
                    </div>
                    <div>
                        <label for="motorName">Name:</label>
                        <input type="text" id="motorName" name="motorName" required>
                    </div>
                    <div>
                        <label for="motorBrand">Brand:</label>
                        <input type="text" id="motorBrand" name="motorBrand" required>
                    </div>
                    <div>
                        <label for="motorDescription">Description:</label>
                        <textarea id="motorDescription" name="motorDescription" required></textarea>
                    </div>
                    <div>
                        <label for="motorPrice">Price:</label>
                        <input type="number" id="motorPrice" name="motorPrice" required>
                    </div>
                    <div>
                        <label for="motorAvailability">Availability:</label>
                        <input type="text" id="motorAvailability" name="motorAvailability" required>
                    </div>
                    
                    <button type="button" onclick="saveMotorcycle()">Save</button>
                </form>
            </div>
        </div>

        <div id="updateMotorModal" class="modal">
            <div class="modal-content">
                <span class="closee">&times;</span>
                <h2>Update Motorcycle</h2>
                <form id="updateMotorForm" method="POST" action="admin_menu.php">
                    <div>
                        <label for="motorSelect">Select Motorcycle:</label>
                        <select id="motorSelect" name="motorSelect" onchange="getMotorcycleDetails()">
                        <option value="">Select Motorcycle unit.</option>
                                <option value="Kawasaki ZX-10RR">Kawasaki ZX-10RR</option>
                                <option value="Kawasaki Z1000R">Kawasaki Z1000R</option>
                                <option value="Kawasaki Ninja 1000">Kawasaki Ninja 1000</option>
                                <option value="Yamaha YZF R1">Yamaha R1</option>
                                <option value="Yamaha MT-10 SP">Yamaha MT-10 SP</option>
                                <option value="Yamaha YZF R6 RACE">Yamaha YZF R6 RACE</option>
                                <option value="Yamaha YZF R6 2008">Yamaha YZF R6 2008</option>
                                <option value="Ducati Panigale V2">Ducati Panigale V2</option>
                                <option value="Ducati SuperSport 950">Ducati SuperSport 950</option>
                                <option value="Ducati Superleggera V4">Ducati Superleggera V4</option>
                                <option value="Ducati Streetfighter V2">Ducati Streetfighter V2</option>
                                <option value="Ducati Diavel 1260">Ducati Diavel 1260</option>
                                <option value="Honda CBR1000RR-R">Honda CBR1000RR-R</option>
                                <option value="Honda CB1000R">Honda CB1000R</option>
                                <option value="2024 BMW S 1000 RR">2024 BMW S 1000 RR</option>
                                <option value="2024 BMW S 1000 R">2024 BMW S 1000 R</option>
                                <option value="Suzuki Hayabusa R1300">Suzuki Hayabusa R1300</option>
                                <option value="2024 Suzuki GSX-S1000">2024 Suzuki GSX-S1000</option>
                        </select>
                    </div>
                    
                    <div id="motorcycleDetails">

                    </div>

                    <input type="submit" id="updateBtn" onclick="saveMotorcycleDetails()" value="Update" name="update">
                </form>
            </div>
        </div>

        <div id="deleteMotorModal" class="modal">
            <div class="modal-content">
                <span class="closeee">&times;</span>
                <h2>Delete Motorcycle</h2>
                <form id="deleteMotorForm" method="POST" action="admin_menu.php">
                    <div>
                        <label for="motorSelect">Select Motorcycle:</label>
                        <select id="motorSelect" name="motorselect">
                                <option value="">Select Motorcycle unit.</option>
                                <option value="Kawasaki ZX-10RR">Kawasaki ZX-10RR</option>
                                <option value="Kawasaki Z1000R">Kawasaki Z1000R</option>
                                <option value="Kawasaki Ninja 1000">Kawasaki Ninja 1000</option>
                                <option value="Yamaha YZF R1">Yamaha R1</option>
                                <option value="Yamaha MT-10 SP">Yamaha MT-10 SP</option>
                                <option value="Yamaha YZF R6 RACE">Yamaha YZF R6 RACE</option>
                                <option value="Yamaha YZF R6 2008">Yamaha YZF R6 2008</option>
                                <option value="Ducati Panigale V2">Ducati Panigale V2</option>
                                <option value="Ducati SuperSport 950">Ducati SuperSport 950</option>
                                <option value="Ducati Superleggera V4">Ducati Superleggera V4</option>
                                <option value="Ducati Streetfighter V2">Ducati Streetfighter V2</option>
                                <option value="Ducati Diavel 1260">Ducati Diavel 1260</option>
                                <option value="Honda CBR1000RR-R">Honda CBR1000RR-R</option>
                                <option value="Honda CB1000R">Honda CB1000R</option>
                                <option value="2024 BMW S 1000 RR">2024 BMW S 1000 RR</option>
                                <option value="2024 BMW S 1000 R">2024 BMW S 1000 R</option>
                                <option value="Suzuki Hayabusa R1300">Suzuki Hayabusa R1300</option>
                                <option value="2024 Suzuki GSX-S1000">2024 Suzuki GSX-S1000</option>
                        </select>
                        <input type="submit" id="confirmDelete" value="Delete" name="delete">
                </form>
            </div>
        </div>
        
    </div>

    <script src="adminmenu.js"></script>
    <script src="menu.js"></script>
    <script src="adminmodalmenu.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    
</body>
</html>