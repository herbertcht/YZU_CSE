<?php
$context  = stream_context_create(array('http' => array('header' => 'Accept: application/json')));
$url = "Q3.json" ;
$data = file_get_contents($url, false, $context);
print $data;
?>
