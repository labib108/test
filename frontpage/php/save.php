<?php
$host = 'localhost';
$db = 'api_test'; 
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
} catch (PDOException $e) {
    die("DB connection failed: " . $e->getMessage());
}

// Sanitize inputs
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$dob = trim($_POST['dob'] ?? '');
$message = trim($_POST['message'] ?? '');

if (!$name || !$email || !$phone || !$dob || !$message) {
    echo "<script>alert('Please fill all the fields.'); window.history.back();</script>";
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Invalid email address.'); window.history.back();</script>";
    exit;
}

$sql = "INSERT INTO contacts (name, email, phone, dob, message) VALUES (:name, :email, :phone, :dob, :message)";
$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':phone' => $phone,
        ':dob' => $dob,
        ':message' => $message,
    ]);

    // ✅ Show JS alert and reload
    echo "<script>
        alert('🎉 Congratulations! Your appointment has been submitted successfully.');
        window.location.href = document.referrer || '/';
    </script>";

} catch (PDOException $e) {
    echo "<script>alert('Error saving form: " . $e->getMessage() . "'); window.history.back();</script>";
}
