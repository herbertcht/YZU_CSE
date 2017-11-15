<?php


$username = $_GET['username'];
$msg = $_GET['msg'];
$chatroom = $_GET['chatroom'];
$img = $_GET['img'];
$conn = mysql_connect('localhost','hw5','hw5');
mysql_select_db('hw5',$conn);

mysql_query("INSERT INTO chatbox (`username` , `msg` , `chatrooom` , `img`) VALUES ('$username' , '$msg' , '$chatroom' , '$img')");

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