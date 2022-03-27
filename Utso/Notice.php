<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Notice Board</title>
</head>
<body>
	<fieldset style="width: auto;">
		<legend><b>Notice</b></legend>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" novalidate>
			<table>
				<tr>
					<td><label>Write a notice:</label></td>
				</tr>
				<tr>
					<td><textarea style="width: 400px; height: 100px;" name="feedsub" id="com" placeholder="write here..."></textarea></td>
				</tr>
			</table>
			<input type="submit" name="submit" value="Upload">
		</form>
	</fieldset>
</body>
</html>