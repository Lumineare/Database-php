<?php
include 'config.php';

$stmt = $pdo->query("SELECT * FROM users ORDER BY Id ASC");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container">
        <header>
            <h1>Daftar User</h1>
            <a href="create.php" class="btn btn-primary">Tambah User Baru</a>
        </header>

        <?php if (empty($users)): ?>
            <p class="no-data">Tidak ada data user.</p>
        <?php else: ?>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['Id']); ?></td>
                            <td><?php echo htmlspecialchars($user['Username']); ?></td>
                            <td><?php echo htmlspecialchars($user['Password']); ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $user['Id']; ?>" class="btn btn-edit">Edit</a> 
                                <a href="delete.php?id=<?php echo $user['Id']; ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

</body>
</html>