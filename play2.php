<html>
<head>
<title>Play Store</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<link type="text/css" rel="stylesheet" href="assets/css/paper-kit.css?v=2.1.0" />
</head>
<body>
<img src="./data/m3.png" />
      <form method="get" class="form-wrapper">
      <input type="text" name="q" id="search_text" placeholder="Search for apps or publishers..." autocomplete="off" class="form-control" />
      <input type="submit" name="submit" value="go" id="submit">
      <div id="result"></div>
      </form> 
<?php
include ('modules/parser_class.php');
require ("modules/connect.php");
$type = "android";
if (isset($_GET['q'])){

$search = $_GET['q'];   
$search = htmlspecialchars($search);
$search = str_replace(' ','_',$search);   
//getting html source from target
$source = file_get_html('https://play.google.com/store/search?q='.$search.'?&c=apps&price=0');  
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
$count = count($app_title);

for ($i=0;$i<$count;$i++){
    
$app_link[$i] = "https://play.google.com".$app_link[$i];
$publisher_link[$i] = "https://play.google.com".$publisher_link[$i];
$price[$i] = str_replace('<span class="display-price">','',$price[$i]);
$price[$i] = str_replace('</span>','',$price[$i]);
if(empty($price[$i]))
{$price[$i]='Free';}
//$icon_url[$i] = str_replace('https://lh','http://lh',$icon_url[$i]);
$icon_url[$i] = str_replace('//lh','http://lh',$icon_url[$i]);
//$icon_url[$i] = str_replace('http://lh','http://lh',$icon_url[$i]);

//$icon_url[$i] = str_replace(array('//lh', 'https://lh', 'http://lh'), array('http://lh', 'https://lh', 'http://lh'),$icon_url[$i]);



 $query[$i] = "SELECT * FROM apps WHERE name = '".$app_title[$i]."' AND price='".$price[$i]."' AND publisher='".$publisher_title[$i]."' AND iconurl='".$icon_url[$i]."' AND appurl='".$app_link[$i]."' AND publisherurl='".$publisher_link[$i]."' ;";
 $raw_results[$i] = mysqli_query($link,$query[$i]) or die(mysqli_error());

                if(mysqli_num_rows($raw_results[$i]) > 0){ 
                    
                mysqli_num_rows($raw_results[$i]);
                $results = mysqli_fetch_array($raw_results[$i]);
                    $app_title[$i] = $results['name'];
                    $publisher_title[$i] = $results['publisher'];
                    $icon_url[$i] = $results['iconurl'];
                    $app_link[$i] = $results['appurl'];
                    $publisher_link[$i] = $results['publisherurl'];
                    $icon_path[$i] = $results['iconPath'];
        //   if(!($i % 10)){echo '<br>';}

                  echo '<a href="'.$app_link[$i].'">';
                  echo '<img src="images_temp/stores/'.$icon_path[$i].'">';
                  echo "<br>".$app_title[$i]."</a><br> Publisher: ";
                  echo '<a href="'.$publisher_link[$i].'">';
                  echo "".$publisher_title[$i]."</a><br>";
                  echo " Price: ".$price[$i]."<br><br>";
                }   
                else
                {
                    
                //Making variables suitable for use
                $name = $app_title[$i].'_by_'.$publisher_title[$i];
                $name = htmlspecialchars($name);
                $name  = preg_replace('/[^a-zA-Z0-9_ -]/s','',$name);
                $name = str_replace( array( '\'', '"', ',' , ';', '<', '>' ), ' ', $name);
                $name = str_replace(' ','_',$name);
                $name = $name.'.png';
                $path = $type.'/'.$name;
                
                
                $query[$i] = "INSERT INTO apps (name,publisher,type,price,iconurl,appurl,publisherurl,iconPath) 
                VALUES('".$app_title[$i]."', '".$publisher_title[$i]."', '".$type."', '".$price[$i]."', '".$icon_url[$i]."', '".$app_link[$i]."', '".$publisher_link[$i]."', '".$path."') ;";

                //upload icon
                file_put_contents("images_temp/stores/".$path, file_get_contents($icon_url[$i]));
                mysqli_query($link,$query[$i]) or die(mysqli_error());   
                

                }
}///for loop
 

    } ///isset form
?>
</body>
</html>