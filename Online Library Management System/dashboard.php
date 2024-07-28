<?php
include('config.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch user data and borrowed books
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

$sql_books = "SELECT books.title FROM borrowed_books INNER JOIN books ON borrowed_books.book_id = books.id WHERE borrowed_books.user_id = '$user_id'";
$result_books = $conn->query($sql_books);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo $user['username']; ?></h1>
    <a href="logout.php">Logout</a>
    <h2>Your Borrowed Books</h2>
    <ul>
        <?php while ($book = $result_books->fetch_assoc()): ?>
            <li><?php echo $book['title']; ?></li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
