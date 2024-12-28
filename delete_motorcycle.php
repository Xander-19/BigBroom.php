<?php
    if (isset($_POST['delete'])) {

        $xml = new DomDocument("1.0", "UTF-8");
        $xml->load('sales.xml');

        $motorDelete = $_POST['motorselect'];

        $xpath = new DOMXPATH($xml);

        foreach ($xpath->query("/motorcycles/motorcycle[name = '$motorDelete']") as $node) {
            $node->parentNode->removeChild($node);
            echo 'Delete Successfully!';
        }

        $xml->formatoutput = true;
        $xml->save('sales.xml');

    }
?>
