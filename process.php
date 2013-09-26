<?php
	include("connection.php");
	session_start();

	//var_dump($_POST);

	function addApp() 
	{
		$error = "";
		if(empty($_POST['app']))
		{
			$error = "- Please Enter an App Name!";
		} 
		else 
		{
			$add_app_query = "INSERT INTO apps (name, created_at, updated_at) VALUES ('{$_POST['app']}', NOW(), NOW())";
			//echo $add_app_query;
			mysql_query($add_app_query);
		}

		$data['error'] = $error;
		$data['status'] = "app added!";
		echo json_encode($data);
	}

	function viewApps() {
		//echo "viewApps";
		$view_apps_query = "SELECT apps.id, apps.name, count(shortcuts.id) as shortcut_count, apps.created_at FROM apps LEFT JOIN shortcuts on apps.id = shortcuts.app_id WHERE apps.name LIKE '%{$_POST['search_app_value']}%' GROUP BY apps.id ";

		//echo $view_apps_query;
		//die();

		$apps = fetch_all($view_apps_query);

		$app_html = "
			<table>
				<thead>
					<tr>
						<th>Name</th>
						<th>Number of Shortcut Keys</th>
						<th>Created Date</th>
					</tr>
				</thead>
				<tbody>
		";

		foreach($apps as $app) {
			$app_html .= "
				<tr>
					<td class='center_text'>
						<form id='app_page_go' action='process.php' method='post'>
							<input type='hidden' name='action' value='go_to_app'/>
							<input type='hidden' name='app' value='".$app['name']."'>
							<input type='hidden' name='app_id' value='".$app['id']."'>
							<input class='app_button' type='submit' value='".$app['name']."'/>
						</form>
					</td>
					<td class='center_text'>".$app['shortcut_count']."</td>
					<td class='center_text'>".$app['created_at']."</td>
				</tr>
			";
		}
		$app_html .= "
				</tbody>
			</table>
		";
		//$data['test'] = "test";
		$data['app_search_result_html'] = $app_html;
		//echo $app_html;
		echo json_encode($data);
	}

	function addShortcut() {
		$error = "";
		if(empty($_POST['shortcut_key']) or empty($_POST['description']))
		{
			$error = "- Please Enter a Shortcut Key/Description!";
		} 
		else 
		{
			$add_shortcut_query = "INSERT INTO shortcuts (app_id, shortcut, description, created_at, updated_at) VALUES ('{$_POST['app_id']}', '{$_POST['shortcut_key']}', '{$_POST['description']}', NOW(), NOW())";
			mysql_query($add_shortcut_query);
		}

		$data['error'] = $error;
		$data['status'] = "shortcut added!";
		echo json_encode($data);

	}

	function viewShortcuts() {
		$view_apps_query = "SELECT * FROM shortcuts WHERE (shortcut LIKE '%{$_POST['search_shortcut_value']}%' OR description LIKE '%{$_POST['search_shortcut_value']}%') AND app_id = '{$_POST['app_id']}'";

		//echo $view_apps_query;
		//die();

		$shortcuts = fetch_all($view_apps_query);

		if(count($shortcuts)==0) 
		{
			$shortcut_html = "<p>No Shortcuts Found</p>";
		} 
		else
		{
			$shortcut_html = "
				<table>
					<thead>
						<tr>
							<th>Shortcut Key</th>
							<th>Description</th>
							<th>Created Date</th>
						</tr>
					</thead>
					<tbody>
			";

			foreach($shortcuts as $shortcut) {
				$shortcut_html .= "
					<tr>
						<td class='center_text'>".$shortcut['shortcut']."</td>
						<td class='center_text'>".$shortcut['description']."</td>
						<td class='center_text'>".$shortcut['created_at']."</td>
					</tr>
				";
			}
			$shortcut_html .= "
					</tbody>
				</table>
			";
		}

		//echo $shortcut_html;
		$data['shortcut_search_result_html'] = $shortcut_html;
		echo json_encode($data);
	}

	function goToApp() {
		$_SESSION['app'] = $_POST['app'];
		$_SESSION['app_id'] = $_POST['app_id'];
		header("Location: app.php");
	}

	if(isset($_POST['action']) and $_POST['action'] == 'add_app') 
	{
		addApp();
	} 
	elseif(isset($_POST['action']) and $_POST['action'] == 'view_app') 
	{
		viewApps();
	} 
	elseif(isset($_POST['action']) and $_POST['action'] == 'add_shortcut') 
	{
		addShortcut();
	} 
	elseif(isset($_POST['action']) and $_POST['action'] == 'view_shortcuts') 
	{
		viewShortcuts();
	}
	elseif(isset($_POST['action']) and $_POST['action'] == 'go_to_app') 
	{
		goToApp();
	}

?>