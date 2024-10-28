<?php
include "controller.php";
?>
<?php
@$_id = $_GET['id'];
$sql = "DELETE FROM `contacts` WHERE id=$id ";
if ($result = execute($sql)) {
   echo "<script>alert('Properties Deleted Succcessfully')</script>";
} else {
    echo "error:" . $sql . "<br>" . $conn->error;
}
?>