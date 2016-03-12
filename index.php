<?php
require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die(mysql_fatal_error($conn->connect_error));

function mysql_fatal_error($msg)
{
$msg2 = mysql_error();
echo <<< _END
We are sorry, but it was not possible to complete
the requested task. The error message we got was:
<p>$msg: $msg2</p>
Please click the back button on your browser
and try again. If you are still having problems,
please <a href="mailto:admin@server.com">email
our administrator</a>. Thank you.
_END;
}
mysqli_query($conn, "SET NAMES utf8;");

$query1 = "SELECT * FROM `ksdsply`";
$result1 = $conn->query($query1);
if (!$result1) die($conn->error);
$rows1 = $result1->num_rows;

$query2 = "SELECT * FROM `ksdsply` WHERE k_pkgline=2";
$result2 = $conn->query($query2);
if (!$result2) die($conn->error);
$rows2 = $result2->num_rows;

echo '<p style="text-align: right;margin-right: 200px;margin-top: 200px;">';
echo '<table style="border-spacing: 10px;align: justify;padding: 15px;align: right;border: 1px solid black;text-align: right"><td>';


echo '<b> קו 4 </b><br>';
for ($j = 0,$i=0 ; $j < $rows1 && $i<3 ; ++$j)
	{
	$result1->data_seek($j);
	$row = $result1->fetch_array(MYSQLI_ASSOC);
	if ($row['k_pkgline']==5){
		
		 
		 echo '<b> לקוח: </b>' . $row['k_name']. '<br>';
		 echo '<b> מיקום: </b>' . $row['k_place']. ' <br> ';
		 echo '<b> קוד יעד: </b>' . $row['k_dst']. ' | ';
		 echo '<b> הערה </b>' . $row['k_pkgline']. ' <br><br> ';
		 $i++;		
		 
	}
}		
echo '</td><td>';
echo '<b> קו 3 </b><br>';
for ($j = 0,$i=0 ; $j < $rows1 && $i<3 ; ++$j)
	{
	$result1->data_seek($j);
	$row = $result1->fetch_array(MYSQLI_ASSOC);
	if ($row['k_pkgline']==3){
		
		
		 echo '<b> לקוח: </b>' . $row['k_name']. '<br>';
		 echo '<b> מיקום: </b>' . $row['k_place']. ' <br> ';
		 echo '<b> קוד יעד: </b>' . $row['k_dst']. ' | ';
		 echo '<b> הערה </b>' . $row['k_pkgline']. ' <br><br> ';
		 $i++;		
		  
	}
}
echo '</td><td>';
echo '<b> קו 2 </b><br>';
for ($j = 0,$i=0 ; $j < $rows1 && $i<3 ; ++$j)
	{
	$result1->data_seek($j);
	$row = $result1->fetch_array(MYSQLI_ASSOC);
	if ($row['k_pkgline']==2){
		
		
		 echo '<b> לקוח: </b>' . $row['k_name']. '<br>';
		 echo '<b> מיקום: </b>' . $row['k_place']. ' <br> ';
		 echo '<b> קוד יעד: </b>' . $row['k_dst']. ' | ';
		 echo '<b> הערה </b>' . $row['k_pkgline']. ' <br><br> ';
		 $i++;		
		  
	}
}
echo '</td><td>';
echo '<b> קו 1 </b><br>';
for ($j = 0,$i=0 ; $j < $rows1 && $i<3 ; ++$j)
	{
	$result1->data_seek($j);
	$row = $result1->fetch_array(MYSQLI_ASSOC);
	if ($row['k_pkgline']==1){
		
		
		 echo '<b> לקוח: </b>' . $row['k_name']. '<br>';
		 echo '<b> מיקום: </b>' . $row['k_place']. ' <br> ';
		 echo '<b> קוד יעד: </b>' . $row['k_dst']. ' | ';
		 echo '<b> הערה </b>' . $row['k_pkgline']. ' <br><br> ';
		 $i++;		
		  
	}
}	
	
echo '</td>';
echo '</table>';
echo '</p>';

$result1->close();
$result2->close();
$conn->close();
?>