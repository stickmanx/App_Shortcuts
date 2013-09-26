<?php
	session_start();

?>
<!DOCTYPE html>
<html>
	<head>
		<title>App Page</title>
		<link rel="stylesheet" href="css/stylesheet.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery-ui.min.js"></script>
		<script src="js/main.js" type="text/javascript"></script>
	</head>
	<body>
		<div class="wrapper">
			<h1><?php echo $_SESSION['app'] ?></h1>
			<div class="add_shortcut search_area">
				<form id="shortcut_input" action="process.php" method="post">
					<input type="hidden" name="action" value="add_shortcut"/>
					<input type="hidden" name="app_id" value=<?php echo $_SESSION['app_id'] ?>>
					<label for="shortcut_key">Shortcut Key</label>
					<input id="shortcut_key" type="text" name="shortcut_key"/>
					<label for="description">Description</label>
					<TEXTAREA id="description_box" name="description"></TEXTAREA>
					<input type="submit" value="Add Shortcut"/>
				</form>
				<div id="shortcut_errors"><p class="error_msg"></p></div>
				<div class="clear"></div>
			</div>
			<div class="view_shortcuts result_area">
				<form id="shortcuts_view" action="process.php" method="post">
					<input type="hidden" name="action" value="view_shortcuts"/>
					<input type="hidden" name="app_id" value=<?php echo $_SESSION['app_id'] ?>>
					<input type="text" name="search_shortcut_value"/>
					<input type="submit" value="Search"/>
				</form>
				<div id="shortcut_results" class="center_reuslts"></div>
				<div class="clear"></div>
			</div>
		</div>
	</body>
</html>