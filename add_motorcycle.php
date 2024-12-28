<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $xmlFile = 'sales.xml';

        $xml = simplexml_load_file($xmlFile);
        $newMotorcycle = $xml->addChild('motorcycle');

        $imagePath = 'img/' . basename($_FILES['motorImage']['name']);
        move_uploaded_file($_FILES['motorImage']['tmp_name'], $imagePath);
        $newMotorcycle->addChild('path', $imagePath);

        // Adding data
        $newMotorcycle->addChild('alteration', $_POST['motorAlteration']);
        $newMotorcycle->addChild('name', $_POST['motorName']);
        $newMotorcycle->addChild('brand', $_POST['motorBrand']);
        $newMotorcycle->addChild('description', $_POST['motorDescription']);
        $newMotorcycle->addChild('price', $_POST['motorPrice']);
        $newMotorcycle->addChild('availability', $_POST['motorAvailability']);

        // Save the updated XML
        $xml->asXML($xmlFile);

        echo 'Success';
    } else {
        echo 'Invalid request method.';
    }

?>