<?php
include 'db.php';

$message = '';
if (isset($_GET['deleted'])) {
    $message = 'Response deleted successfully!';
}

try {
    $stmt = $pdo->query("SELECT id, name, email, question1, created_at FROM responses ORDER BY created_at DESC");
    $responses = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching responses: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Responses</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="glass-container">
        <h1>Submitted Responses</h1>
        <a href="index.php">Back to Form</a>
        <?php if ($message): ?>
            <div class="message"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Question 1</th>
                    <th>Submitted At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($responses) > 0): ?>
                    <?php foreach ($responses as $response): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($response['id']); ?></td>
                            <td><?php echo htmlspecialchars($response['name']); ?></td>
                            <td><?php echo htmlspecialchars($response['email']); ?></td>
                            <td><?php echo htmlspecialchars($response['question1']); ?></td>
                            <td><?php echo htmlspecialchars($response['created_at']); ?></td>
                            <td><a href="delete.php?id=<?php echo $response['id']; ?>" class="delete-link" onclick="return confirm('Are you sure you want to delete this response?')">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No responses yet.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>