
<?php
//session_start();
//require 'core.inc.php';
require 'connect.inc.php';
 if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['category']))
     { 
     $name=$_POST['name'];
     $price=$_POST['price'];
     $category=$_POST['category'];
     
     if(!empty($name) && !empty($price) && !empty($category))
         {
            
                $query="select NAME from MENU where NAME='$name'";
                //echo $query;
                $query_run=  mysql_query($query);
                if(mysql_num_rows($query_run)>0){
                    echo 'Name'.$name.'already exists'.'<br>';
                    $name="";
                }
                else{
              
                     $query="select * from MENU";
                     $res=mysql_query($query);
                     $item_no=rand(1,10)+rand(1,10)+rand(1,10);
                    $query="insert into MENU values('$item_no','$price','$category','$name')";
                    $query_run=  mysql_query($query);
                   if($query_run){
                       header('Location: chef.php');
                       echo $item_no;
                      mysql_close(mysql_connect("localhost","root", "pt1234"));        
                   }
                   else{
                       echo 'error'.'<br>'.$item_no;
                   }
                    
            
         }
         }
     else {
         echo 'all fields are required';   
          }  
     }
    
    ?>
<form action="insert_menu.php" method="POST">
    Name:<br><input type="text" name="name" maxlength="15" ><br><br>
    Price:<br><input type="text" name="price"><br><br>
    Category:
    <select name ="category">
  <option value="Indian">Indian</option>
  <option value="Continental">Continental</option>
  <option value="Chinese">Chinese</option>
    </select> <br><br>
    <input type="submit" value="Insert menu item">
</form>
