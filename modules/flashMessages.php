<?php
########### delete flash ######		
if ($_SERVER['REQUEST_URI']	== '/admin/'.$file_name.'?delete')
{
$content = '<div id="flash" data-notify="container" class="col-xs-11 col-sm-4 alert alert-success alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1031; top: 20px; left: 0px; right: 0px;"><span data-notify="message"><b>The '.$type.' was Successfully deleted</b></span><a href="#" target="_blank" data-notify="url"></a></div>
    <script language="JavaScript" type="text/javascript">timedMsg()</script>';           
}


############### update flash ###########
if ($_SERVER['REQUEST_URI']	== '/admin/'.$file_name.'?update')
{

$content = '<div id="flash" data-notify="container" class="col-xs-11 col-sm-4 alert alert-success alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1031; top: 20px; left: 0px; right: 0px;"><span data-notify="message"><b>The '.$type.' was Successfully Updated</b></span><a href="#" target="_blank" data-notify="url"></a></div>
    <script language="JavaScript" type="text/javascript">timedMsg()</script>';           
}



#########  add entity flash(admin) ############# 
if ($_SERVER['REQUEST_URI']	== '/admin/'.$file_name.'?add')
{
 //<br><a href="'.$link_url.'">Click here to Link '.$type.'.</a>
$content = '<div id="flash" data-notify="container" class="col-xs-11 col-sm-4 alert alert-success alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1031; top: 20px; left: 0px; right: 0px;"><span data-notify="message"><b>The '.$type.' was Successfully Added.
    </b></span><a href="#" target="_blank" data-notify="url"></a></div>
    <script language="JavaScript" type="text/javascript">timedMsg()</script>'; 
}


#########  add request entity flash (users) ############# 
if ($_SERVER['REQUEST_URI']	== '/'.$file_name.'?add_pending')
{
$content = '<div id="flash" data-notify="container" class="col-xs-11 col-sm-4 alert alert-success alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1031; top: 20px; left: 0px; right: 0px;"><span data-notify="message"><b>The '.$type.' was successfully submitted.<br>
    Wait for the approval of your submission.
    </b></span><a href="#" target="_blank" data-notify="url"></a></div>
    <script language="JavaScript" type="text/javascript">timedMsg()</script>'; 
}

?>


