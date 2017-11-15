<?php
$id = $_POST["id"];
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
mysql_close( $database );
print( mysql_num_rows( $result ) ) ;
?>

