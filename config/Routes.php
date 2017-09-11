<?php
return array(
    'page' => 'site/index',
    'view/([0-9]+)' => 'site/view/$1',
    'page/([0-9]+)' => 'site/index/$1',
    'edit/([0-9]+)' => 'site/edit/$1',
    'getcom/([0-9]+)' => 'site/getcommment/$1',
    'add' => 'site/add',
    'update' => 'site/update',
    'addcommment' => 'site/addcommment',
    'index.php' => 'site/index',
    '' => 'site/index',
);

