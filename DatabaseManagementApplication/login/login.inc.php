<?php   
$fg=false;
require 'connect.inc.php';
require 'core.inc.php';
if(isset($_GET['name']) && isset($_GET['password'])){
    //$_SESSION['loggedin'] = true;
    $name=$_GET['name'];
    $password=  md5($_GET['password']);
    //echo $password.'<br>';echo $username.'<br>';
    if(empty($name) || empty($password)){
        echo 'not valid';
    }
    else {
        
        $query="select USER from ADMIN where USER='$name' and PASSWORD='$password'";
        if($query_run =  mysql_query($query)){
        $num_rows=  mysql_num_rows($query_run);
        echo $num_rows.' ';
        if($num_rows>=1){
		$fg=true;
	    $_SESSION['loggedin'] = true;
            header('Location: admin.php');
}
        }
        else
            mysql_errno();
           
        if(!$fg==true){
        $query="select SSN from WORKING_STAFF1 where NAME='$name' and PASSWORD='$password'";
        $query_run=  mysql_query($query);
        $num_rows=  mysql_num_rows($query_run);
        //echo $num_rows.'<br>';
        if($num_rows==0){
         echo 'incorrect username or password';
        }
        else if($num_rows>=1){
	//$_SESSION['loggedin'] = true;
        //echo 'succeessfully logged in';
        //$user_id=  mysql_result($query_run, 0, 'name');
	//$category= mysql_result($query_run, 0 , 'Dnum' );      
	$user_name=$name;
        $user_ssn=mysql_result($query_run,0,'SSN');
        $q="select CATEGORY from WORKING_STAFF2 where SSN='$user_ssn'";
        $q_run=  mysql_query($q);
        $user_category=mysql_result($q_run,0,'CATEGORY');
	$_SESSION['loggedin'] = true;
        header('Location: '.$user_category.'.php?name='.$user_name.'&ssn='.$user_ssn.'&category='.$user_category."&flag=0");
    }
        }
    }
}
?>
<style type="text/css" >
a {text-align:right}
#sweet{
opacity:1;
position:absolute;
top:9em;
z-index:7;
width:32em;
height:22em;
left:38em;
-moz-box-shadow: 3px 3px 4px #000;
-webkit-box-shadow: 3px 3px 4px #000;
box-shadow: 3px 3px 4px #000;
-moz-transform: translate(100px) rotate(7deg);
    -moz-transform-origin: 60% 100%;

    -webkit-transform: translate(100px) rotate(7deg);
    -webkit-transform-origin: 60% 100%;

    -o-transform:translate(100px) rotate(7deg); 
    -o-transform-origin:60% 100%;

    -ms-transform: translate(100px) rotate(7deg);
    -ms-transform-origin: 60% 100%;

    transform: translate(100px) rotate(7deg);
    transform-origin: 60% 100%;
-moz-transition-property:height,width,opacity;
-moz-transition-duration: 0.1s,0.1s,0.1s;
-webkit-transition-property:height,width,opacity;
-webkit-transition-duration: 0.1s,0.1s,0.1s;
-o-transition-property:height,width,opacity;
-o-transition-duration: 0.1s,0.1s,0.1s;
}
#res{
opacity:0.8;
position:absolute;
top:6em;
z-index:4;
width:33em;
height:22em;
left:62em;
-moz-box-shadow: 3px 3px 4px #000;
-webkit-box-shadow: 3px 3px 4px #000;
box-shadow: 3px 3px 4px #000;
-moz-transform: translate(100px) rotate(-10deg);
    -moz-transform-origin: 60% 100%;

    -webkit-transform: translate(100px) rotate(-10deg);
    -webkit-transform-origin: 60% 100%;

    -o-transform:translate(100px) rotate(-10deg); 
    -o-transform-origin:60% 100%;

    -ms-transform: translate(100px) rotate(-10deg);
    -ms-transform-origin: 60% 100%;

    transform: translate(100px) rotate(10deg);
    transform-origin: 60% 100%;
-moz-transition-property:height,width,opacity;
-moz-transition-duration: 0.1s,0.1s,0.1s;
-webkit-transition-property:height,width,opacity;
-webkit-transition-duration: 0.1s,0.1s,0.1s;
-o-transition-property:height,width,opacity;
-o-transition-duration: 0.1s,0.1s,0.1s;
}

</style>



<link href="./../style.css" rel="stylesheet" type="text/css" media="screen" />
<center><h2>LE Punjabi Chef</h2></center><br>
<img id="sweet" src="sweet.jpg"/>
<img id="res" src="res.jpg"/>
<h3>Login here</h3>
<form action="<?php echo $current_file; ?>" method="GET">
    Name:<input type="text" name="name">   
    Password:<input type="password" name="password">
    <!--<img src="generateimage.php">-->
    <input type="submit" value="log in"><br><br>
    <a href="register.php">Register</a>
    
</form><br>

