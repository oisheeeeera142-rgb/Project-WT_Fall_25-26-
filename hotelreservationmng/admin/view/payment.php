<!DOCTYPE html>
<html >
<head>
<title>Payment Form</title>
<link rel="stylesheet" href="Payment.css">


</head>
<body>

<h2>Payment Form</h2>
<form action="payment.php" method="post">
<label>Payment Method:</label>
<select name="method" required>
<option value="">-- Select payment Method --</option>
<option value="Card">Card</option>
<option value="Cash">Cash</option>
</select>

<label>Status:</label>
<select name="status" required>
<option value="">-- Select status --</option>
<option value="Paid">Paid</option>
<option value="Pending">Pending</option>
<option value="Failed">Failed</option>
</select>

<label>Date & Time:</label>
<input type="datetime-local" name="datetime" required>

<button type="submit">Save Payment</button>
<script src="payment.js"></script>
</form>

</body>
</html>