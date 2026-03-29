<?php
// Database configuration
$host = 'aws-1-ap-northeast-2.pooler.supabase.com';
$dbname = 'postgres';
$user = 'postgres.eprrqfvwyhoipurnkpxn';
$password = 'joren7410852.'; // Replace with your actual password
$port = '5432';

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>