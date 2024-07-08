<?php
require_once 'config.php';

// Fetch contacts from the database
$stmt = $pdo->query("SELECT * FROM contacts");
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Management System</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <h1>Contact Management System</h1>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
            <h2 class="mb-3 mb-md-0">📞Contacts</h2>
            <a href="add.php" class="btn btn-primary mb-3 mb-md-0">Add Contact</a>
        </div>
        <div class="card-deck">
            <?php foreach ($contacts as $contact): ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $contact['name'] ?>
                            <div class="float-right">
                                <a href="edit.php?id=<?= $contact['id'] ?>">📝</a>
                                <a href="delete.php?id=<?= $contact['id'] ?>"
                                    onclick="return confirm('Are you sure you want to delete this contact?')">🗑️</a>
                            </div>
                        </h5>
                        <p class="card-text"><?= 'Phone: ' . $contact['phone'] ?></p>
                        <p class="card-text"><?= 'Email: ' . $contact['email'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS bundle -->
    <script src="bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>