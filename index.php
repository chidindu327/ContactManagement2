<?php
// Connect to database
include 'inc/db.php';

// Insert new contact
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    
    $sql = "INSERT INTO contacts (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";
    $conn->query($sql);
}

// Fetch contacts
$contacts = $conn->query("SELECT * FROM contacts");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Contact Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Customer Contact Management</h2>

        <!-- Add Contact Form -->
        <form method="POST" class="mb-4">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Contact</button>
        </form>

        <!-- Contact List -->
        <h4>Contact List</h4>
<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php while($contact = $contacts->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($contact['name']); ?></td>
            <td><?php echo htmlspecialchars($contact['email']); ?></td>
            <td><?php echo htmlspecialchars($contact['phone']); ?></td>
            <td><?php echo htmlspecialchars($contact['address']); ?></td>
            <td>
                <a href="edit.php?id=<?php echo $contact['id']; ?>">
                    <button class="btn btn-warning">Edit</button>
                </a>
                <a href="inc/delete.php?id=<?php echo $contact['id']; ?>" onclick="return confirm('Are you sure you want to delete this contact?');">
                    <button class="btn btn-danger">Delete</button>
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
        
    </tbody>
</table>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>