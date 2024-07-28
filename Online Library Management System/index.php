<?php
include('../config.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$sql = "SELECT * FROM books";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
</head>
<body>
    <h1>Books</h1>
    <a href="../dashboard.php">Back to Dashboard</a>
    <ul>
        <?php while ($book = $result->fetch_assoc()): ?>
            <li><?php echo $book['title']; ?> - <a href="borrow.php?id=<?php echo $book['id']; ?>">Borrow</a></li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
