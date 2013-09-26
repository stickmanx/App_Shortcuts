$(document).ready(function() {

// index.php
	$('#app_input').submit(function() {
		$.post(
			$(this).attr('action'),
			$(this).serialize(),
			function(data){
				$('#app_view').submit();
				if(data.error) {
					console.log("test");
					$('#app_errors p').html(data.error);
				} else {
					$('#app_errors p').html("");
					$('#app_input_name').val("");
				}
			},
			"json"
		);
		return false;
	});


	$('#app_view').submit(function() {
		console.log('test1');
		$.post(
			$(this).attr('action'),
			$(this).serialize(),
			function(data){
				$('#app_results').html(data.app_search_result_html);
			},
			"json"
		);
		return false;
	});

	$('#app_view').submit();

// app.php
	$('#shortcut_input').submit(function() {
		$.post(
			$(this).attr('action'),
			$(this).serialize(),
			function(data){
				$('#shortcuts_view').submit();
				if(data.error) {
					console.log("test");
					$('#shortcut_errors p').html(data.error);
				} else {
					$('#shortcut_errors p').html("");
					$('#shortcut_key').val("");
					$('#description_box').val("");
				}
			},
			"json"
		);
		return false;
	});

	$('#shortcuts_view').submit(function() {
		$.post(
			$(this).attr('action'),
			$(this).serialize(),
			function(data){
				$('#shortcut_results').html(data.shortcut_search_result_html);
			},
			"json"
		);
		return false;
	});

	$('#shortcuts_view').submit();	
});