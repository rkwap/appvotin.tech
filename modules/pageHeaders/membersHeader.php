 <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?php echo $pageTitle ?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/members/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/members/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/members/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="brown" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="white | brown | any other value "
    -->
      <div class="logo">
        <a href="/" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/members/img/logo-small.png">
          </div>
        </a>
        <a href="/" class="simple-text logo-normal">
          AppVotin!
          <!-- <div class="logo-image-big">
            <img src="../assets/members/img/logo-big.png">
          </div> -->
        </a>
     </div>
      <div class="sidebar-wrapper">
          
        <div class="user">
          <div class="photo">
            <img src="<?php echo $memberProfilePic ?>" width="40">
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
                  <a href="member.php">
                    <span class="sidebar-mini-icon">MP</span>
                    <span class="sidebar-normal">My Profile</span>
                  </a>
                </li>
                <li>
                  <a href="member.php">
                    <span class="sidebar-mini-icon">EP</span>
                    <span class="sidebar-normal">Edit Profile</span>
                  </a>
                </li>
                <li>
                  <a href="member.php">
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
              <b>Dashboard</b>
            </a>
          </li>
          
        <li class="<?php echo $activeAddFeed; ?> btn-magnify">
            <a href="./addFeed.php">
              <i class="nc-icon nc-simple-add"></i>
              <b>Add a feed</b>
            </a>
        </li>  
          
        <li class="<?php echo $activeMyFeeds; ?> btn-magnify">
            <a href="./myFeeds.php">
              <i class="nc-icon nc-align-center"></i>
              <b>My Feeds</b>
            </a>
        </li>    
          
        <li class="<?php echo $activeMyVotes; ?> btn-magnify">
            <a href="./myVotes.php">
              <i class="nc-icon nc-check-2"></i>
              <b>My Votes</b>
            </a>
        </li>   
          
        <li class="btn-magnify">
            <a data-toggle="collapse" href="#pagesExamples" class="" aria-expanded="true">
              <i class="nc-icon nc-book-bookmark"></i>
              <b>
                Pages</b>
            </a>
            <div class="collapse" id="pagesExamples" style="">
              <ul class="nav">
                <li>
                  <a href="../examples/pages/timeline.html">
                    <span class="sidebar-mini-icon">T</span>
                    <span class="sidebar-normal"> Timeline </span>
                  </a>
                </li>
                <li>
                  <a href="../examples/pages/login.html">
                    <span class="sidebar-mini-icon">L</span>
                    <span class="sidebar-normal"> Login </span>
                  </a>
                </li>
                <li>
                  <a href="../examples/pages/register.html">
                      <span class="sidebar-mini-icon">R</span>
                    <span class="sidebar-normal"> Register </span>
                  </a>
                </li>
                <li>
                  <a href="../examples/pages/lock.html">
                      <span class="sidebar-mini-icon">LS</span>
                    <span class="sidebar-normal"> Lock Screen </span>
                  </a>
                </li>
                <li>
                  <a href="../examples/pages/user.html">
                      <span class="sidebar-mini-icon">LP</span>
                    <span class="sidebar-normal"> User Profile </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>  
          
          
          <li class="btn-magnify">
            <a href="./map.html">
              <i class="nc-icon nc-pin-3"></i>
              <b>Maps</b>
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
                            //echo '<a class="dropdown-item" href="#">'.$row['title'].'</a>';
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
                    <div class="dropdown-header">Sidebar Background</div>
                     <a href="javascript:void(0)" data-color="white" class="switch-trigger background-color"><span class="badge filter badge-light" data-color="white"></span>White</a>
                     <!--<span class="badge filter badge-default active" data-color="brown"></span>-->
                     <!--<span class="badge filter badge-light" data-color="white"></span>-->
                     <!--<span class="badge filter badge-default" data-color="gradient"></span>-->
                  <a class="dropdown-item" href="#">Action</a>
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
                </script>, made with <i class="fa fa-heart heart"></i> by AppVotin!
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
   <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Background</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="badge-colors text-center">
              <span class="badge filter badge-default active" data-color="brown"></span>
              <span class="badge filter badge-light" data-color="white"></span>
              <span class="badge filter badge-default" data-color="gradient"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title"> Sidebar Active Color</li>
        <li class="adjustments-line text-center">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <span class="badge filter badge-primary" data-color="primary"></span>
            <span class="badge filter badge-info" data-color="info"></span>
            <span class="badge filter badge-success" data-color="success"></span>
            <span class="badge filter badge-warning" data-color="warning"></span>
            <span class="badge filter badge-danger active" data-color="danger"></span>
          </a>
        </li>
      </ul>
    </div>
  </div>
  
  
  
  <!--   Core JS Files   -->
  <script src="../assets/members/js/core/jquery.min.js"></script>
  <script src="../assets/members/js/core/popper.min.js"></script>
  <script src="../assets/members/js/core/bootstrap.min.js"></script>
  <script src="../assets/members/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/members/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/members/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/members/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/members/demo/demo.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/members/js/plugins/bootstrap-selectpicker.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/members/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
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

      $('.fixed-plugin a').click(function(event) {
        // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
        if ($(this).hasClass('switch-trigger')) {
          if (event.stopPropagation) {
            event.stopPropagation();
          } else if (window.event) {
            window.event.cancelBubble = true;
          }
        }
      });

      $('.fixed-plugin .active-color span').click(function() {
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

      $('.fixed-plugin .background-color span').click(function() {
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

      $('.fixed-plugin .img-holder').click(function() {
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
          var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

          $full_page_background.fadeOut('fast', function() {
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
            $full_page_background.fadeIn('fast');
          });
        }

        if ($('.switch-sidebar-image input:checked').length == 0) {
          var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
          var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

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
function goBack() {
    window.history.back();
}
</script>
</body>

</html>