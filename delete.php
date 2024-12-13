<?php
$conn = new mysqli('localhost', 'root', '', 'Lab_5b');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$matric = $_GET['matric'];

$stmt = $conn->prepare("DELETE FROM users WHERE matric = ?");
$stmt->bind_param("s", $matric);

if ($stmt->execute()) {
    header("Location: display.php");
    exit;
} else {
    echo "Error deleting record: " . $stmt->error;
}
$stmt->close();
?>
