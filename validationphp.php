<!DOCTYPE html>
<html lang="en">
<head>
<title>Form Validation</title>
</head>
<body bgcolor="lightblue">
<?php
$name = "";
$email="";
$phone = "";
$address="";
$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
$pattern2 = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
if ($_SERVER["REQUEST_METHOD"]=="POST"){
extract($_POST);
$valid = true;
if (empty($name)) {
echo "<script>alert('Please enter name.')</script>";
$valid = false;
}
if (empty($email)) {
echo "<script>alert('Please enter email.')</script>";
$valid = false;
}
if (!preg_match ($pattern, $email)){
echo "<script>alert('Please enter a valid email.')</script>";
$valid = false;

}
if (empty($phone)) {
echo "<script>alert('Please enter phone number.')</script>";
$valid = false;
}
else{
if (strlen ($phone) != 10) {
echo "<script>alert('Mobile no must contain 10 digits.')</script>";
}
}
if (empty($gender)) {
echo "<script>alert('Gender is required')</script>";
$valid = false;
}
if (empty($pass)) {
echo "<script>alert('Please provide your password')</script>";
$valid = false;
}
if ($pass!=$pass1) {
echo "<script>alert('password dont match')</script>";
$valid = false;
}
if (!preg_match ($pattern2, $pass)){
echo "<script>alert('minimum 8 characters.one special,uppercase,number,
lowercase required')</script>";
$valid = false;
}
if (empty($address)) {
echo "<script>alert('Please provide your Communication Address')</script>";
$valid = false;
}
if($valid){
$con = Mysqli_Connect("localhost","root", "", "validation");
if(!$con){

echo "Connection error !";
}
else{
$sql = "INSERT INTO form (name, email, phone_num, gender, address,pass)
VALUES ('$name', '$email', $phone, '$gender', '$address','$pass')";
if ($con->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: ".$sql."<br>". $con->error;
}
$con->close();
}
$name = "";
$email="";
$phone = "";
$address="";
$pass="";
echo "<script>alert('Submission successful!')</script>";
}
}
?>
<form method="post" action="">
<table align="center">
<tr>
<td colspan="2"><h1 align="center">Registration Form</h1></td> </tr>
</tr>
<tr>
<td>Name:</td>
<td><input type="text" name="name" value="<?php echo $name; ?>"></td>
</tr>
<tr>
<td>Email-Id: </td>
<td><input type="text" name="email" value="<?php echo $email; ?>"></td>
</tr>
<tr>

<td>Phone Number: </td>
<td><input type="number" name="phone" value="<?php echo $phone;
?>"></td>
</tr>
<tr>
<td>Password: </td>
<td><input type="password" name="pass" value=""autocomplete="newpassword"></td>
</tr>
<tr>
<td>Confirmpassword: </td>
<td><input type="password" name="pass1" value=""></td>
</tr>
<tr>
<td>Gender : </td>
<td><input type="radio" name="gender" value="male"> Male
 <input type="radio" name="gender" value="female"> Female
 <input type="radio" name="gender" value="other"> Other </td>
</tr>
<tr>
<td>Address : </td>
<td><textarea name="address"><?php echo $address;?></textarea></td>
</tr>
<tr>
<td><input type="submit" value="SUBMIT" ></td>
<td><input type="reset" value="RESET"></td>
</tr>
</table>
</form>
</body>
</html>