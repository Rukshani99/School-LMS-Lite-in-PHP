<?php 
session_start();
require "header.php";
require "connection.php";
$class=$_SESSION['class'];
$section=$_SESSION['section'];

	$i=0;
$query="SELECT student_id,firsrt_name,Last_name from student WHERE class = '$class'  AND section = '$section' ";
$fire=mysqli_query($con,$query);
if($fire)
{


	?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Student Attendance
	</title>
	<style type="text/css">
		*
		{
			padding:0px;
			margin: 0px;
		}
		select
		{
			width: 350px;
			height: 35px;
			border:2px solid black;
			font-family: Agency Fb;
			font-size: 1.6em;
		}
		label
		{
			font-size: 1.6em;
			font-family: Agency Fb;
		}
		#attend_form
		{
			width: 80%;
			height:auto;
			border:1px solid black;
			margin: 0 auto;
			margin-top: 125px;
			margin-bottom: 290px;
		}
		#main_heading 
{
	width:280px;
	height: 35px;
	background-color: orange;
	font-size: 1.7em;
	text-align: center;
	margin:0 auto;
	margin-top:10px;
	margin-bottom: 10px;
	border:1px solid black; 
}
.box
{
	width: 357px;
    height: 75px;
    border: 0px solid black;
    padding-left: 5px;
    float: left;
    margin-top: 10px;
    margin-left:30px;
}
#clear
{
	clear: both;
}
#sub
{
	width: 81%;
	height: 40px;
	margin-top: 10px;
	margin-bottom: 20px;
	margin-left:95px;
	font-family: Agency Fb;
	font-size: 1.6em;
	font-weight: bold;
	background-color: orange;
	cursor: pointer;
}
#sub:hover
{
background-color: blue;
}
#student_data
{
	width: 100%;
	height: auto;
	border-top:2px solid orange;
	margin-top:5px;
}
#student_data .inputs
{
	width: 180px;
	height: 25px;
	font-family: Agency Fb;
	font-weight: bold;
	font-size: 1.4em;
	border:none;
}
.row_data
{
	width: 100%:
	height:25px;
	border:1px solid black;
	padding-left: 5px;
}
.row_data input
{
	font-size: 1.2em;
	font-family: Agency Fb;
	font-weight: bold;
	border:none;
	margin-left: 25px;
	text-align: center;
}
.option_row
{
	width: 25%;
	height: 30px;
	border:0px solid black;
	float: right;
	padding-left: 2px;
	font-size: 1.2em;
	font-family: Agency Fb;
	font-weight: bold;
}
input[type="text"]:disabled
{
	background-color: white;
	color:black;
}
#top_bar
{
	width: 100%
	height:25px;
	border:2px solid black;
	font-family: Agency Fb;
	margin-top: 2px;
	clear: both;
	background-color: orange;
}
#top_bar h3
{
	width: 250px;
	height: 25px;
float: left;
	margin-left: 5px;
	border:1px solid black;
}
#clear
{
	clear: both;
}
</style>
<script>
	function chk()
	{
		var clas=document.froms.atten.class_selector.value;
		var section=document.forms.atten.section_selector.value;
		if(clas == " " && Section == "")
		{
			alert("Some filed are blanks");
			return false;
		}
		else
			return true;
	}

</script>
</head>
<body>
<div id="attend_form" >
<h4 id="main_heading">Attendance Sheet</h4>
<div id="top_bar">
<h3 >Class : <?php echo $class; ?></h3>
<h3 align="center">Section : <?php echo $section; ?></h3>
<h3 align="right">Date : <?php echo date("m-d-Y"); ?></h3>
</div>
<?php 
$i=0;
	$row=mysqli_num_rows($fire);
	if($row > 0)
	{
		while ($rows=mysqli_fetch_assoc($fire))
	{
	

		?>
		<div id="clear"></div>
<div class="row_data">
<form action="" method="post">
	<input type="text" name="name[]" value="<?php echo $rows['firsrt_name']." ".$rows['Last_name'] ?>">
	<input type="text" name="student_id[]" value="<?php echo $rows['student_id']; ?>">
	<div class="option_row">
	<input type="radio" name="status[<?php echo $i; ?>]" value="present">Present
	<input type="radio" name="status[<?php  echo $i; ?>]" value="absent">Absent</div>
</div>
<?php $i++; 
}}}?><br><br></div>
<input type="submit" name="submit" value="Submit" id="sub">
</form>
<?php require "footer.php"; ?>
</body>
</html>
<?php 
$flag=0;
if(isset($_POST['submit']))
{
echo $class;
echo $section;
echo $total=count($_POST['student_id']);
foreach($_POST['status'] as $id => $status )
{
         $student_id=$_POST['student_id'][$id];
         $Status=$_POST['status'][$id];
	$date=date("Y-m-d");
	echo $query="INSERT INTO  attendance VALUES ('$date','$student_id','$Status','$class','$section')";
	echo "<br>";
	//echo $query;
	
	  $fire=mysqli_query($con,$query);
	  if($fire)
	  {
		$flag++;}
}
if($flag  > 0 )
{
	echo "<script> alert('Attendance Successfully Store'); </script>";
}
else
{
	echo "<script> alert('Attendance Not Successfully Store'); </script>";
}
}
?>