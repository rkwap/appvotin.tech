<?php
include("./structure.php"); // Including essential structure file
$pageTitle .= "Dashboard - AppVotin"; // assigning page title
$navTitle .= $username.": Add Feed"; // assigning navbar title
$active .= $activeAddFeed = 'active'; // variable for active tab

// if addFeed card is submitted 
if(isset($_POST["addFeed"])){ 

    // making prepared statement
    $query = $link->prepare("INSERT INTO feedsRequests (appid, title, type, store, content, author) VALUES (?, ?, ?, ?, ?, ?)");
    
    // bing parameters to prepared statement
    /* i - integer d - double s - strin b - BLOB */
    $query->bind_param("isssss", $appID, $feedTitle, $feedType, $appStore, $feedContent, $username);
    
    // setting parameters
    $feedTitle= $_POST['title'];  // storing feedTitle
    $feedType = $_POST['type']; // storing feed type (new,update,bug or discovery)
    $feedContent = $_POST['content']; // storing feed content
    $appStore = $_POST['store']; // storing appStore type eg. android,iOS
    $appID = $_POST['appID']; // storing id of the app selected
    
    // executing query
    if (!$query->execute()) {
        die('Error: ' . mysqli_error($link));
    }
    
    /* --------- Flash Message ------- */    
    $flashType = 'success';
    $flashIcon = 'nc-icon nc-check-2';
    $flashMessage = '<b>The feed was successfully submited.<br>Please wait for the approval.</b>';
    require_once ("../modules/flash.php");    
    /* ---- End of Flash Message ----  */

    
    
    $query->close();
    $link->close();
}
if(isset($_POST["selectApp"])){
    $appID= $_POST['app'];
    $store = $_POST['store'];


    $content .= '
<div class="row">
<div class="col-md-8">

            <div class="card ">
              <div class="card-header ">
                <h4 class="card-title"><i class="nc-icon nc-simple-add"></i> Add A Feed</h4>
              </div>
              <div class="card-body ">
                <form method="post" action="">
                
                <label><h5>Title of Feed</h5></label>
                <div class="form-group">
                    <input class="form-control" name="title" placeholder="Title" type="text" required>
                 </div>

                <br>
                <label><h5>Type of Feed : </h5></label>
                <div class="form-group">
                 <select name="type" class="selectpicker" data-size="4" data-style="btn btn-outline-danger btn-round" title="Select a type">
                          <option value="new" selected>New Release</option>
                          <option value="discovery">New Discovery</option>
                          <option value="update">Update</option>
                          <option value="bug">Bugs and Fixes</option>
                </select> 
                </div>
                <br>
                <label><h5>Content</h5></label>
                <div class="form-group">
                    <textarea class="form-control " placeholder="Content" name="content" rows="5" type="text" required></textarea>
                 </div>  
             
                <input name="store" value="'.$store.'" type="text" hidden>
                <input name="appID" value="'.$appID.'" type="text" hidden>
                <button type="submit" name="addFeed" class="btn btn-info btn-round">Submit</button>
              </div>
              </form>
            </div>
            
            
          </div>
</div>
';
 }
else
{
$content .= '
<div class="row">
<div class="col-md-8">

            <div class="card ">
              <div class="card-header ">
                <h4 class="card-title"><i class="nc-icon nc-box-2"></i> Select An App</h4>
              </div>
              <div class="card-body ">
                <form method="post" action="">
                
                <label><h5>App</h5></label>
                <div class="form-group">
                    <input class="form-control" name="app" placeholder="app" type="text" required>
                 </div>
                <br> 
                <label><h5>Select Store</h5></label>
                <div class="form group"> 
                <div class="form-check-radio">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="store" id="android" value="android" checked=""> <b>Android</b>
                          <span class="form-check-sign"></span>
                        </label>
                      </div>
                      <div class="form-check-radio">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="store" id="ios" value="ios" disabled=""> <b>iOS</b>
                          <span class="form-check-sign"></span>
                        </label>
                    </div>
                </div>
                <br>
               
              </div>
              <div class="card-footer ">
                <button type="submit" name="selectApp" value="App" class="btn btn-info btn-round">Submit</button>
              </div>
              </form>
            </div>
            
            
          </div>
</div>
';
}


$pageHeader .= include ("../modules/pageHeaders/membersHeader.php"); 
?>