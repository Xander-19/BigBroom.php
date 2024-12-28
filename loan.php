<?php 
    $page_title = "Loan";
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
    <link rel="stylesheet" href="loan.css">
    <link rel="stylesheet" href="paymentmodal.css">
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
                <div class="qout">
                    <h2>Low Interest loan in BigBroom Shop!</h2>
                    <p>Sign up or Create an account before you fill-up the form.
                        <a href="login.php">Sign up here!</a>
                    </p>
                </div>
            </div>
            <form id="loanForm" enctype="multipart/form-data">
            <div class="content">
                <div>
                    <h2>Fill out this form to apply for a loan!</h2>
                    <p>(<span class="aste">*</span>) means required.</p>
                    <div class="loan-cash">
                        <div>
                            <input type="radio" name="loanOcash" id="loan" value="loan" class="LC" required>
                            <label for="loan">LOAN</label>
                        </div>
                        <div>
                            <input type="radio" name="loanOcash" id="cash" value="cash" class="LC" required>
                            <label for="cash">CASH</label>
                        </div>
                    </div>
                </div>
                <div class="formLogo">
                    <a href="index.php"><img src="img/logoBSM.jpg" alt="BSM Logo" id="FormLogo"></a>
                </div>
            </div>
            <div class="formFillUp">
                <div class="section">
                    <div>
                        <label for="motorUnit" class="lblTxt"><span class="aste">*</span>MOTORCYCLE UNIT</label><br>
                        <select name="motorUnit" id="motorUnit" class="inputtxt" required>
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
                            <option value="2024 BMW S 1000 RR">BMW S1000RR</option>
                            <option value="2024 BMW S 1000 R">2024 BMW S 1000 R</option>
                            <option value="Suzuki Hayabusa R1300">Suzuki Hayabusa R1300</option>
                            <option value="2024 Suzuki GSX-S1000">2024 Suzuki GSX-S1000</option>
                        </select>
                    </div>
                    <div>
                        <label for="motorPrice" class="lblTxt">MOTORCYCLE PRICE</label><br>
                        <input type="text" name="motorPrice" id="motorPrice" class="inputtxt" required>
                    </div>
                    <div>
                        <label for="motorDp" class="lblTxt"><span class="aste">*</span>DOWNPAYMENT</label><br>
                        <input type="number" name="motorDp" id="motorDp" class="inputtxt" placeholder="20k minimum dp/If Cash exact price." min="20000" required>
                    </div>
                </div>

                <div class="section">
                    <div>
                        <label for="lastName" class="lblTxt"><span class="aste">*</span>LASTNAME</label><br>
                        <input type="text" name="lastName" id="lastName" class="Fname" placeholder="Enter your lastname." required>
                    </div>
                    <div>
                        <label for="firstName" class="lblTxt"><span class="aste">*</span>FIRSTNAME</label><br>
                        <input type="text" name="firstName" id="firstName" class="Fname" placeholder="Enter your firstname." required>
                    </div>
                    <div>
                        <label for="middleName" class="lblTxt"><span class="aste">*</span>MIDDLENAME</label><br>
                        <input type="text" name="middleName" id="middleName" class="Fname" placeholder="Enter your middlename." required>
                    </div>
                </div>

                <div class="section">
                    <div>
                        <label for="birthday" class="lblTxt"><span class="aste">*</span>BIRTHDAY</label><br>
                        <input type="date" name="birthday" id="birthday" class="bday-age" required>
                    </div>
                    <div>
                        <label for="age" class="lblTxt"><span class="aste">*</span>AGE</label><br>
                        <input type="number" name="age" id="age" class="bday-age" placeholder="Enter your age." required>
                    </div>
                    <div class="civil">
                        <label for="civilStatus" class="lblTxt"><span class="aste">*</span>CIVIL STATUS</label><br>
                        <div>
                            <span>
                                <input type="radio" name="civilStatus" id="single" value="single" class="SM" required>
                                <label for="single">SINGLE</label>
                            </span>
                            <span>
                                <input type="radio" name="civilStatus" id="married" value="married" class="SM" required>
                                <label for="married">MARRIED</label>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="section1">
                    <div>
                        <label for="address" class="lblTxt"><span class="aste">*</span>ADDRESS</label><br>
                        <input type="text" name="address" id="address" class="Address" placeholder="Enter your address." required>
                    </div>
                    <div>
                        <label for="permanentAddress" class="lblTxt"><span class="aste">*</span>PERMANENT ADDRESS</label><br>
                        <input type="text" name="permanentAddress" id="permanentAddress" class="Address" placeholder="Enter your permanent address." required>
                    </div>
                </div>
                
                <div class="section">
                    <div>
                        <label for="email" class="lblTxt"><span class="aste">*</span>EMAIL</label><br>
                        <input type="email" name="email" id="email" class="contact" placeholder="Enter your email." required>
                    </div>
                    <div>
                        <label for="facebook" class="lblTxt"><span class="aste">*</span>FACEBOOK LINK</label><br>
                        <input type="text" name="facebook" id="facebook" class="contact" placeholder="Enter your facebook link." required>
                    </div>
                </div>

                <div class="section">
                    <div>
                        <label for="phoneNumber1" class="lblTxt"><span class="aste">*</span>PHONE NUMBER1</label><br>
                        <input type="text" name="phoneNumber1" id="phoneNumber1" class="contact" placeholder="Enter your phone number1." required>
                    </div>
                    <div>
                        <label for="phoneNumber2" class="lblTxt"><span class="aste">*</span>PHONE NUMBER2</label><br>
                        <input type="text" name="phoneNumber2" id="phoneNumber2" class="contact" placeholder="Enter your phone number2." required>
                    </div>
                </div>
                
                <div class="section">
                    <div>
                        <label for="validId1" class="lblTxt"><span class="aste">*</span>1. VALID ID</label><br>
                        <input type="file" name="validId1" id="validId1" class="picid" required>
                    </div>
                    <div>
                        <label for="validId2" class="lblTxt"><span class="aste">*</span>2. VALID ID</label><br>
                        <input type="file" name="validId2" id="validId2" class="picid" required>
                    </div>
                </div>

                <div class="section">
                    <div>
                        <label for="selfiePhoto" class="lblTxt"><span class="aste">*</span>UPLOAD SELFIE PHOTO</label><br>
                        <input type="file" name="selfiePhoto" id="selfiePhoto" class="picid" required>
                    </div>
                </div>

                <div class="submit">
                    <button type="button" id="btnSubmit" name="submit" style="vertical-align:middle" class="sub"><span>Submit</span></button>
                </div>
            </div>
        </form>

        <div id="paymentModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Payment Method</h2>
                <form id="paymentForm">
                    <div id="pay">
                        <div>
                            <input type="radio" id="cod" name="PaymentMethod" value="cod" required>
                            <label for="cod">COD</label>
                        </div>
                        <div>
                            <input type="radio" id="bTransfer" name="PaymentMethod" value="bankTransfer" required>
                            <label for="bTransfer">Bank Transfer</label>
                        </div>
                    </div>
                    <div id="chck">
                        <input type="checkbox" id="tnc" name="TnC" required>
                        <label for="tnc">I agree to the <a href="termsCondition.php" target="_blank" id="TncBtn">Terms and Conditions</a>.</label>
                    </div>
                    <button type="submit" id="subBtn">Submit</button>
                </form>
            </div>
        </div>

        <div class="content2">
            <div class="menu">
                <div id="products" data-aos="fade-in">
            </div>

            <div class="seemor">
                <a class="seem" href="menupage.php" style="vertical-align:middle"><span>SEE ALL</span></a>
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
    <script src="paymentmodal.js"></script>
    <script src="menu.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>
</html>