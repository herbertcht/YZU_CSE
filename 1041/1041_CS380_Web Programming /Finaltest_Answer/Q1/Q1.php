<?php
$input = $_GET["input"];
$seq=$input;
for ($i=1;$i<=9;$i++)
{
    $num=[0,0,0,0,0,0,0,0,0,0];
    $out="";
    for ($j=0;$j<strlen($seq);$j++)
    {
	$s=(int)(substr($seq,$j,1));
//	print $s;
	$num[$s]++;
    }
    for($j =9;$j>=0;$j--)
    {
	if($num[$j]>0)
	{
	    $out=$out.$num[$j].$j;
	}
    }
    $seq=$out;
}
    print "<p>$out</p>";
?>
