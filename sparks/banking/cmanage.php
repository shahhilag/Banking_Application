<?php
include_once 'database.php';
$result = mysqli_query($conn,"SELECT * FROM bankusers");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Banking Application</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<a href="index.html" class="logo"><strong>Banking</strong> <span>Application</span></a>
						<nav>
							<a href="#menu">Menu</a>
						</nav>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<ul class="links">
							<li><a href="index.html">Home</a></li>
							<li><a href="cmanage.php">Manage Cudtomers</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main" class="alt">

						<!-- One -->
							<section id="one">
								<div class="inner">
									<header class="major">
										<h1>Customers</h1>
									</header>

										<?php
										if (mysqli_num_rows($result) > 0) {
										?>
										<table>
										
										<tr>
										<td>Customer ID</td>
										<td>Customer Name</td>
										<td>Account Number</td>
										<td>Available Balance</td>
										<td></td>

										<?php
										$i=0;
										while($row = mysqli_fetch_array($result)) {
										?>
										<tr>
											<td><?php echo $row["CustomerID"]; ?></td>
											<td><?php echo $row["CustomerName"]; ?></td>
											<td><?php echo $row["AccountNumber"]; ?></td>
											<td><?php echo $row["AvailableBalance"]; ?></td>
											<?php  echo "</td><td class='view'>";
											echo "<button><a href='transfer.php?id=$row[CustomerID]'>Transfer</button>";
											echo "</td></tr>"; ?>
										</tr>
										<?php
										$i++;
										}
										?>
										</table>
										<?php
										}
										else{
											echo "No result found";
										}
										?>
								</div>
							</section>

					</div>

			

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>