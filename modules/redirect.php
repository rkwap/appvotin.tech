<?php
function redirect($u)
{
    $s = '<script type="text/javascript">';
    $s .= 'window.location = "' . $u . '"';
    $s .= '</script>';
    echo $s;
}
?>