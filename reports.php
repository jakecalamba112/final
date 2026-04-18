<?php
require_once "config.php";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_report'])) {
    // Get count for current month
    $current_month = date('m');
    $res = $mysqli->query("SELECT COUNT(*) as total FROM borrowers WHERE MONTH(date_borrowed) = $current_month");
    $total = $res->fetch_assoc()['total'];

    $title = "Monthly Summary - " . date('F Y');
    $summary = "Total transactions for " . date('F Y') . ": " . $total;


    $mysqli->query("INSERT INTO reports (report_title, total_transactions, report_summary) 
                    VALUES ('$title', $total, '$summary')");

    header("Location: reports.php");
    exit;
}

include_once "header.php";


$current_month_count = $mysqli->query("SELECT COUNT(*) FROM borrowers WHERE MONTH(date_borrowed) = MONTH(CURDATE())")->fetch_row()[0];
$history_res = $mysqli->query("SELECT * FROM reports ORDER BY generated_date DESC");
?>

<div class="container">

    <div class="card">
        <h2>Monthly Summary - <?php echo date('F Y'); ?></h2>
        <p><strong>Current Transactions:</strong> <?php echo $current_month_count; ?></p>

        <form method="POST">
            <button type="submit" name="save_report" class="btn-home" style="padding:10px 20px; border:none; cursor:pointer;">Save Report to History</button>
            <button type="button" class="btn-home" onclick="window.print()" style="padding:10px 20px; border:none; background-color: #6c757d; color:white !important;">Print Page</button>
        </form>
    </div>


    <div class="card">
        <h2>Report History</h2>
        <table>
            <thead>
                <tr>
                    <th>Report Title</th>
                    <th>Date Generated</th>
                    <th>Total Transactions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $history_res->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['report_title']); ?></td>
                        <td><?php echo date("M d, Y", strtotime($row['generated_date'])); ?></td>
                        <td><?php echo $row['total_transactions']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once "footer.php"; ?>