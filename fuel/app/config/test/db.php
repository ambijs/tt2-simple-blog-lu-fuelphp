<?php
/**
 * The test database settings. These get merged with the global settings.
 *
 * This environment is primarily used by unit tests, to run on a controlled environment.
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
