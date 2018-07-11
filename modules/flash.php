<?php
/* format of notification function --- (from, align,color,icon,timer,message) --- */ 
$content .= "
    <script>window.onload = function() {
            demo.notification('top','center','".$flashType."','".$flashIcon."','100','".$flashMessage."');
                    };
    </script>
";
?>