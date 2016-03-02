<?php
header("content-type:text/html;charset=utf-8");
$con = mysql_connect('localhost',"root","root");
mysql_set_charset("utf-8");
$select = mysql_select_db("geneorders");
// echo "aaaaaaaaa";
// exit;
// echo $select;
// echo "<br/>";
$sql = "select * from ge_primers";
// echo $sql;
$query = mysql_query($sql);
while($row = mysql_fetch_assoc($query)){
	// echo "aa";
	echo "@@@".$row['name']."$$$$<br/>";
}
// echo "aaa";

?>