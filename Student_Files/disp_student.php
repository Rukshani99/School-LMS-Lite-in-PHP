<?php require "header.php";?>
<?php
require "connection.php";
$query="SELECT *FROM student";
$fire=mysqli_query($con,$query);
if($fire)
{
$row=mysqli_num_rows($fire);
if($row > 0)
{
	while($rows=mysqli_fetch_assoc($fire))
	{
echo "<br><br>";
echo "student_id : ".$rows["student_id"]. "<br>";
echo "first_name : ".$rows["firsrt_name"]."<br>";
echo "last_name : ".$rows["Last_name"]."<br>";
echo "Father Name : ".$rows["father_name"]."<br>";
echo "Email : ".$rows["email"]."<br>";
echo "Dob : ".$rows["dob"]."<br>";
echo "password : ".$rows["password"]."<br>";
echo "Contact Nbr : ".$rows["contact_nbr"]."<br>";
echo "Gender : ".$rows["gender"]."<br>";
echo "Address :".$rows["adress"]."<br>";
$img=$rows["pic_source"];
echo "<img src='$img' height='250' width='150' alt='Student_picture'>";
	}
} 
}

?>
<?php require "footer.php";?>
