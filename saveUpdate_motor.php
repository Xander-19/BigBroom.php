<?php
    $selectedMotor = $_POST['motor'];
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $availability = $_POST['availability'];

    $xml = simplexml_load_file('sales.xml');

    foreach ($xml->motorcycle as $motorcycle) {
        if ($motorcycle->name == $selectedMotor) {
            $motorcycle->name = $name;
            $motorcycle->brand = $brand;
            $motorcycle->description = $description;
            $motorcycle->price = $price;
            $motorcycle->availability = $availability;
            break;
        }
    }

    $xml->asXML('sales.xml');
?>
