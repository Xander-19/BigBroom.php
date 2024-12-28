<?php
$xml = simplexml_load_file('sales.xml');
$selectedMotor = $_GET['motor'];

foreach ($xml->motorcycle as $motorcycle) {
    if ($motorcycle->name == $selectedMotor) {
    
        echo '<label for="nameInput">Name:</label>';
        echo '<input type="text" id="nameInput" name="nameInput" value="' . $motorcycle->name . '">';

        echo '<label for="brandInput">Brand:</label>';
        echo '<input type="text" id="brandInput" name="brandInput" value="' . $motorcycle->brand . '">';

        echo '<label for="descriptionInput">Description:</label>';
        echo '<input type="text" id="descriptionInput" name="descriptionInput" value="' . $motorcycle->description . '">';

        echo '<label for="priceInput">Price:</label>';
        echo '<input type="text" id="priceInput" name="priceInput" value="' . $motorcycle->price . '">';

        echo '<label for="availabilityInput">Availability:</label>';
        echo '<input type="text" id="availabilityInput" name="availabilityInput" value="' . $motorcycle->availability . '">';

        break;
    }
}
?>
