<!DOCTYPE html>
<html>
	<head>
		<title>Green Belt</title>
		<link rel="stylesheet" href="css/stylesheet.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery-ui.min.js"></script>
		<script src="js/main.js" type="text/javascript"></script>
	</head>
	<body>
		<div class="wrapper">
			<h1>App Shortcuts</h1>
			<div class="add_app search_area">
				<form id="app_input" action="process.php" method="post">
					<label for="app">Name:</label>
					<input type="hidden" name="action" value="add_app"/>
					<input id="app_input_name" type="text" name="app"/>
					<input type="submit" value="Add Application"/>
				</form>
				<div id="app_errors"><p class="error_msg"></p></div>
				<div class="clear"></div>
			</div> <!-- add_app -->
			<div class="view_apps result_area">
				<form id="app_view" action="process.php" method="post">
					<input type="hidden" name="action" value="view_app"/>
					<input type="text" name="search_app_value"/>
					<input type="submit" value="Search Apps"/>
				</form>
				<div id="app_results" class="center_reuslts"></div>
			</div> <!-- view_apps -->
		</div> <!-- wrapper -->
	</body>
</html>