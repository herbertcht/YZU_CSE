<?php
$context  = stream_context_create(array('http' => array('header' => 'Accept: application/json')));
$url = "Q3.json" ;
$xml = file_get_contents($url, false, $context);
$xml = json_decode($xml);
print "請選擇時間 <select id = \"time\">\n";
$i=0;
foreach ($xml->result->results as $key)
{
    $station = $key->{"locationName"};
    $time = $key->{"startTime"};
    $time = substr($time,0,10)." ".substr($time,11,5);
    $value = $key->{"value"};
    if($i ==0)
    {
	print "<option selected>$time</option>\n";
    }
    else
    {
	print "<option>$time</option>\n";
    }
    if($i >= 24) break;
    $i++;
}
print ("</select>\n");
?>
 
