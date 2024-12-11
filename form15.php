<?php
$con = mysqli_connect("localhost","root","","shana");
if(!$con){
echo "Connection Error";
}
$acc_no = $title = $author = $edition = $publication="";
$success = false;
if ($_SERVER["REQUEST_METHOD"]=="POST"){
$acc_no=$_POST["acc_no"];
$title=$_POST["title"];
$author=$_POST["author"];
$edition=$_POST["edition"];
$publication=$_POST["publication"];
$query = "INSERT into books(Acc_no,Title,Author,Edition,Publication) VALUES('$acc_no','$title', '$author','$edition', '$publication')";

if (mysqli_query($con, $query)) {
$success = true;
}
else {
echo "Error: ".$query. "<br>". mysqli_error($con);
}

}
?>
<!DOCTYPE HTML>
<html>
<body bgcolor="cyan">
<a href="search.php"> <button style="float: right;">Search</button></a>
<center><h2>Library Management System</h2></center>
<form action="#" method="post">
<table border="2" align="center" cellpadding="5" cellspacing="5">
<tr>
<td> Accession number :</td>
<td> <input type="text" name="acc_no" size="48"

style="height:25px;"></td>
</tr>
<tr>
<td> Enter Title :</td>
<td><input type="text" name="title" size="48" style="height:25px;"></td>
</tr>
<tr>
<td> Enter Author :</td>
<td> <input type="text" name="author" size="48" style="height:25px;"></td>
</tr>
<tr>
<td> Enter Edition :</td>
<td> <input type="text" name="edition" size="48"

style="height:25px;"></td>
</tr>
<tr>
<td> Enter Publication : </td>
<td><input type="text" name="publication" size="48"

style="height:25px;"></td>
</tr>
<tr>
<td></td>
<td> <input type="submit" value="submit">
<input type="reset" value="Reset">
</td>
</tr>
</table>
</form>
<center>
<?php
if($success){
echo "<h1>Book Data inserted successfully..!";
}
?>
</center>
</body>
</html>