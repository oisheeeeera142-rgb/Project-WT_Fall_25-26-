<?php include("../controller/paymentmng.php"); ?>

<!DOCTYPE html>
<html>
<head>
<title>Payment Management</title>
<script src="../js/payment.js"></script>
</head>
<body>

<h2>Payment Management</h2>
<button id="switchmotion" onclick="toggleForm()">Add Payment</button>

<div id="addPaymentForm" style="display:none;">
<form method="post" action="payment.php">
    Booking:
    <select name="booking_id">
        <?php
        $bookings = mysqli_query($conn, "SELECT id, guest_name FROM bookings");
        while ($b = mysqli_fetch_assoc($bookings)) {
            echo "<option value='{$b['id']}'>Booking {$b['id']} - {$b['guest_name']}</option>";
        }
        ?>
    </select><br><br>

    Amount: <input type="number" name="amount" value="<?php echo $editPayment['amount'] ?? ''; ?>"><br><br>
    Method:
    <select name="method">
        <option value="Cash" <?php if(($editPayment['method'] ?? '') === 'Cash') echo 'selected'; ?>>Cash</option>
        <option value="Card" <?php if(($editPayment['method'] ?? '') === 'Card') echo 'selected'; ?>>Card</option>
        <option value="OnlineWallet" <?php if(($editPayment['method'] ?? '') === 'OnlineWallet') echo 'selected'; ?>>Online Wallet</option>
    </select><br><br>

    Status:
    <select name="status">
        <option value="Pending" <?php if(($editPayment['status'] ?? '') === 'Pending') echo 'selected'; ?>>Pending</option>
        <option value="Completed" <?php if(($editPayment['status'] ?? '') === 'Completed') echo 'selected'; ?>>Completed</option>
        <option value="Failed" <?php if(($editPayment['status'] ?? '') === 'Failed') echo 'selected'; ?>>Failed</option>
    </select><br><br>

    Date: <input type="date" name="payment_date" value="<?php echo $editPayment['payment_date'] ?? ''; ?>"><br><br>
    Time: <input type="time" name="payment_time" value="<?php echo $editPayment['payment_time'] ?? ''; ?>"><br><br>

    <?php if (!empty($editPayment)): ?>
        <input type="hidden" name="id" value="<?php echo $editPayment['id']; ?>">
        <input type="submit" name="update" value="Update Payment">
    <?php else: ?>
        <input type="submit" name="add" value="Add Payment">
    <?php endif; ?>
</form>
</div>

<p style="color:green;"><?php echo $success; ?></p>
<p style="color:red;"><?php echo $error; ?></p>
<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Booking</th>
    <th>Guest</th>
    <th>Amount</th>
    <th>Method</th>
    <th>Status</th>
    <th>Date</th>
    <th>Time</th>
    <th>Action</th>
</tr>

<?php
if ($payments && mysqli_num_rows($payments) > 0) {
    while ($row = mysqli_fetch_assoc($payments)) {
?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['booking_id']; ?></td>
    <td><?php echo $row['guest_name']; ?></td>
    <td><?php echo $row['amount']; ?></td>
    <td><?php echo $row['method']; ?></td>
    <td><?php echo $row['status']; ?></td>
    <td><?php echo $row['payment_date']; ?></td>
    <td><?php echo $row['payment_time']; ?></td>
    <td>
        <a href="payment.php?edit=<?php echo $row['id']; ?>">Edit</a> |
        <a href="payment.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
    </td>
</tr>
<?php
    }
} else {
    echo "<tr><td colspan='9'>No payments found.</td></tr>";
}
?>
</table>

