<?php

function lang($phrase)
{

    static $lang = array(

        // navbar words
        'HOME'          => 'Home',
        'CATEGORIES'    => 'Categories',
        'ITEMS'         => 'Items',
        'MEMBERS'       => 'Users',
        'COMMENTS'      => 'Comments',
        'STORE'         => 'Store',
        'LOGS'          => 'Logs',
        'MAHMOUD'       => '  Mahmoud  ',
        'EDIT PROFILE'  => 'Edit Profile',
        'SETTINGS'      => 'Settings',
        'LOG OUT'       => 'Log Out',
    );

    return $lang[$phrase];
}
