<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Mengambil data user berdasarkan ID
    $stmt = $pdo->prepare("SELECT * FROM users WHERE Id = ?");
    $stmt->execute([$id]);
    $user = $stmt->fetch();

    if (!$user) {
        // Jika data user tidak ditemukan
        echo "User tidak ditemukan.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container">
        <header>
            <h1>Edit User</h1>
        </header>

        <form action="edit.php?id=<?php echo $user['Id']; ?>" method="POST" class="form">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['Username']); ?>" required />
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($user['Password']); ?>" required />
            </div>
            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
    </div>

</body>
</html>

<?php
// Proses data ketika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Update data user di database
    $stmt = $pdo->prepare("UPDATE users SET Username = ?, Password = ? WHERE Id = ?");
    $stmt->execute([$username, $password, $id]);

    // Redirect ke index.php setelah data berhasil diupdate
    header("Location: index.php");
    exit();
}
?>