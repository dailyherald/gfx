<!DOCTYPE HTML>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width" />

	<title>
		Low income students
	</title>

	<link href="../../styles/normalize.css" rel="stylesheet" type="text/css">
	<link href="../../styles/foundation.css" rel="stylesheet" type="text/css">
	<link href="../../styles/newsArt.css" rel="stylesheet" type="text/css">
	<link href="../../styles/styleSort.css" type="text/css" rel="stylesheet">
	<link href="../../styles/leaflet.css" rel="stylesheet" type="text/css">
	<link href="../../styles/MarkerCluster.css"  rel="stylesheet" type="text/css">
	<link href="../../styles/MarkerCluster.Default.css" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="../../scripts/jquery-1.9.1.min.js"></script>
	<script stype="text/javascript" rc="../../scripts/jquery-ui-1.10.3.customRC.min.js"></script>
	<script type="text/javascript" src="../../scripts/highcharts.js"></script>
	<script type="text/javascript" src="../../scripts/jquery.table.js"></script>
	<script type="text/javascript" src="../../scripts/leaflet.js"></script>
	<script type="text/javascript" src="../../scripts/leaflet.markercluster-src.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3&sensor=false"></script>
	<script type="text/javascript" src="../../scripts/Google.js"></script>

</head>

<body>


<div class="row">
<div class="small-12 large-1 columns"></div>
<div class="small-12 large-10 columns">
<h1>Low-income students<br>and school performance</h1>
</div>
<div class="small-12 large-1 columns"></div>
</div>

<div class="row">
<div class="small-12 large-1 columns"></div>
<div class="small-12 large-8 columns">
<p>How do you judge the performance of schools with a high percentage of low-income students? One possible way is to compare those schools to schools with a similiar percentage.<br>
Using data from the 2013 Illinois School Report Card, the Daily Herald grouped all schools in the state by their percent of low-income students to produce 10 ranges: 0-9.9%, 10%-19.9%, etc. For each group, we calculated the average ISAT and PSAE composite meets/exceeds scores as well the average ACT score.<br>
<strong>Use the dropdown</strong> to view the results for each low-income range and compare those results with other income ranges.
</p>
</div>
<div class="small-12 large-2 columns">
<p><strong>Select a low-income range and press "submit"</strong></p>
<p>
<form action="lowinc2.php" method="post">
	<select id="lowincome" name="lowincome" size="1">
		<option value='' >Select a range</option>
		<option value='90' >90%-100%</option>
		<option value='80' >80%-89.9%</option>
		<option value='70' >70%-79.9%</option>
		<option value='60' >60%-69.9%</option>
		<option value='50' >50%-59.9%</option>
		<option value='40' >40%-49.9%</option>
		<option value='30' >30%-39.9%</option>
		<option value='20' >20%-29.9%</option>
		<option value='10' >10%-19.9%</option>
		<option value='00' >0%-9.9%</option>
	</select>
   <button type="submit" id="submit1">SUBMIT</button>
</form>

	</p>
</div>
<div class="small-12 large-1 columns"></div>
</div>

</body>



