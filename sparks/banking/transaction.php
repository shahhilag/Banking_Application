

<!DOCTYPE HTML>
<html>
	<head>
		<title>Elements - Forty by HTML5 UP</title>
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
							<li><a href="landing.html">Landing</a></li>
							<li><a href="generic.html">Generic</a></li>
							<li><a href="elements.html">Elements</a></li>
						</ul>
						<ul class="actions stacked">
							<li><a href="#" class="button primary fit">Get Started</a></li>
							<li><a href="#" class="button fit">Log In</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main" class="alt">

					<section class="transfer">
							<?php
									
									
								$tid = $_GET['tn'];
								$rname = $_GET['rn'];
								$transfer = $_GET['cashtransfer'];
								include('database.php');

								$query1 = "SELECT * FROM bankusers WHERE CustomerID = '$tid'";
								$sqldata1 = mysqli_query($conn,$query1) or die('Error Getting the data');
								
								while($row = mysqli_fetch_array($sqldata1, MYSQLI_ASSOC)){
									$tbalance = $row['AvailableBalance'];
									$custoname = $row['CustomerName'];
									$tranid = $row['AccountNumber'];
									$withdrawals = $row['TotalWithdrawal'];
								}

								$query2 = "SELECT * FROM bankusers WHERE CustomerName = '$rname'";
								$sqldata2 = mysqli_query($conn,$query2) or die('Error Getting the data');

								while($row = mysqli_fetch_array($sqldata2, MYSQLI_ASSOC)){
									$receid = $row['CustomerID'];
									$rbalance = $row['AvailableBalance'];
									$deposits = $row['TotalDeposist'];
								}

								if(($transfer > 0)&&($rname != '-- Select Receiver Name --')&&($tbalance>=50)){
									$tbalance = $tbalance - $transfer;
									$rbalance = $rbalance + $transfer;

									$deposits = $deposits + $transfer;
									$withdrawals = $withdrawals + $transfer;

									$sql3 = "UPDATE bankusers SET AvailableBalance=$tbalance,TotalWithdrawal=$withdrawals WHERE CustomerID = '$tid'";
									$sql4 = "UPDATE bankusers SET AvailableBalance=$rbalance,TotalDeposist=$deposits WHERE CustomerID = '$receid'";
									mysqli_query($conn, $sql3);

									mysqli_query($conn, $sql4);
									
									$sql1 = "SELECT * FROM transaction";
									$data = mysqli_query($conn,$sql1) or die('Error Getting the data');
									$transid = mysqli_num_rows($data);
									
									$transid = $transid +1;
									
											
									$date = date("Y-m-d ");
									
									
									$sql = "INSERT INTO transaction VALUES($transid,$tid,'$custoname',$receid,'$rname',$transfer,$tbalance,$rbalance,'$date')";
									if(mysqli_query($conn, $sql)){
										echo 'Transaction Successful';
									}

									echo "<br/>";
									echo '<form action="backagain.php">';
									echo  "<input type='hidden' name='id' value='$tid'>";
									echo "<button>Next</button>
									</form>";
							}  
							else if($rname == '-- Select Receiver Name --'){
								echo '<script>
									alert("Enter the Receiver Name or Enter the Amount > 0");
									window.history.back();
								</script>';
							}
							else if($transfer <= 0){
								echo '<script>
									alert("Enter the Receiver Name or Enter the Amount >0");
									window.history.back();
								</script>';
							}
							else if($tbalance<50){
								echo '<script>
									alert("You do not have enough  money");
									window.history.back();
								</script>';
							}


									
									

								
									?>
					
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