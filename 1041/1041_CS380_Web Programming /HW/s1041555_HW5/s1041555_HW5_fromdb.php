<?php

$conn = mysql_connect('localhost','hw5','hw5');
mysql_select_db('hw5',$conn);
$chatroom = $_GET['chatroom'];

$result = mysql_query('SELECT * FROM `chatbox` WHERE `chatrooom` LIKE "'.$chatroom.'" ORDER by `id`');

while($extract = mysql_fetch_array($result)){
	if($extract['img'] == NULL){$extract['img'] = "0";}
	if($extract['username'] == $_GET['username']){
		print "<p align='right'>" . $extract['msg'] . "<img src='" . $extract['img'] . ".gif'/>" . " " . $extract['date'] . "</p>";
	}else{
		print "<p align='left'>" . $extract['username'] . " Say :" . $extract['msg'] . "<img src='" . $extract['img'] . ".gif'/>" . " " . $extract['date'] . "</p>";
	}
}
?>