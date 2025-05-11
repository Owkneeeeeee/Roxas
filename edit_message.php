<?php
// Database Configuration for InfinityFree
$servername = "sql105.infinityfree.com";
$username = "if0_38954181";
$password = "jn3IEtACoazCZ";
$dbname = "if0_38954181_Portfolio";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM messages WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);
    
    $update_sql = "UPDATE messages SET name='$name', email='$email', message='$message' WHERE id=$id";
    
    if ($conn->query($update_sql) {
        header("Location: admin_messages.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Message</title>
    <style>
        input, textarea { width: 100%; padding: 10px; margin-bottom: 15px; }
        button { background: #ff4757; color: white; padding: 10px 20px; border: none; }
    </style>
</head>
<body>
    <h1>Edit Message</h1>
    <form method="POST">
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
        <textarea name="message" required><?php echo $row['message']; ?></textarea><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>

<?php $conn->close(); ?>