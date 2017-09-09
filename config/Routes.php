<?php
return array(
    'page' => 'site/index',
    'view/([0-9]+)' => 'site/view/$1',
    'page/([0-9]+)' => 'site/index/$1',
    'update/([0-9]+)' => 'tack/update/$1',
    'add' => 'site/add',
    'addcommment' => 'site/addcommment',
    'index.php' => 'site/index',
    '' => 'site/index',
);

