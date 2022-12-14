<!DOCTYPE html>
<html>
<head>
	<title>MovieCatalogProject</title>
</head>
<body>
<?php

$dir = 'myLove';
$files = scandir($dir);

//pre_r($files);

function pre_r($array) {
	//echo '<pre>';
	print_r($array);
	//echo '</pre>';
}

$files = array_diff($files, array('..', '.'));
//pre_r($files);
$files = array_values($files);
//pre_r($files);

$myLove = array();

for ($i = 0; $i < count($files); $i++) {
	preg_match("!(.*?)\((.*?)\)!",$files[$i], $results);
	$myLove_name = str_replace('_',' ', $results[1]);
	$myLove_name = ucwords($myLove_name);

	$myLove[$myLove_name]['image'] = $files[$i];
	$myLove[$myLove_name]['love'] = $results[2];
}

echo "<table id = 'myLove' cellpadding = 50>";
echo "<tr class = 'odd'>";

foreach ($myLove as $myLove_name => $info){
	$content = "<td><span class = 'name'>$myLove_name</span><br />"
	. "<img src = 'myLove/$info[image]'><br />"
	. "<span class - 'love'>( $info[love] )</span></td>";
	echo $content;
}

echo "</tr></table>";
?>

<style>
	#myLove {
		background-color: #000;
		color: #fff;
		font: 11pt Calibri;
	}
	tr.header {
		background-color: #111f4e;
		color: #fff;
		font: bold 11pt Calibri;
	}
	tr.odd {
		background-color: #18182b;
	}
	tr.even {
		background-color: #141423;
	}
	img {
		padding: 10px;
	}
	span.fileNum {
		color: #ccc;
		font-size: 18px;
	}
	span.name {
		font-size: 18px;
		font-weight: bold;
	}
	body{
		margin: 0;
		padding: 0;
	}
</style>

</body>
</html>