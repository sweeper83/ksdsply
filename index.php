<!DOCTYPE html>
<html>
<head>
<style>

body {
    margin: 0;
    padding: 0;
}
div.relative {
    position: relative;
	margin: auto;
	bottom: 150px;
    font-size: 30px;
}

table {
	border-collapse: collapse;
	width: 100%;
	text-align: right
	
}

th {
    height: 100px;
	background-color:grey;
	padding: 10px;
	text-align: center;
}

td, tr {
	padding: 50px;
	height: 50px;
	border: 1px solid black;
	
	
}

	tr:nth-child(odd){background-color: #f2f2f2}
	
	
	
	
</style>
</head>
<body>
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

$query1 = "SELECT * FROM `ksdsply` WHERE k_pkgline=1 order by k_date desc, k_time desc limit 3";
$result1 = $conn->query($query1);
if (!$result1) die($conn->error);

$query2 = "SELECT * FROM `ksdsply` WHERE k_pkgline=2 order by k_date desc, k_time desc limit 3";
$result2 = $conn->query($query2);
if (!$result2) die($conn->error);

$query3 = "SELECT * FROM `ksdsply` WHERE k_pkgline=3 order by k_date desc, k_time desc limit 3";
$result3 = $conn->query($query3);
if (!$result3) die($conn->error);

$query4 = "SELECT * FROM `ksdsply` WHERE k_pkgline=5 order by k_date desc, k_time desc limit 3";
$result4 = $conn->query($query4);
if (!$result4) die($conn->error);

$results[0] = $result1;
$results[1] = $result2;
$results[2] = $result3;
$results[3] = $result4;
?>


<p style="text-align: right;margin-right: 200px;margin-top: 200px;">
<div class="relative">
<table>

<tr>
	<th><b> קו 4 </b><br></th>
	<th><b> קו 3 </b><br></th>
	<th><b> קו 2 </b><br></th>
	<th><b> קו 1 </b><br></th>
</tr>


	
	<?
	for ($j = 0 ; $j<3 ; ++$j)
	{	
		echo '<tr>';
		for ($i = 3; $i>=0; $i--){
			$results[$i]->data_seek($i);
			$row = $results[$i]->fetch_array(MYSQLI_ASSOC);
				
			echo '<td>';	
			echo '<b> לקוח: </b>' . $row['k_name']. '<br>';
			echo '<b> מיקום: </b>' . $row['k_place']. ' <br> ';
			echo '<b> קוד יעד: </b>' . $row['k_dst']. '<br>';
			echo '<marquee behavior="scroll" direction="left"><b> הערה </b></marquee><br>' . $row['k_pkgline']. ' <br><br> ';
			echo '</td>';
		}		
		echo '</tr>';
	}	
		
	?>		
	 
	


</table>
</div>

<?
/*
for ($j = 0,$i=0 ; $j < $rows1 && $i<3 ; ++$j)
	{
	$result1->data_seek($j);
	$row = $result1->fetch_array(MYSQLI_ASSOC);
		
	echo '<b> לקוח: </b>' . $row['k_name']. '<br>';
	echo '<b> מיקום: </b>' . $row['k_place']. ' <br> ';
	echo '<b> קוד יעד: </b>' . $row['k_dst']. ' | ';
	echo '<b> הערה </b>' . $row['k_pkgline']. ' <br><br> ';
	
	}
}		
*/
$result1->close();
$result2->close();
$result3->close();
$result4->close();
$conn->close();
?>
</body>
</html>