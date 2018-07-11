<?php
include("./structure.php");
$pageTitle .= "Dashboard - Accept Feed";
$navTitle .= $username.": Dashboard";
$active .= $activeDashboard = 'active';


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
               
              </form></div>
              <div class="card-footer ">
                <button type="submit" name="acceptFeed" class="btn btn-success btn-round"><i class="nc-icon nc-check-2"></i> Accept</button>
                <button type="submit" name="rejectFeed" class="btn btn-danger btn-round"><i class="nc-icon nc-simple-remove"></i> Reject</button>
              </div>
              
            </div>
            
            
          </div>
</div>';
   
    // echo $_POST['requestStore'];
}

$pageHeader .= include ("../modules/pageHeaders/membersHeader.php"); 
?>