<?php

    $conn = new mysqli('localhost', 'root', '', 'bigbroomDB');  

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $loanOcash = $_POST['loanOcash'];
        $motorUnit = $_POST['motorUnit'];
        $motorPrice = $_POST['motorPrice'];
        $motorDp = $_POST['motorDp'];
        $lastName = $_POST['lastName'];
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $birthday = $_POST['birthday'];
        $age = $_POST['age'];
        $civilStatus = $_POST['civilStatus'];
        $address = $_POST['address'];
        $permanentAddress = $_POST['permanentAddress'];
        $email = $_POST['email'];
        $facebook = $_POST['facebook'];
        $phoneNumber1 = $_POST['phoneNumber1'];
        $phoneNumber2 = $_POST['phoneNumber2'];
        $paymentMethod = $_POST['PaymentMethod'];

        // Handle file uploads
        $validId1 = $_FILES['validId1']['name'];
        $validId2 = $_FILES['validId2']['name'];
        $selfiePhoto = $_FILES['selfiePhoto']['name'];
        
        $target_dir = "img/";
        $validId1_target = $target_dir . basename($validId1);
        $validId2_target = $target_dir . basename($validId2);
        $selfiePhoto_target = $target_dir . basename($selfiePhoto);
        
        move_uploaded_file($_FILES['validId1']['tmp_name'], $validId1_target);
        move_uploaded_file($_FILES['validId2']['tmp_name'], $validId2_target);
        move_uploaded_file($_FILES['selfiePhoto']['tmp_name'], $selfiePhoto_target);
        
        // Insert data into the database
        $sql = "INSERT INTO loan_applications (loanOcash, motorUnit, motorPrice, motorDp, lastName, firstName, middleName, birthday, age, civilStatus, address, permanentAddress, email, facebook, phoneNumber1, phoneNumber2, validId1, validId2, selfiePhoto, paymentMethod) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssssssssssssss", $loanOcash, $motorUnit, $motorPrice, $motorDp, $lastName, $firstName, $middleName, $birthday, $age, $civilStatus, $address, $permanentAddress, $email, $facebook, $phoneNumber1, $phoneNumber2, $validId1_target, $validId2_target, $selfiePhoto_target, $paymentMethod);
        
        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $stmt->close();
    }

    $conn->close();
?>
