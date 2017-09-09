<?php
return array(
    'page' => 'site/index',
    'page/([0-9]+)' => 'site/index/$1',
    'update/([0-9]+)' => 'tack/update/$1',
    'register' => 'user/register', 
    'login' => 'user/login',
    'logout' => 'user/logout',
    'add' => 'tack/add', 
    'tack' => 'site/tack', 
    'index.php' => 'site/index',
    '' => 'site/index',
);

