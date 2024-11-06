<?php
// Connect to database
include 'inc/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch the contact's existing details
    $result = $conn->query("SELECT * FROM contacts WHERE id = '$id'");
    $contact = $result->fetch_assoc();

    // Update contact on form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        
        $sql = "UPDATE contacts SET name='$name', email='$email', phone='$phone', address='$address' WHERE id='$id'";
        
        if ($conn->query($sql)) {
            header("Location: index.php"); // Redirect to the main page after editing
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
} else {
    echo "No contact ID provided.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Contact</h2>
        
        <!-- Edit Contact Form -->
        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($contact['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($contact['email']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($contact['phone']); ?>">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address"><?php echo htmlspecialchars($contact['address']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Contact</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
