<?php
$from = $_POST["from"];
$to = $_POST["to"];
$aq = $_POST["aq"];
$query = "SELECT `Date`,avg(`Value`) FROM `airquality` WHERE `TYPE` = '$aq' and `Date` >= '$from' and `Date` <= '$to' GROUP BY(`Date`)";
if ( !( $database = mysql_connect( "localhost", "final", "final" ) ) )
    die( "Could not connect to database </body></html>" );
if ( !mysql_select_db( "FinalExam", $database ) )
    die( "Could not open products database </body></html>" );
if ( !( $result = mysql_query( $query, $database ) ) )
{
    print( "<p>Could not execute query!</p>" );
    die( mysql_error() . "</body></html>" );
}
mysql_close( $database );
while ( $row = mysql_fetch_row( $result ) )
{
    print( "$row[0],$row[1]\n" );
}

?>

