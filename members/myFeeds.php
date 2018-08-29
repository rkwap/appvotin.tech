<?php
include("./structure.php");
$pageTitle .= "Dashboard - AppVotin";
$navTitle .= $_SESSION['username'].": My Feeds";
$active .= $activeMyFeeds = 'active';

$limit = 6;  // number of feeds in a page
if (isset($_GET['page'])) { $page  = $_GET['page']; } else { $page=1; };  
$start_from = ($page-1) * $limit;  

$query = "SELECT * FROM feeds WHERE author='".$_SESSION['username']."' ORDER BY id DESC LIMIT $start_from, $limit";
$result = $link->query($query);
$queryTotal = "SELECT id FROM feeds WHERE author='".$_SESSION['username']."'";
$resultTotal = $link->query($queryTotal);
$totalRecords = $resultTotal->num_rows;
$totalPages = ceil($totalRecords/$limit);

// card for feed starts
$content .= '
    <div class="row">';  
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc())
    {
      // Getting all the parameters of a particular app.
      $appQuery = "SELECT * FROM apps WHERE id='".$row['appid']."'";
      $appResult = $link->query($appQuery);
      while($appRow = $appResult->fetch_assoc()){
        $appName = $appRow['name'];
        $appPub = $appRow['publisher'];
        $appType = $appRow['type'];
        $appPrice = $appRow['price'];
        $appIconURL = $appRow['iconurl'];
        $appURL = $appRow['appurl'];
        $pubURL = $appRow['publisherurl'];
      }
      if(strlen($appName)>=38){
        $appName = substr($appName,0,35).' ...';
      }
      /////

      $content .= '

        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body">
              <div id="accordion" role="tablist" aria-multiselectable="true" class="card-collapse">
                <div class="row">
                &nbsp;&nbsp;&nbsp;
                  <div class="card card-plain" style="font-size:16px;">
                    <a href="'.$appURL.'" style="color: inherit;"><b>'.$appName.'</b></a>
                    <div class="card-category">
                    <a href="'.$pubURL.'">'.$appPub.'</a>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="photo">
                      <img src="'.$appIconURL.'" alt="'.$appName.'">
                    </div>  
                  </div>';
                  
                  // getting type of feed
                  switch ($row['type']) {
                    case 'new': $type = 'New Release'; $typeColor = 'success'; break;
                    case 'discovery': $type = 'Discovery'; $typeColor = 'warning'; break;
                    case 'update': $type = 'Updated'; $typeColor = 'primary'; break;
                    case 'bug': $type = 'Bugs & Fixes'; $typeColor = 'danger'; break;
                    case 'price': $type = 'Price Drop'; $typeColor = 'default'; break;
                    default: $type = ''; break;
                  }
                  /////
                  // getting store type icon
                  switch ($appType) {
                    case 'android': $typeIcon = '<div class="icon icon-success" style="font-size:20px;"><i class="fab fa-google-play"></i>  Google Play</div>'; break;
                    case 'ios': $typeIcon = '<div class="icon icon-default" style="font-size:20px;"><i class="fab fa-app-store"></i>  App Store</div>'; break;
                    case 'windows': $typeIcon = '<div class="icon icon-primary" style="font-size:20px;"><i class="fab fa-windows"></i>Microsoft Store</div>'; break;
                    case 'pwa': $typeIcon = '<div class="icon icon-danger" style="font-size:20px;"><i class="fab fa-chrome"></i></div>'; break;
                    default: $typeIcon = ''; break;
                  }
                  //
                  
                  
                  $content .= '
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category"><button class="btn btn-'.$typeColor.' btn-sm btn-round">'.$type.'</button></p>
                      <p class="card-title"><a style="color: inherit;" href="'.$appURL.'">'.$typeIcon.'</a>
                      <p class="card-category">'.$appPrice.'</p>
                        </p><p>
                    </p></div>
                  </div>';
                  $title = hyphenize(cleanString($row['title']));
                  $title = str_replace('.','',$title);
                  if(strlen($row['title'])>=31){
                  $row['title'] = substr($row['title'],0,31).' ...';}
                  $content .='
                  <div class="card card-plain col-12 col-md-12">
                  <div class="card-header" role="tab" id="heading-'.$title.'-'.$row['author'].'-'.$row['appid'].'">
                    <a data-toggle="collapse" data-parent="#accordion" href="#'.$title.'-'.$row['author'].'-'.$row['appid'].'" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                    <b>'.$row['title'].'</b> <i class="nc-icon nc-minimal-down"></i>
                    </a>
                  </div>
                <div id="'.$title.'-'.$row['author'].'-'.$row['appid'].'" class="collapse" role="tabpanel" aria-labelledby="heading-'.$title.'-'.$row['author'].'-'.$row['appid'].'">
                      <div class="card-body">
                        '.$row['content'].'
                      </div>
                      <hr>
                </div>
                </div>



                </div>
              </div>
              <div class="card-footer ">
                
                <div class="stats">
                  <i class="fa fa-thumbs-up" aria-hidden="true"></i> Upvotes: '.$row['upvote'].'
                  &nbsp;
                  <i class="fa fa-thumbs-down" aria-hidden="true"></i> Downvotes: '.$row['downvote'].'
                </div>
              </div>
            </div>
            </div>
          </div>
        ';
    } 
}
// card for feed ends here

    $nextPage = $page+1;
    $prevPage = $page-1;
    $pagination = '
    </div>
    <hr>
    <div class="row">
    <div class="col-md-4"></div>
      <ul class="pagination">';
    $pagination .= '<li class="page-item">
                      <a class="page-link" href="?page=1" aria-label="Previous">
                        <span aria-hidden="true"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span>
                      </a>
                    </li>
                  <li class="page-item">
                      <a class="page-link" href="?page='.$prevPage.'" aria-label="Previous">
                        <span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                      </a>
                  </li>  ';
								for($i=1; $i<$totalPages+1; $i++){
								if($page == $i)  
								{$active='active';}
								else
								{$active=''; }
                $pagination .= '<li class="page-item '.$active.'"><a class="page-link" href="?page='.$i.'"><b>'.$i.'</b></a></li>';
								}
    $pagination .= '	<li class="page-item">
                      <a class="page-link" href="?page='.$nextPage.'" aria-label="Next">
                        <span aria-hidden="true"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                      </a>
                    </li>	
                    <li class="page-item">
                      <a class="page-link" href="?page='.$totalPages.'" aria-label="Next">
                        <span aria-hidden="true"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                      </a>
                    </li>	
            </ul>
          '; 

      $content .=  '<br>'.$pagination;
$content .= '</div>';
$pageHeader .= include ("../modules/pageHeaders/membersHeader.php"); 

$content .= 'hello';
?>