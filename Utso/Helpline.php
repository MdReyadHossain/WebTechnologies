<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Help Line</title>
</head>
<body>
	<fieldset style="width: auto;">
		<legend><b>Help Line</b></legend>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" novalidate>
			<table>
				<tr>
					<td><label>Email</label></td>
					<td>: <a href="mailto:info@ez.com">info@ez.com</a></td>
				</tr>
				<tr>
					<td><label>Contact No</label></td>
					<td>: <a href="tel:+555 6666">+555 6666</a></td>
				</tr>
			</table>
		</form>
	</fieldset>
</body>
</html>