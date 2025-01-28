<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container">
        <header>
            <h1>Tambah User Baru</h1>
        </header>

        <form action="create.php" method="POST" class="form">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required placeholder="Masukkan username" />
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required placeholder="Masukkan password" />
            </div>
            <button type="submit" class="btn btn-primary">Tambah User</button>
        </form>
    </div>

</body>
</html>

<?php
// Proses data ketika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Menyimpan data ke database
    $stmt = $pdo->prepare("INSERT INTO users (Username, Password) VALUES (?, ?)");
    $stmt->execute([$username, $password]);

    // Redirect ke index.php setelah data berhasil ditambahkan
    header("Location: index.php");
    exit();
}
?>