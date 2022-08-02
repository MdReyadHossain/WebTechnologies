<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php include('../View/header.php'); ?>
	<form method="post" action="../Controller/registrationaction.php" novalidate>
		<!-- General Start -->
		<h1 align="center">Registration</h1>
		<?php
            if(isset($_COOKIE['msg'])) {
                echo $_COOKIE['msg'];
            }
        ?>
		<fieldset>
			<legend>General</legend>
	<table>
		<thead></thead>
		<tbody>
			<tr>
				<td>First Name</td>
				<td><label for="FirstName"></label>
					<input type="text" name="FirstName"placeholder="FirstName"autofocus>
				</td>
			</tr>
			<tr>	
				<td>Last Name</td>
				<td><label for="LastName"></label>
					<input type="text" name="LastName"placeholder="LastName"autofocus>
				</td>
			</tr>	
			<tr>
				<td>Gender</td>
				<td>
					<input type="radio"name="Gender"id="Male"value="Male">
					<label for="Male">Male</label>
					<input type="radio" name="Gender"id="Female"value="Female">
					<label for="Female">Female</label>
				</td>
			</tr>	
				</tbody>
				</table>
	</fieldset>
	<!-- General End -->
	<br><br>

	<!-- Contact Start -->
	<fieldset>
		<legend>Contact</legend>
		<table>
		<thead></thead>
		<tbody>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email">
			</tr>	
			<tr>
				<td>Mobile No</td>
				<td><input type="number" name="number">
			</tr>	
			</tbody>
				</table>
	</fieldset>
	<!-- Contact End -->
	<br><br>



	<!-- Address Start -->
	<fieldset>
		<legend>Address</legend>
	<table>
		<thead></thead>
		<tbody>
			<tr>
				<td>Street/House/Road</td>
				<td><label for="Street/House/Road"></label>
					<input type="text" name="road">
				</td>
			</tr>	
			<tr>
				<td>Country</td>
				<td>
					<select name="Country"id="Country">
						<option value="Bangladesh">Bangladesh</option>
						<option value="India">India</option>
					</select>
				</td>
			</tr>		
		</tbody>
	</table>
	</fieldset>
	<!-- Address End -->
	<br><br>



	<!-- Password Start -->
	<fieldset>
		<legend>Password</legend>
	<table>
		<thead></thead>
		<tbody>
			<tr>
				<td>User Name</td>
				<td><label for="username"></label>
					<input type="text" name="username">
				</td>
			</tr>	
			<tr>
				<td>Password</td>
				<td>
				<input type="password" id="password" name="password">
				</td>
			</tr>	
			<tr>
				<td>Confirm Password</td>
				<td>
				<input type="password" id="confirm_password" name="confirm_password">
				</td>
			</tr>	
		</tbody>
	</table>
	</fieldset>
	<!-- Password End -->
	<br>


	<!-- Register -->
		<input type="submit" name="Register"value="Register">
	</form>
	<br><br>

	 <?php include'footer.php'; ?>
</body>
</html>