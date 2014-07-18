<?php 
/*
* Plugin Name: Private profiles
* Plugin URI: https://github.com/jarcos/Private-profiles
* Description: Hide profiles to all users
* Version: 1.0.1
* Author: josearcos
* Contributors: bi0xid
* Author URI: http://josearcos.me/
* License: GNU/GPL 2
*/

// Solo carga el plugin cuando BP está activo
function private_profiles_init() {
	require( 'private_profiles.php' );
}
add_action( 'bp_include', 'private_profiles_init' );
