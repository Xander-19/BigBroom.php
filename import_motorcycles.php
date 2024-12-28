<?php
    $conn = new mysqli('localhost', 'root', '', 'bigbroomDB');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Load XML file
    $xml = simplexml_load_file('sales.xml') or die("Error: Cannot create object");

    foreach ($xml->motorcycle as $motorcycle) {
        $path = $motorcycle->path;
        $name = $motorcycle->name;
        $brand = $motorcycle->brand;
        $description = $motorcycle->description;
        $price = $motorcycle->price;
        $availability = $motorcycle->availability;

        // Insert data into database
        $sql = "INSERT INTO motorcycles (path, name, brand, description, price, availability)
                VALUES ('$path', '$name', '$brand', '$description', '$price', '$availability')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close connection
    $conn->close();
?>

