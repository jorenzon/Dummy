<?php
include 'db.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];
    try {
        $stmt = $pdo->prepare("DELETE FROM responses WHERE id = ?");
        $stmt->execute([$id]);
        header('Location: view_responses.php?deleted=1');
        exit();
    } catch (PDOException $e) {
        die("Error deleting response: " . $e->getMessage());
    }
} else {
    header('Location: view_responses.php');
    exit();
}
?>