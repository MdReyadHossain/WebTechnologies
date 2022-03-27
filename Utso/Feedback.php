<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Feedback</title>
</head>
<body>
	<fieldset style="width: auto">
		<legend><b>Feedback</b></legend>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" novalidate>
			<table>
				<tbody>
					<tr>
						<td><label for="sub">Subject: </label></td>
						<td><input type="text" name="feedsub" id="sub"></td>
					</tr>
					<tr>
						<td><label for="com">Comment:</label></td>
						<td><textarea style="width: 400px; height: 100px;" name="feedsub" id="com" placeholder="write a feedback..."></textarea></td>
					</tr>
				</tbody>
			</table>
		</form>
	</fieldset>
</body>
</html>