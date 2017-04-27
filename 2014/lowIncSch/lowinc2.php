<!DOCTYPE HTML>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width" />

	<title>
		Low income students and school performance
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
	<script type="text/javascript">
			var lowVAL = '<?php echo filter_var($_POST["lowincome"], FILTER_SANITIZE_STRING); ?>';
	</script>

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

<div class="row">
<div class="small-12 large-1 columns"></div>
<div class="small-12 large-4 columns">
<h4>About the map</h4>
<p>School locations in the map are clustered for easier viewing. The color and number of each cluster indicates the number of school locations included. Click on a cluster and you can begin drilling down to see locations of individual schools.<br><strong>Zoom in far enough</strong> and you'll see markers for indivdual school locations. Clicking on a marker reveals the name of a school, and clicking the name of a school will bring you to the school's entry in the chart below.<br><strong>Zoom out in the map</strong> and you'll be able to see a regional picture of low income schools in the state.<br>
</p>
</div>	
<div id="suburbs" class="small-12 large-6 columns"></div>
<div class="small-12 large-1 columns"></div>
</div>

<div class="row">
<div class="small-12 large-1 columns"></div>
<div id="schoolsLIST" class="small-12 large-10 columns"></div>
<div class="small-12 large-1 columns"></div>

</div>


<script>



var GGLstyles = [
	{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#acbcc9"}]},
	{"featureType":"landscape","stylers":[{"hue":"#B7C7A6"},{"lightness":-5}]},
	{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#c1b5a5"}]},
	{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":40}]},
	{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#c5c6c6"}]},
	{"featureType":"road.arterial","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":40}]},
	{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#fbfaf7"}]},
	{"featureType":"administrative","stylers":[{"visibility":"on"},{"lightness":33}]},
	{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#c5dac6"}]},
	{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},
	{"featureType":"road","stylers":[{"lightness":20}]}
	];

var ggl = new L.Google('ROADMAP', {	mapOptions: { styles: GGLstyles	} });

//Create the variable for list of districts



//Create the map and load the geojson

var map = L.map('suburbs');

	console.log( lowVAL + " here" );

	if(lowVAL == 90) {
		console.log( lowVAL );
		var jsonFILE = "lowINC90.json";
		var rangeFILE = "90%-100%";
		console.log( rangeFILE );

	} else if(lowVAL == 80){
		console.log( lowVAL );
		var jsonFILE = "lowINC80.json";
		var rangeFILE = "80%-89.9%";

	} else if(lowVAL == 70){
		console.log( lowVAL );
		var jsonFILE = "lowINC70.json";
		var rangeFILE = "70%-79.9%";

	} else if(lowVAL == 60){
		console.log( lowVAL );
		var jsonFILE = "lowINC60.json";
		var rangeFILE = "60%-69.9%";

	} else if(lowVAL == 50){
		console.log( lowVAL );
		var jsonFILE = "lowINC50.json";
		var rangeFILE = "50%-59.9%";

	} else if(lowVAL == 40){
		console.log( lowVAL );
		var jsonFILE = "lowINC40.json";
		var rangeFILE = "40%-49.9%";

	} else if(lowVAL == 30){
		console.log( lowVAL );
		var jsonFILE = "lowINC30.json";
		var rangeFILE = "30%-39.9%";

	} else if(lowVAL == 20){
		console.log( lowVAL );
		var jsonFILE = "lowINC20.json";
		var rangeFILE = "20%-29.9%";

	} else if(lowVAL == 10){
		console.log( lowVAL );
		var jsonFILE = "lowINC10.json";
		var rangeFILE = "10%-19.9%";

	} else if(lowVAL == 00){
		console.log( lowVAL );
		var jsonFILE = "lowINC00.json";
		var rangeFILE = "0-9.9%";

	} else {

		console.log( lowVAL );

	};

var distHTML = "";
		distHTML += '<br><h3 align=left>Schools in the ' + rangeFILE + ' low-income range</h3>';
		distHTML += '<p><strong>The chart below is sortable, allowing you to compare how schools with a similar percent of low-income students performed in ISAT and PASE composite scores as well as average ACT score.</strong><br>In addition, the average scores for schools in other low-income ranges are included for comparison.<br>To sort the list, simply click the heading for each column - once for ascending order, again for descending order. Click the name of the school to visit the school\'s page on the <a href="http://reportcards.dailyherald.com" target="_top">Daily Herald School Checker</a>.</p>';
		distHTML += '<p><table id="tableSCHOOLS" class="tablesorter fullTable">';
		distHTML += '<thead><tr><th class="tdLEFT">' + "School" + '</th><th data-type="float">' + '% low<br>income</th><th data-type="float">' + "ISAT<br>Composite" + '</th><th data-type="float">' + "PSAE<br>Composite" + '</th><th data-type="float">' + "ACT<br>Score" + '</th></tr></thead><tbody>';
		distHTML += '<tr class="group"><td class="tdLEFT"><strong>0-9.9% range average</strong></td><td class="tdCENT"><strong> </strong></td><td class="tdCENT"><strong>79.9</strong></td><td class="tdCENT"><strong>70.2</strong></td><td class="tdCENT"><strong>22.8</strong></td></tr>'
		distHTML += '<tr class="group"><td class="tdLEFT"><strong>10-19.9% range average</strong></td><td class="tdCENT"><strong> </strong></td><td class="tdCENT"><strong>77.1</strong></td><td class="tdCENT"><strong>68.5</strong></td><td class="tdCENT"><strong>22.2</strong></td></tr>'
		distHTML += '<tr class="group"><td class="tdLEFT"><strong>20-29.9% range average</strong></td><td class="tdCENT"><strong> </strong></td><td class="tdCENT"><strong>71.2</strong></td><td class="tdCENT"><strong>60.5</strong></td><td class="tdCENT"><strong>20.6</strong></td></tr>'
		distHTML += '<tr class="group"><td class="tdLEFT"><strong>30-39.9% range average</strong></td><td class="tdCENT"><strong> </strong></td><td class="tdCENT"><strong>66.1</strong></td><td class="tdCENT"><strong>55.7</strong></td><td class="tdCENT"><strong>20.1</strong></td></tr>'
		distHTML += '<tr class="group"><td class="tdLEFT"><strong>40-49.9% range average</strong></td><td class="tdCENT"><strong> </strong></td><td class="tdCENT"><strong>60.5</strong></td><td class="tdCENT"><strong>49.1</strong></td><td class="tdCENT"><strong>19.5</strong></td></tr>'
		distHTML += '<tr class="group"><td class="tdLEFT"><strong>50-59.9% range average</strong></td><td class="tdCENT"><strong> </strong></td><td class="tdCENT"><strong>56.7</strong></td><td class="tdCENT"><strong>43.3</strong></td><td class="tdCENT"><strong>18.7</strong></td></tr>'
		distHTML += '<tr class="group"><td class="tdLEFT"><strong>60-69.9% range average</strong></td><td class="tdCENT"><strong> </strong></td><td class="tdCENT"><strong>52.8</strong></td><td class="tdCENT"><strong>37.2</strong></td><td class="tdCENT"><strong>17.7</strong></td></tr>'
		distHTML += '<tr class="group"><td class="tdLEFT"><strong>70-79.9% range average</strong></td><td class="tdCENT"><strong> </strong></td><td class="tdCENT"><strong>48.4</strong></td><td class="tdCENT"><strong>31.9</strong></td><td class="tdCENT"><strong>17.4</strong></td></tr>'
		distHTML += '<tr class="group"><td class="tdLEFT"><strong>80-89.9% range average</strong></td><td class="tdCENT"><strong> </strong></td><td class="tdCENT"><strong>42.8</strong></td><td class="tdCENT"><strong>24.7</strong></td><td class="tdCENT"><strong>16.7</strong></td></tr>'
		distHTML += '<tr class="group"><td class="tdLEFT"><strong>90-100% range average</strong></td><td class="tdCENT"><strong> </strong></td><td class="tdCENT"><strong>37.6</strong></td><td class="tdCENT"><strong>19.6</strong></td><td class="tdCENT"><strong>15.9</strong></td></tr>'

console.log( jsonFILE );


$.getJSON(jsonFILE, function(data) {


 	    var geojson = L.geoJson(data, {
		
			onEachFeature: function (feature, layer) {
				layer.bindPopup(
					'<strong><a href="#'  + feature.properties.RCDTS + '">' + feature.properties.School + '</a></strong><br>'  + feature.properties.City
				);

		//Create the list of schools	

			distHTML += '<tr class="group"><td class="tdLEFT" id="'  + feature.properties.RCDTS + '"><a href="../../../details/?id-name=' + feature.properties.RCDTS + '" target="_top">' + feature.properties.School + ', ' + feature.properties.City + '</td><td class="tdCENT">' + feature.properties.demSCHOOLlow + '</td><td class="tdCENT">' + feature.properties.ISAT13 + '</td><td class="tdCENT">' + feature.properties.PSAE13 + '</td><td class="tdCENT">' + feature.properties.ACT13 + '</td></tr>';


		//END list of schools	

			}

 	    });

	var info = L.control();

	info.onAdd = function (map) {
		this._div = L.DomUtil.create('div', 'info');
			this._div.innerHTML = '<h4>Find a school</h4><p>Click on a cluster<br>to see individual schools<br>in the ' + rangeFILE + ' range.</p>';
			return this._div;
	};

	var markers = L.markerClusterGroup({minZoom: 2, maxZoom: 19});
	markers.addLayer(geojson);
  
	map.setView(new L.LatLng(42.1, -87.9),9);
	map.addLayer(ggl);
	map.addLayer(markers);
//	geojson.addTo(map);
	info.addTo(map);


	distHTML += '</tbody></table></p>';
				
	$('#schoolsLIST').html(distHTML);

	$("#tableSCHOOLS").table_sorter( { groupClass: 'group' } ).hover();

});	

</script>

</body>



