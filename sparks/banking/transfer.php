

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
					<section class="transfer">

								
								<?php

								include('database.php');

								$customerid = $_GET['id'];
								$sqlget = "SELECT * FROM bankusers WHERE CustomerID = '$customerid'";
								$sqldata = mysqli_query($conn,$sqlget) or die('Error Getting the data');
								while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
									$name = $row['CustomerName'];
								}    

								echo "<table border='1' id='table_view'>";
								echo "<tr>
									<th>Customer ID</th>
									<th>Account Number</th>
									<th>Customer Name</th>
									<th>Available Balance</th>
									</tr>";
								
									$sqlget = "SELECT * FROM bankusers WHERE CustomerID = '$customerid'";
									$sqldata = mysqli_query($conn,$sqlget) or die('Error Getting the data');
								while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
									echo "<tr><td>";
										echo $row['CustomerID'];
									echo "</td><td>";
										echo $row['AccountNumber'];
									echo "</td><td>";
										echo $row['CustomerName'];
									echo "</td><td>";
										echo $row['AvailableBalance'];
									
									echo "</td></tr>";
								}

								echo "</table>";
								echo "<br/>
								

								<form action='transaction.php'>
								
								<input type='hidden' name='tn' value='$customerid'>
								<label>Transfer To:  </label>
								<select name='rn' required>
									<option disabled selected>-- Select Receiver Name --</option>";
								$query = "SELECT * FROM bankusers WHERE NOT CustomerID = '$customerid'";
								$sqldataa = mysqli_query($conn,$query) or die('Error Getting the data');
								while($row = mysqli_fetch_array($sqldataa, MYSQLI_ASSOC)){
									echo "<option value='". $row['CustomerName'] ."'>" .$row['CustomerName'] ."</option>";   
								}

								echo "</select><br/>";

								echo '<label>Amount:  </label><input style="color:black;" type="number" name="cashtransfer" id="cashtransfer" placeholder="Enter the amount" value="" required="required"><br/><br/>
								
								<button type="submit">Transfer</button>
								


								</form>';
								?>
							</section>

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