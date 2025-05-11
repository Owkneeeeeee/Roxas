<?php
// Database Configuration for InfinityFree
$servername = "sql304.infinityfree.com";
$username = "if0_38953401";
$password = "WebSystemsFinal";
$dbname = "if0_38953401_portfolio_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "DELETE FROM messages WHERE id=$id";

if ($conn->query($sql)) {
    header("Location: admin_messages.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>