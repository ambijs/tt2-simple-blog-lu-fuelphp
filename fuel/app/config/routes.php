<?php
return array(
	'_root_'  => 'blog/index',  // The default route
    '_404_' => 'blog/404',
    'category/:id' => 'blog/index/$1',
	'create' => 'blog/create',
    'view/:id' => 'blog/view/$1',
    'edit/:id' => 'blog/edit/$1',
    'delete/:id' => 'blog/delete/$1',
);