<?php
include '../modules/connect.php';

$connect = mysqli_connect($SERVERmysql, $DB_USER, $DB_PASS, $DB_USER);
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($link, $_POST["query"]);
 $query = "
  SELECT * FROM apps 
  WHERE name LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM apps ORDER BY id
 ";
}
if(!empty($search))
{
$result = mysqli_query($link, $query);

if(mysqli_num_rows($result) > 0)
{
 $output .= '
<div class="table-responsive">
<table class="table table bordered">
     <tr>
     <th>Name</th>
    </tr>
 ';

if (mysqli_num_rows($result)>5)
{
for($i=0; $i<5; $i++) {
     $row = mysqli_fetch_array($result);
  $output .= '
   <tr>
    <td> <img src="'.$row["iconurl"].'" width="40" height="40" alt=" "><a href="http://appvotin.tech/play/?q='.$row["name"].'">'.$row["name"].'</a></td>
   </tr>
  ';   
        
    }
    
 echo $output;

}
else 
{
   for($i=0; $i<mysqli_num_rows($result); $i++)
   {
      $row = mysqli_fetch_array($result);
  $output .= '
   <tr>
    <td> <img src="'.$row["iconurl"].'" width="40" height="40" alt=" "><a href="http://appvotin.tech/play/?q='.$row["name"].'">'.$row["name"].'</a></td>
   </tr>
  ';    
       
   } 
   echo $output;  
}

 
 
}
}
?>