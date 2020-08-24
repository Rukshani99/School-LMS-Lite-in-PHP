
<!DOCTYPE html>
<html>
<head>
	<title>
		Attendance Main Page
	</title>
	<style type="text/css">
		select,input
		{
			width: 350px;
			height: 35px;
			border:2px solid l:blue;
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
			border:0px solid black;
			margin: 0 auto;
			margin-top: 100px;
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
	border-radius: 25px 5px;
	border:0px solid black; 
}
.box
{
	width: 57%;
	height: auto;
	border:0px solid black;
	margin-left: 145px;
	margin-top: 45px;
	padding-left: 65px;
}
#sub
{
	width: 55%;
	height: 40px;
	margin-top: 20px;
	margin-left:175px;
	font-family: Agency Fb;
	font-size: 1.6em;
	font-weight: bold;
	background-color: orange;
	border-radius: 10px;
	cursor: pointer;
}
#sub:hover
{
background-color: blue;
}
input[type="date"]:disabled
{
	background-color: white;
}

</style>
<script type="text/javascript">
	function chk()
	{
		var id=document.forms.selec_op.id.value;
		var amount=document.forms.selec_op.amount.value;
		var iD=document.getElementById("std_id");
		var clas=document.getElementById("right").value;
		var cl=document.getElementById("right");
		var c2=document.getElementById("left");
		//var sec=document.getElementById("left").value;
		var sec=document.forms.selec_op.section_selector.value;
		if(id == "")
		{
			alert("Please Type Student id");
			iD.style.backgroundColor="black";
		    iD.style.borderColor="red";
			iD.style.color="white";
			return false;
		}
		else if(amount ==  )
		{
			alert("Please Enter Fee Amount");
			return false;
		}
		if(clas == "select one")
		{
			alert("Please Select Class");
			cl.style.borderColor="red";
			return false;
		}
		else if(sec == "select_opt")
		{
			alert("Please Select Section");
			c2.style.borderColor="red";
			return false;
		}
		else
			return true;
	}

</script>
</head>
<body>
<div id="attend_form" > 
<form action="fee_catch.php" method="post" name="selec_op" onsubmit="return chk()">
<h4 id="main_heading">Fee Window</h4>
<div class="box">
<label>Student ID</label><br>
<input type="text" name="id" placeholder="Student id" id="std_id"><br>
<label>Fee Amount</label><br>
<input type="number" name="amount" placeholder="Fee_Amount" id="Amount"><br>
<label>Fee Date</label><br>
<input value="<?php echo date("Y-m-d"); ?>" type="date" name="sub_date"  id="date" ><br>
<label>Class</label><br>
<select name="class_selector" id="right">
	<option value="select one">Select Class</option>
	<option value="6th">
		6th
	</option>
	<option value="7th">
		7th
	</option>
	<option value="8th">
		8th
	</option>
	<option value="9th">
		9th
	</option>
	<option value="10th">
		10th
	</option>
</select><br>

<label>Section</label><br>
<select name="section_selector" id="left">
	<option value="select_opt">Select Section</option>
	<option value="Green">
		Green
	</option>
	<option value="Yellow">
		Yellow
	</option>
	<option value="Pink">
		Pink
	</option>
	<option value="Blue">
		Blue
	</option>
</select>	<br>
</div>
<input type="submit" name="submit" value="submit" id="sub">
</form>
</body>
</html>