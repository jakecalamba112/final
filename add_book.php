<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_book'])) {
    $title = $mysqli->real_escape_string($_POST['title']);
    $author = $mysqli->real_escape_string($_POST['author']);
    $stocks = intval($_POST['stocks']);

    $mysqli->query("INSERT INTO books (title, author, stocks, status) VALUES ('$title', '$author', $stocks, 'Available')");

    header("Location: books.php");
    exit;
}

include_once "header.php";
?>

<div class="container">
    <div class="card">
        <h2>Add New Book</h2>
        <form method="POST">
            <div style="margin-bottom:15px;">
                <label>Book Title</label>
                <input type="text" name="title" required style="width:100%; padding:10px; box-sizing:border-box;">
            </div>
            <div style="margin-bottom:15px;">
                <label>Author</label>
                <input type="text" name="author" required style="width:100%; padding:10px; box-sizing:border-box;">
            </div>
            <div style="margin-bottom:15px;">
                <label>Stocks</label>
                <input type="number" name="stocks" value="1" min="0" required style="width:100%; padding:10px; box-sizing:border-box;">
            </div>
            <button type="submit" name="add_book" class="btn-home" style="padding:10px 20px; border:none; cursor:pointer;">Save Book</button>
        </form>
    </div>
</div>

<?php include_once "footer.php"; ?>