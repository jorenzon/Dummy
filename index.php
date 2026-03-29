<?php
include 'db.php';

$message = '';

if (isset($_GET['success'])) {
    $message = 'Response submitted successfully!';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $question1 = $_POST['question1'] ?? '';

    if ($name && $email && $question1) {
        $stmt = $pdo->prepare("INSERT INTO responses (name, email, question1) VALUES (?, ?, ?)");
        if ($stmt->execute([$name, $email, $question1])) {
            header('Location: index.php?success=1');
            exit();
        } else {
            $message = 'Error submitting response.';
        }
    } else {
        $message = 'Please fill in all fields.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="glass-container">
        <h1>Simple Form</h1>
        <?php if ($message): ?>
            <div class="message"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        <form method="post">
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="question1">What is your favorite color?</label>
                <input type="text" id="question1" name="question1" required>
            </div>
            <input type="submit" value="Submit">
        </form>
        <br>
        <a href="view_responses.php">View Submitted Responses</a>
    </div>
</body>
</html>