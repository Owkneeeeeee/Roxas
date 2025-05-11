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

$sql = "SELECT * FROM messages ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Message Admin</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; border: 1px solid #ff4757; text-align: left; }
        th { background-color: #ff4757; color: white; }
    </style>
</head>
<body>
    <h1>Messages</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["name"]."</td>
                        <td>".$row["email"]."</td>
                        <td>".$row["message"]."</td>
                        <td>".$row["created_at"]."</td>
                        <td>
                            <a href='edit_message.php?id=".$row["id"]."'>Edit</a> | 
                            <a href='delete_message.php?id=".$row["id"]."'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No messages found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>