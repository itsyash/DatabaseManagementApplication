
<?php
session_start();
$flag=$_GET['flag'];
if($flag==1){
    echo "<script type='text/javascript'>alert('You have successfuly registered.');</script>";
}
echo "Hello ".$_GET['name'];
echo "<br>Hello ".$_GET['ssn'];
echo "<br><br>This is employee page";
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
<head>
<link href="./../style.css" rel="stylesheet" type="text/css" media="screen" />
<script>
function loadXMLDoc(z,y)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
	//alert("hello");
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    if(y==1){
    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    }
    else{
    	document.getElementById("myDiv2").innerHTML=xmlhttp.responseText;
    	}
  }
if(z==1){
xmlhttp.open("GET","getcustomerdata.php",true);
xmlhttp.send();
}
else
    {
    xmlhttp.open("GET","getorderdata.php",true);
    xmlhttp.send();   
    }
}
</script>
</head>
<body>
<div class="canvas">
    <div class="menu" style="width:50%"><h3>Customers</h3>
			<button type="button" onclick="loadXMLDoc(1,1)">View Customers </button><br><br>
			<div id="myDiv"><h2></h2></div><br>
			<a href="insert_customer.php"><h3>Insert a customer</h3></a><br><br>
	 </div>

	<div class="order" style="50%">
<button type="button" onclick="loadXMLDoc(2,2)">View Customer orders </button><br><br>
<div id="myDiv2"><h2></h2></div><br>
<a href="insert_customer_order.php"><h3>Insert an order </h3></a><br><br>
</div>
</div>
