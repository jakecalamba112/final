<?php
require_once "config.php";

if (isset($_GET['return_id'])) {
    $borrower_id = intval($_GET['return_id']);
    $book_id = intval($_GET['book_id']);


    $mysqli->query("UPDATE books SET stocks = stocks + 1 WHERE id = $book_id");


    $mysqli->query("DELETE FROM borrowers WHERE id = $borrower_id");

    header("Location: borrowers.php");
    exit;
}

include_once "header.php";
?>

<div class="main-container">
    <div class="table-card">
        <h2>Borrower Registry</h2>
        <a href="borrow_book.php" class="btn-home" style="padding:10px 15px; text-decoration:none; display:inline-block; margin-bottom:15px;">+ New Borrow Transaction</a>

        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Book Borrowed</th>
                    <th>Date Borrowed</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $res = $mysqli->query("SELECT * FROM borrowers");
                while ($row = $res->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['book_borrowed']); ?></td>
                        <td><?php echo date("M d, Y", strtotime($row['date_borrowed'])); ?></td>
                        <td>

                            <a href="borrowers.php?return_id=<?php echo $row['id']; ?>&book_id=<?php echo $row['book_id']; ?>"
                                class="badge active" style="text-decoration:none;">Return Book</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once "footer.php"; ?>