<?php
include "db.php";
include "controller.php";

// Check if 'id' is provided in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);  // Ensure 'id' is an integer to prevent SQL injection
    $sql = "DELETE FROM contacts WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('User Deleted Successfully');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "No ID specified for deletion.";
}

// Redirect back to main page
header("Location: index.php");
exit();
?>
