<?php
include("./structure.php");
$pageTitle .= "Dashboard - Accept Feed";
$navTitle .= $username.": Accept Feed/s";
$active .= $activeDashboard = 'active';

if(isset($_POST['viewAll']))
{
                
                    if($admin)
                    {
                        $sql = "SELECT * FROM feedsRequests ORDER BY id DESC";
                        $result = $link->query($sql);
                        if ($result->num_rows > 0) {
                            
                            $row = $result->fetch_assoc();
                            $content .= '
                            <form action="feedRequests.php" method="post" accept-charset="utf-8"> 
                            <input name ="requestTitle" value="'.$row['title'].'" hidden />
                            <input name ="requestAppID" value="'.$row['appid'].'" hidden />
                            <input name ="requestType" value="'.$row['type'].'" hidden />
                            <input name ="requestStore" value="'.$row['store'].'" hidden />
                            <input name ="requestAuthor" value="'.$row['author'].'" hidden />
                            <input name ="requestContent" value="'.$row['content'].'" hidden />
                            <button name="notification" type="submit" class="dropdown-item">'.$row['title'].'</button>
                            </form>';
                            while($row = $result->fetch_assoc()) {
                                $content .= '
                                <form action="feedRequests.php" method="post" accept-charset="utf-8">  
                                <input name ="requestTitle" value="'.$row['title'].'" hidden />
                                <input name ="requestAppID" value="'.$row['appid'].'" hidden />
                                <input name ="requestType" value="'.$row['type'].'" hidden />
                                <input name ="requestStore" value="'.$row['store'].'" hidden />
                                <input name ="requestAuthor" value="'.$row['author'].'" hidden />
                                <input name ="requestContent" value="'.$row['content'].'" hidden />
                                <button name="notification" type="submit" class="dropdown-item">'.$row['title'].'</button>
                                </form>';
                            } 
                        }
                    }
                
                
                
                
                
}
if(isset($_POST))
{
$appID=$_POST['app'];
$appStore=$_POST['store'];
$feedTitle=$_POST['title'];
$feedType=$_POST['type'];
$feedContent=$_POST['content'];
$username=$_POST['author'];



    if(isset($_POST['acceptFeed'])){
        
        // making prepared statement
        $query = $link->prepare("INSERT INTO feeds (appid, title, type, store, content, author) VALUES (?, ?, ?, ?, ?, ?)");
        
        // bing parameters to prepared statement
        /* i - integer d - double s - strin b - BLOB */
        $query->bind_param("isssss", $appID, $feedTitle, $feedType, $appStore, $feedContent, $username);
        
        // executing query
        if (!$query->execute()) {
            die('Error: ' . mysqli_error($link));
        }
        
        
        $queryDelete = "DELETE FROM feedsRequests WHERE appid='$appID' AND author='$username' AND content='$feedContent' AND title='$feedTitle' AND type='$feedType' AND store='$appStore';";
        if($link->query($queryDelete) === true){
        /* --------- Flash Message ------- */    
        $flashType = 'success';
        $flashIcon = 'nc-icon nc-check-2';
        $flashMessage = '<b>The feed was successfully added.';
        require_once ("../modules/flash.php");    
        /* ---- End of Flash Message ----  */
        } else{
            echo "ERROR";
        }

    }

    if(isset($_POST['rejectFeed'])){
        
        $query = "DELETE FROM feedsRequests WHERE appid='$appID' AND author='$username' AND content='$feedContent' AND title='$feedTitle' AND type='$feedType' AND store='$appStore';";
        if($link->query($query) === true){
            /* --------- Flash Message ------- */    
            $flashType = 'success';
            $flashIcon = 'nc-icon nc-check-2';
            $flashMessage = '<b>The feed was rejected.';
            require_once ("../modules/flash.php");    
            /* ---- End of Flash Message ----  */
        } else{
            echo "ERROR"; 
        }
    }

}

if(isset($_POST['notification'])) 
{
    
    
    $content = '<div class="row">
<div class="col-md-8">

            <div class="card ">
              <div class="card-header ">
                <h4 class="card-title"><i class="nc-icon nc-align-left-2"></i> Accept Feed</h4>
                <b>Sumitted By: @'.$_POST['requestAuthor'].'</b>
              </div>
              <div class="card-body ">
                <form method="post" action="">
                <input type="hidden" name="author" value="'.$_POST['requestAuthor'].'" />
                
                <div class="form-group">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="../images/members/rkwap.jpg" alt="...">
                  </a>
                </div>
                </div>
                
                
                
                <label><h5>App</h5></label>
                <div class="form-group">
                    <input class="form-control" name="app" value="'.$_POST['requestAppID'].'" placeholder="app" required="" type="text">
                 </div>
                <br> 
                <label><h5>Select Store</h5></label>
                <div class="form group"> 
                <div class="form-check-radio">
                        <label class="form-check-label">
                          <input class="form-check-input" name="store" id="android" value="android" checked="" type="radio"> <b>Android</b>
                          <span class="form-check-sign"></span>
                        </label>
                      </div>
                      <div class="form-check-radio">
                        <label class="form-check-label">
                          <input class="form-check-input" name="store" id="ios" value="ios" disabled="" type="radio"> <b>iOS</b>
                          <span class="form-check-sign"></span>
                        </label>
                    </div>
                </div>
                <br>
                
                                <label><h5>Title of Feed</h5></label>
                <div class="form-group">
                    <input class="form-control" name="title" value="'.$_POST['requestTitle'].'" placeholder="Title" type="text" required>
                 </div>

                <br>
                <label><h5>Type of Feed : </h5></label>
                <div class="form-group">
                 <select name="type" class="selectpicker" data-size="8" data-style="btn btn-outline-danger btn-round" title="Select a type">
                        <option disabled>Selected Option</option>
                        <option value="'.$_POST['requestType'].'" selected>New Release</option>
                        <option disabled>------------------</option>
                        <option disabled>Select Another One</option>
                        <option value="new">New Release</option>
                        <option value="discovery">New Discovery</option>
                        <option value="update">Update</option>
                        <option value="bug">Bugs and Fixes</option>
                </select> 
                </div>
                <br>
                <label><h5>Content</h5></label>
                <div class="form-group">
                    <textarea class="form-control " placeholder="Content" name="content" rows="5" type="text" required>'.$_POST['requestContent'].'</textarea>
                 </div>  
               
              </div>
              <div class="card-footer ">
                <button type="submit" name="acceptFeed" class="btn btn-success btn-round"><i class="nc-icon nc-check-2"></i> Accept</button>
                <button type="submit" name="rejectFeed" class="btn btn-danger btn-round"><i class="nc-icon nc-simple-remove"></i> Reject</button>
              </div>
              </form>
              
            </div>
            
            
          </div>
</div>';
   
    // echo $_POST['requestStore'];
}

$pageHeader .= include ("../modules/pageHeaders/membersHeader.php"); 
?>