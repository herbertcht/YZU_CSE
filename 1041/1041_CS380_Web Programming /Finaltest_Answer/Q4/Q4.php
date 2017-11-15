<?php
header("Access-Control-Allow-Origin: *");
$dist = $_POST["dist"];
$context  = stream_context_create(array('http' => array('header' => 'Accept: application/json')));
$url = "Q4.json";
$xml = file_get_contents($url, false, $context);
$xml = json_decode($xml);
#print_r($xml);
print ("<p>行政區:$dist</p>");
print ("<table><tr><td>行政區</td><td>負責單位</td><td>地址</td></tr>");
foreach ($xml->result->results as $key)
{
    $d = $key->{"C_NAME"};

    if (strcmp($d,$dist)==0)
    {
	$station = $key->{"APP_NAME"};
	$value = $key->{"ADDR"};
	print ("<tr><td>$d</td><td>$station</td><td>$value</td></tr>");
    }
}
print ("</table>");
?>


