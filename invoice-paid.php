<?php
session_start();
require 'connection.php';
$invoiceNo = $_GET['id'];

$query = "SELECT * FROM orders WHERE orderId='$invoiceNo'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
?>


<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Invoice</title>
	<link rel="stylesheet" type="text/css" href="invoice.css">
</head>

<body>


	<div class="invoice_container">
		<div class="invoice_header">
			<div class="logo_container">
				<img src="images/logo 1.jpg">
			</div>
			<div class="invoice-details">
				email: mandifashion@gmail.com<br>
				Contact: 0741200747
			</div>
		</div>
		<h2>
			<center>INVOICE
		</h2>
	</div>
	
	<div class="customer_container">
		<div>
			<h2>Billing to:</h2>
			<table>
				<tr>
					<td><b>Name</b></td>
					<td>:</td>
					<td>
						<?php echo $row['name']; ?>
					</td>
				</tr>
				<tr>
					<td><b>Phone Number</b></td>
					<td>:</td>
					<td>
						<?php echo $row['phone1']; ?>
					</td>
				</tr>
				<tr>
					<td><b>Address</b></td>
					<td>:</td>
					<td>
						<?php echo $row['address']; ?>
					</td>
				</tr>
			</table>
		</div>

	</div>
	<div class="order_container">
		<div>
			<h2> Your Order</h2>
			<table>
				<tr>
					<td><b>order number</b></td>
					<td>:</td>
					<td>
						<?php echo $invoiceNo; ?>
					</td>
				</tr>
				<tr>
					<td><b>items</b></td>
					<td>:</td>
					<td>
						<?php echo $row['orderProduct']; ?>
					</td>
				</tr>
				<tr>

			</table>
		</div>
		<div class="invoice_amount">
			<table class="amount_table" cellspacing="0">
				<tr align="center">
					<th>Sub Total: </th>
					<td>
						<?php echo $row['total']; ?> <b></b>
					</td>
				</tr>
			</table>
		</div>
		<div class="paid-note">

			<p class="paid-note">Already paid</p>

		</div>
		<div class="invoice_footer">
			<div class="note">
				<h3>THANK YOU FOR SHOPPING WITH MANDI FASHION</h3>
				<p>
					you can get your order within 7 days
				</p>
			</div>
		</div>
	</div>
	<center>
	<button onClick="window.print()" name="print" class="btn"> click to print </button>
	<a href="main.php"><button class="btn"> Home</button></a>
	</center>
</body>

</html>