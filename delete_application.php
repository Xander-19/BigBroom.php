<?php 

    $conn = new mysqli('localhost', 'root', '', 'bigbroomDB');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = intval($_POST["id"]);

        $sql = "DELETE FROM loan_applications WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Application deleted successfully.";
        } else {
            echo "Error deleting application: " . $conn->error;
        }

        $stmt->close();
    }

    $conn->close();

?>