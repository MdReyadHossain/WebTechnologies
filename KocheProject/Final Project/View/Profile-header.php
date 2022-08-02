

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
	</head>
<body>
	<div style="width:auto; height:100px; border:1px solid #000;">
		<header>
			<a href="/Final Project/home.php" >
				<img class="logo"src="/Final Project/View/img/House_logo.png"  width="120">
			</a>
		   <div style="float: right; margin-top: 25px; margin-right: 10px;">	
			<a href="Profile.php">Profile View</a> |
			<a href="update.php">Update Profile </a> |
			<a href="LogOut.php">Log Out</a> |
			<h2 align="center"><span>Welcome <?php echo $_SESSION['username']; ?></span> </h2>
			</div>
		</header>
	</div>
	<div style="width: 30%; float: left;">
		<ul>
			<li><h3><a href="dashboard.php">Dashboard</a></h3></li>
			<li><h3><a href="apartmentinfo.php">Apartment List</a></h3></li>
			<li><h3><a href="apartment.php">Address for Apartment</a></h3></li>
			<li><h3><a href="Delete Previous Apartment.php">Delete Previous Apartment</a></h3></li>
			<!-- <li><h3><a href="y">Provide Contact for Buyer</a></h3></li> -->
			<li><h3><a href="Buyerinfo.php"> Buyer Information </a></h3></li>
		</ul>
	</div>	
</body>
</html>