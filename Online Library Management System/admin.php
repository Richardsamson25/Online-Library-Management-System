<?php
include('../config.php');
session_start();

// Check if the user is an admin
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../login.php");
    exit();
}

// Fetch all users and books
$sql_users = "SELECT * FROM users";
$result_users = $conn->query($sql_users);

$sql_books = "SELECT * FROM books";
$result_books = $conn->query($sql_books);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <a href="../logout.php">Logout</a>
    <h2>Manage Users</h2>
    <ul>
        <?php while ($user = $result_users->fetch_assoc()): ?>
            <li><?php echo $user['username']; ?> - <a href="edit_user.php?id=<?php echo $user['id']; ?>">Edit</a> - <a href="delete_user.php?id=<?php echo $user['id']; ?>">Delete</a></li>
        <?php endwhile; ?>
    </ul>
    <h2>Manage Books</h2>
    <a href="add_book.php">Add Book</a>
    <ul>
        <?php while ($book = $result_books->fetch_assoc()): ?>
            <li><?php echo $book['title']; ?> - <a href="edit_book.php?id=<?php echo $book['id']; ?>">Edit</a> - <a href="delete_book.php?id=<?php echo $book['id']; ?>">Delete</a></li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
