<?php

$sentence = $_POST['sentence'];
$output = $_POST['output'];
$callback = $_GET['callback'];
require(dirname(__FILE__).'/keyphrase.php');
$Keyphrase = new Keyphrase();
if($output=="json" && $callback!="") {
	header('Content-type: application/javascript; charset=UTF-8');
} else if($output=="json") {
	header('Content-type: application/json; charset=UTF-8');
} else {
	header('Content-type: text/xml; charset=UTF-8');
}
echo $Keyphrase->getKeyphrase($sentence, $output, $callback);
	
?>