<?php

    $u="/admin";
    echo "Not logged in";
    echo '<br><a href="/admin">Login</a>';
    redirect($u);


function redirect($u)
{
    $s = '<script type="text/javascript">';
    $s .= 'window.location = "' . $u . '"';
    $s .= '</script>';
    echo $s;
}
?>