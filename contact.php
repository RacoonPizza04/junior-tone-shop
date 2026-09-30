<?php
require __DIR__ . "/db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$name    = trim($_POST["full_name"] ?? "");
$email   = trim($_POST["email"] ?? "");
$subject = trim($_POST["subject"] ?? "");
$message = trim($_POST["message"] ?? "");

if ($name === "" || $subject === "" || $message === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: index.php?status=invalid#contact");
    exit;
}

if ($conn === null) {
    header("Location: index.php?status=error#contact");
    exit;
}

try {
    $stmt = $conn->prepare("INSERT INTO messages (full_name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);
    $stmt->execute();
    $stmt->close();
    header("Location: index.php?status=success#contact");
} catch (mysqli_sql_exception $e) {
    header("Location: index.php?status=error#contact");
}
exit;
