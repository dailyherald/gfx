<!doctype html>
<html lang="en">

  <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width" />

	<title>
		Welcome test
	</title>

	<link href="styles/normalize.css" rel="stylesheet" type="text/css">
	<link href="styles/foundation.css" rel="stylesheet" type="text/css">
	<link href="styles/newsArt.css" rel="stylesheet" type="text/css">
	<link href="styles/styleSort.css" type="text/css" rel="stylesheet">
	<link href="styles/leaflet.css" rel="stylesheet" type="text/css">
	<link href="styles/MarkerCluster.css"  rel="stylesheet" type="text/css">
	<link href="styles/MarkerCluster.Default.css" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="scripts/jquery-1.9.1.min.js"></script>
	<script stype="text/javascript" rc="scripts/jquery-ui-1.10.3.customRC.min.js"></script>
	<script type="text/javascript" src="scripts/highcharts.js"></script>
	<script type="text/javascript" src="scripts/jquery.metadata.js"></script>
	<script type="text/javascript" src="scripts/jquery.table.js"></script>
	<script type="text/javascript" src="scripts/leaflet.js"></script>
	<script type="text/javascript" src="scripts/leaflet.markercluster-src.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3&sensor=false"></script>
	<script type="text/javascript" src="scripts/Google.js"></script>

</head>
<body> 

Welcome <?php echo $_POST["fname"]; ?>.<br>
You are <?php echo $_POST["age"]; ?> years old!<br>
This is the value of low income: <?php echo $_POST["lowincome"]; ?><br>
<?php echo $_POST["lowincome"]; ?> <br>
<p>
<form action="welcome.php" method="post">
Name: <input type="text" name="fname">
Age: <input type="text" name="age">
<input type="submit">
</form>
<p>

</body>
</html>