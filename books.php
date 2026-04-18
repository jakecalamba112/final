<?php
require_once "config.php";
include_once "header.php";
?>

<div class="main-container">
    <div class="table-card">
        <h2>Book Inventory</h2>

        <a href="add_book.php" class="btn-home" style="padding:10px 15px; text-decoration:none; display:inline-block; margin-bottom:15px;">+ New Book</a>

        <table>
            <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Stocks Left</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $res = $mysqli->query("SELECT * FROM books ORDER BY title ASC");
                while ($row = $res->fetch_assoc()):
                    $status_color = ($row['stocks'] > 0) ? 'active' : 'blocked';
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['title']); ?></td>
                        <td><?php echo htmlspecialchars($row['author']); ?></td>
                        <td><?php echo htmlspecialchars($row['stocks']); ?></td>
                        <td><span class="badge <?php echo $status_color; ?>">
                                <?php echo ($row['stocks'] > 0) ? 'Available' : 'Out of Stock'; ?>
                            </span></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once "footer.php"; ?>