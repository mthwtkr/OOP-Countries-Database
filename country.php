<?php
	require_once('connection.php');
	include('html_helper.php');
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Country Info</title>
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/country_info.css" />
<body>
	<div class="container">
		<?php
		$query = "SELECT id, name FROM countries";
		$country_names = fetch_all($query);

		$HTML_Helper = new HTML_Helper();
		
		echo "<form action='process.php' method='post'>Select Country:";
			  	$HTML_Helper->print_select('country_name', $country_names);
		  echo "<input type='hidden' name='action' value='retrieve_country_info'>
			  	<input type='submit' value='Check Info'>
			  </form>";
		?>
		<h2>Country Information</h2>
		<p>Country: <?=$_SESSION['process']['name']?></p><br/>
		<p>Continent: <?=$_SESSION['process']['continent']?></p><br/>
		<p>Region: <?=$_SESSION['process']['region']?></p><br/>
		<p>Population: <?=$_SESSION['process']['population']?></p><br/>
		<p>Life Expectancy: <?=$_SESSION['process']['life_expectancy']?></p><br/>
		<p>Government Form: <?=$_SESSION['process']['government_form']?></p><br/>
	</div>
</body>
</html>