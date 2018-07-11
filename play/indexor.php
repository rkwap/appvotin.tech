<?php

include '../modules/connect.php';
    if(! $link ) {
      die('Could not connect: ' . mysql_error());
   }
   ?>
<html>
<head>
<title>Play Store</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<link type="text/css" rel="stylesheet" href="./data/style.css" />
</head>
<body>
<img src="./data/m3.png" />

     
     
      <form method="get" class="form-wrapper">
      <input type="text" name="q" id="search_text" placeholder="Search for apps or publishers..." autocomplete="off" class="form-control" />
      <input type="submit" name="submit" value="go" id="submit">
      <div id="result"></div>
      </form> 
      
    
    
    
    
 <!--   <form method="get" class="form-wrapper">-->
	<!--<input type="text" name="q" id="search" placeholder="Search for apps or publishers...">-->

 <!--   </form> -->
    
    
    
    
<?php
include ('../modules/parser_class.php');
$type = "android";
if (isset($_GET['q'])){


$search = $_GET['q'];   
$search = htmlspecialchars($search);
$search = str_replace(' ','_',$search);   
//getting html source from target
$source = file_get_html('https://play.google.com/store/search?q='.$search.'?&c=apps');  
//getting price
$price = $source->find('span[class="display-price"]'); 

foreach($source->find('span[class="display-price"]') as $element); 
$price[] = $element;
//getting app title
foreach($source->find('a[class="title"]') as $element) 
$app_title[] = $element->title;
//getting app link
foreach($source->find('a[class="title"]') as $element) 
$app_link[] = $element->href;
//getting publisher title
foreach($source->find('a[class="subtitle"]') as $element) 
$publisher_title[] = $element->title;
//getting publisher link
foreach($source->find('a[class="subtitle"]') as $element) 
$publisher_link[] = $element->href;
//getting icon url
foreach($source->find('img[class="cover-image"]') as $element)
$icon_url[] = $element->src;

echo '<b>Search results for :  ';
echo $_GET['q'];
echo "<br><br></b>";


for ($i=0;$i<count($app_title);$i++){
$app_link[$i] = "https://play.google.com".$app_link[$i];
$publisher_link[$i] = "https://play.google.com".$publisher_link[$i];
$price[$i] = str_replace('<span class="display-price">','',$price[$i]);
$price[$i] = str_replace('</span>','',$price[$i]);


################################
    //$query = $_GET['q']; 
    //$query = mysql_real_escape_string($query); // prevention from sql injection
    $raw_results = mysqli_query("SELECT * FROM apps
    WHERE (`name` LIKE '$app_title[$i]') OR (`publisher` LIKE '$publisher_title[$i]') ") or die(mysqli_error());
/////////////////////////////    
//checking whether a particular entry exists in db or not////
//if exists, then show///
    
//     if(mysqli_num_rows($raw_results) > 0){ 
// mysqli_num_rows($raw_results);
// echo "<h2>exists</h2>"; 
//             $results = mysqli_fetch_array($raw_results);
//                   echo '<a href="'.$results['appurl'].'">';
//                   echo '<img src="'.$results['iconurl'].'">';
//                   echo "<br>$results[name]</a><br> Publisher: ";
//                   echo '<a href="'.$results['publisherurl'].'">';
//                   echo "$results[publisher]</a><br>";
//                   echo " Price: $results[price]<br><br>";
//          }
        
////////////////    


                  echo '<a href="'.$app_link[$i].'">';
                  echo '<img src="'.$icon_url[$i].'">';
                  echo "<br>".$app_title[$i]."</a><br> Publisher: ";
                  echo '<a href="'.$publisher_link[$i].'">';
                  echo "".$publisher_title[$i]."</a><br>";
                  echo " Price: ".$price[$i]."<br><br>";




        
// ##############################
////else stores in db///
//////////////////////////////////
// else{


//storing the scraped data into sql
// $sql = "INSERT INTO apps (name, publisher, iconurl, appurl, publisherurl, price, type) 
// VALUES ('$app_title[$i]', '$publisher_title[$i]', '$icon_url[$i]', '$app_link[$i]', '$publisher_link[$i]', '$price[$i]', '$type')";
//   mysqli_select_db('id3266381_db');
//   $retval = mysqli_query( $sql, $link );
// //////////////////////////////////////////

// echo '<a href="'.$app_link[$i].'">';
// echo '<img src="'.$icon_url[$i].'">';
// echo "<br>$app_title[$i]</a><br> Publisher: ";
// echo '<a href="'.$publisher_link[$i].'">';
// echo "$publisher_title[$i]</a><br>";
// echo " Price: $price[$i]<br><br>
    
    
//     ";

//}///else
////////////////////////////////////////
}///for loop

    } ///isset form
?>
</body>
</html>
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"search.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>