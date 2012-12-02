<?php
/**
 * The staging database settings. These get merged with the global settings.
 */

return array(
    'default' => array(
        'connection'  => array(
            'dsn'        => 'mysql:host=localhost;dbname=fuel_blog',
            'username'   => 'fuel_blog_user',
            'password'   => 'fuel_blog_password',
        ),
    ),
);
