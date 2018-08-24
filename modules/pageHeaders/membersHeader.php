<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/members/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/members/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title><?php echo $pageTitle ?></title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/members/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/members/css/paper-dashboard.min790f.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/members/demo/demo.css" rel="stylesheet" />
    <style type="text/css" id="wp-custom-css">
	img[alt*="www.000webhost.com"] {
        display: none;}		</style>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="brown" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com/" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/members/img/logo-small.png">
          </div>
        </a>
        <a href="http://www.creative-tim.com/" class="simple-text logo-normal">
            AppVotin!
          <!-- <div class="logo-image-big">
            <img src="../assets/members/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <img src="<?php echo $memberProfilePic ?>" />
          </div>
          <div class="info">
            <a data-toggle="collapse" href="#collapseExample" class="collapsed">
              <span>
                <?php echo $memberName ?>
                <br><b>@<?php echo $username; ?></b>
                <b class="caret"></b>
              </span>
            </a>
            <div class="clearfix"></div>
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                <li>
                  <a href="#">
                    <span class="sidebar-mini-icon">MP</span>
                    <span class="sidebar-normal">My Profile</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span class="sidebar-mini-icon">EP</span>
                    <span class="sidebar-normal">Edit Profile</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span class="sidebar-mini-icon">S</span>
                    <span class="sidebar-normal">Settings</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        
        
        <ul class="nav">
          <li class="<?php echo $activeDashboard; ?> btn-magnify">
            <a href="./dashboard.php">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          
        <li class="<?php echo $activeAddFeed; ?> btn-magnify">
            <a href="./addFeed.php">
              <i class="nc-icon nc-simple-add"></i>
              <p>Add a feed</p>
            </a>
        </li>  
          
        <li class="<?php echo $activeMyFeeds; ?> btn-magnify">
            <a href="./myFeeds.php">
              <i class="nc-icon nc-align-center"></i>
              <p>My Feeds</p>
            </a>
        </li>    
          
        <li class="<?php echo $activeMyVotes; ?> btn-magnify">
            <a href="./myVotes.php">
              <i class="nc-icon nc-check-2"></i>
              <p>My Votes</p>
            </a>
        </li>   
          
        </ul>
        
    
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-icon btn-round">
                <i class="nc-icon nc-minimal-right text-center visible-on-sidebar-mini"></i>
                <i class="nc-icon nc-minimal-left text-center visible-on-sidebar-regular"></i>
              </button>
            </div>
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo"><?php echo $navTitle; ?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
               <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Notifications</span>
                  </p>
                    <?php 
                    if($admin)
                    {
                        $sql = "SELECT * FROM feedsRequests";
                        $result = $link->query($sql);
                        $count = $result->num_rows;
                        echo '<span class="badge badge-pill badge-default">'.$count.'</span>';
                    }
                    ?> 
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <?php 
                
                    if($admin)
                    {
                        $sql = "SELECT * FROM feedsRequests ORDER BY id DESC LIMIT 5";
                        $result = $link->query($sql);
                        if ($result->num_rows > 0) {
                            
                            $row = $result->fetch_assoc();
                            echo '
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
                                echo '
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
                            echo' 
                            <form action="feedRequests.php" method="post" accept-charset="utf-8">
                            <button name="viewAll" type="submit" class="dropdown-item"><small><b>View All</b></small></button>
                            </form>';
                        }
                    }
                ?>    
                </div>
              </li>  
              
              
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle btn-magnify" id="themes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Themes</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="themes">
  
                    <button type="disabled" class="dropdown-item">Sidebar Mini</button>
                    <div class="togglebutton switch-sidebar-mini">
                    <label class="switch-mini">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="bootstrap-switch" type="checkbox" data-toggle="switch" data-on-color="info" data-off-color="info" data-on-label="ON" data-off-label="OFF">
                    <span class="toggle"></span>
                    </label>
                    </div>
                    
                    <button type="disabled" class="dropdown-item">Sidebar Background</button>
                    <div class="theme-plugin">
                        <a href="javascript:void(0)" class="switch-trigger background-color">
                            <button class="dropdown-item" data-color="white"><b>White</b></button>
                            <button class="dropdown-item" data-color="brown"><b>Brown</b></button>
                            <button class="dropdown-item" data-color="gradient"><b>Gradient</b></button>
                        </a>
                    </div>
                    <button type="disabled" class="dropdown-item">Sidebar Active Color</button>
                    <div class="theme-plugin">
                        <a href="javascript:void(0)" class="switch-trigger active-color">
                            <button class="dropdown-item" data-color="primary"><b>Teal</b></button>
                            <button class="dropdown-item" data-color="info"><b>Blue</b></button>
                            <button class="dropdown-item" data-color="success"><b>Green</b></button>
                            <button class="dropdown-item" data-color="warning"><b>Yellow</b></button>
                            <button class="dropdown-item" data-color="danger"><b>Orange</b></button>
                        </a>
                    </div>
                    
            </li> 
  
               <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle btn-rotate" id="settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Settings</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="settings">
                <form action="/main/members/signInOutUp.php" method="post" accept-charset="utf-8">    
                  <button name="signout" type="submit" class="dropdown-item"><i class="nc-icon nc-minimal-left"></i>Sign Out</button>
                </div></form>
              </li>  
              
              
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      
      <div class="content">
                <!-- Content goes here -->
            <?php echo $content; ?>

      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
            <ul>
                <li>
                  <a href="/" target="_blank">AppVotin!</a>
                </li>
                <li>
                  <a href="/" target="_blank">Blog</a>
                </li>
                <li>
                  <a href="/" target="_blank">Licenses</a>
                </li>
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by AppVotin
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
 
  
  <!--   Core JS Files   -->
  <script src="../assets/members/js/core/jquery.min.js"></script>
  <script src="../assets/members/js/core/popper.min.js"></script>
  <script src="../assets/members/js/core/bootstrap.min.js"></script>
  <script src="../assets/members/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="../assets/members/js/plugins/moment.min.js"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="../assets/members/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../assets/members/js/plugins/sweetalert2.min.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../assets/members/js/plugins/jquery.validate.min.js"></script>
  <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../assets/members/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/members/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/members/js/plugins/bootstrap-datetimepicker.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
  <script src="../assets/members/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/members/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/members/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../assets/members/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../assets/members/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Bootstrap Table -->
  <script src="../assets/members/js/plugins/nouislider.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="../../../buttons.github.io/buttons.js"></script>
  <!-- Chart JS -->
  <script src="../assets/members/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/members/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/members/js/paper-dashboard.min790f.js?v=2.0.1" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/members/demo/demo.js"></script>
  <!-- Sharrre libray -->
  <script src="../assets/members/demo/jquery.sharrre.js"></script>
  <script>
    $(document).ready(function() {

      $sidebar = $('.sidebar');
      $sidebar_img_container = $sidebar.find('.sidebar-background');

      $full_page = $('.full-page');

      $sidebar_responsive = $('body > .navbar-collapse');
      sidebar_mini_active = true;

      window_width = $(window).width();

      fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

      // if( window_width > 767 && fixed_plugin_open == 'Dashboard' ){
      //     if($('.fixed-plugin .dropdown').hasClass('show-dropdown')){
      //         $('.fixed-plugin .dropdown').addClass('show');
      //     }
      //
      // }

      $('.theme-plugin a').click(function(event) {
        // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
        if ($(this).hasClass('switch-trigger')) {
          if (event.stopPropagation) {
            event.stopPropagation();
          } else if (window.event) {
            window.event.cancelBubble = true;
          }
        }
      });

      $('.theme-plugin .active-color button').click(function() {
        $full_page_background = $('.full-page-background');

        $(this).siblings().removeClass('active');
        $(this).addClass('active');

        var new_color = $(this).data('color');

        if ($sidebar.length != 0) {
          $sidebar.attr('data-active-color', new_color);
        }

        if ($full_page.length != 0) {
          $full_page.attr('data-active-color', new_color);
        }

        if ($sidebar_responsive.length != 0) {
          $sidebar_responsive.attr('data-active-color', new_color);
        }
      });

      $('.theme-plugin .background-color button').click(function() {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');

        var new_color = $(this).data('color');

        if ($sidebar.length != 0) {
          $sidebar.attr('data-color', new_color);
        }

        if ($full_page.length != 0) {
          $full_page.attr('filter-color', new_color);
        }

        if ($sidebar_responsive.length != 0) {
          $sidebar_responsive.attr('data-color', new_color);
        }
      });

      $('.theme-plugin .img-holder').click(function() {
        $full_page_background = $('.full-page-background');

        $(this).parent('li').siblings().removeClass('active');
        $(this).parent('li').addClass('active');


        var new_image = $(this).find("img").attr('src');

        if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
          $sidebar_img_container.fadeOut('fast', function() {
            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $sidebar_img_container.fadeIn('fast');
          });
        }

        if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
          var new_image_full_page = $('.theme-plugin li.active .img-holder').find('img').data('src');

          $full_page_background.fadeOut('fast', function() {
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
            $full_page_background.fadeIn('fast');
          });
        }

        if ($('.switch-sidebar-image input:checked').length == 0) {
          var new_image = $('.theme-plugin li.active .img-holder').find("img").attr('src');
          var new_image_full_page = $('.theme-plugin li.active .img-holder').find('img').data('src');

          $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
          $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
        }

        if ($sidebar_responsive.length != 0) {
          $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
        }
      });

      $('.switch-sidebar-image input').on("switchChange.bootstrapSwitch", function() {
        $full_page_background = $('.full-page-background');

        $input = $(this);

        if ($input.is(':checked')) {
          if ($sidebar_img_container.length != 0) {
            $sidebar_img_container.fadeIn('fast');
            $sidebar.attr('data-image', '#');
          }

          if ($full_page_background.length != 0) {
            $full_page_background.fadeIn('fast');
            $full_page.attr('data-image', '#');
          }

          background_image = true;
        } else {
          if ($sidebar_img_container.length != 0) {
            $sidebar.removeAttr('data-image');
            $sidebar_img_container.fadeOut('fast');
          }

          if ($full_page_background.length != 0) {
            $full_page.removeAttr('data-image', '#');
            $full_page_background.fadeOut('fast');
          }

          background_image = false;
        }
      });


      $('.switch-mini input').on("switchChange.bootstrapSwitch", function() {
        $body = $('body');

        $input = $(this);

        if (paperDashboard.misc.sidebar_mini_active == true) {
          $('body').removeClass('sidebar-mini');
          paperDashboard.misc.sidebar_mini_active = false;

          $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

        } else {

          $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

          setTimeout(function() {
            $('body').addClass('sidebar-mini');

            paperDashboard.misc.sidebar_mini_active = true;
          }, 300);
        }

        // we simulate the window Resize so the charts will get updated in realtime.
        var simulateWindowResize = setInterval(function() {
          window.dispatchEvent(new Event('resize'));
        }, 180);

        // we stop the simulation of Window Resize after the animations are completed
        setTimeout(function() {
          clearInterval(simulateWindowResize);
        }, 1000);

      });

    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();


      demo.initVectorMap();

    });
  </script>
<script>
function goBack() {
window.history.back();
}
</script>
</body>

</html>