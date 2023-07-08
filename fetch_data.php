<?php require 'db/db_conn.php'; ?>

<table class="table">
    <thead>
        <th>id</th>
        <th>name</th>
        <th>price</th>
    </thead>
    <?php foreach(mysqli_query($conn, "SELECT * FROM products") as $row): ?>
        <tbody>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['price']; ?></td>
            </tr>
        </tbody>
    <?php endforeach; ?>
</table>