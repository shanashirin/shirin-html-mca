<!DOCTYPE HTML>
<html>
<body bgcolor="violet">
<center><h2>Library Management System</h2></center>
<br>
<?php
$con = mysqli_connect("localhost","root","","shana");
if(!$con){
echo "Connection Error";
}
$search = $_REQUEST["search"];
$query = "SELECT Acc_no, Title, Author, Edition, Publication FROM
books WHERE title like '%$search%'";
$result = mysqli_query($con,$query);
?>
<?php
if(mysqli_num_rows($result)>0)
{
?>
<table border="2" align="center" cellpadding="5" cellspacing="5">
<tr>
<th> Accession_number </th>
<th> Title </th>
<th> Author </th>
<th> Edition </th>
<th> Publication </th>
</tr>
<?php
while($row = mysqli_fetch_assoc($result)) {
?>
<tr>
<td><?php echo $row["Acc_no"];?></td>
<td><?php echo $row["Title"];?></td>
<td><?php echo $row["Author"];?> </td>
<td><?php echo $row["Edition"];?></td>
<td><?php echo $row["Publication"];?></td>
</tr>
<?php
}
?>
</table>
<?php
}
else {
echo "<center>No books found in the library by the name $search </center>";
}
?>
</body>
</html>