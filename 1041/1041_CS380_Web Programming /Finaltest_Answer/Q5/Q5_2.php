<?php
$id = $_POST["id"];
$p1 = $_POST["p1"];
$p2 = $_POST["p2"];
$query = "SELECT * FROM `user` WHERE `ID` LIKE '$id'";
if ( !( $database = mysql_connect( "localhost", "final", "final" ) ) )
    die( "Could not connect to database </body></html>" );
if ( !mysql_select_db( "FinalExam", $database ) )
    die( "Could not open FinalExam database </body></html>" );
if ( !( $result = mysql_query( $query, $database ) ) )
{
    print( "<p>Could not execute query!</p>" );
    die( mysql_error() . "</body></html>" );
}
if(mysql_num_rows( $result ) ) 
{
    print "該ID已被使用, 請換其他ID申請";
    die();
}
if ($p1 !=$p2)
{
    print "密碼不一致,請確認";
    die();
}
$sql = "INSERT INTO `FinalExam`.`user` (`ID`, `Password`) VALUES ('$id', '$p1')";
if ( !( $result = mysql_query( $sql, $database ) ) )
{
    print( "<p>Could not execute query!</p>" );
    die( mysql_error() . "</body></html>" );
}
print "註冊成功";
?>

