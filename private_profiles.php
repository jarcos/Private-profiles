<?php
/*
* Plugin Name: Private profiles
* Plugin URI: http://mecus.es
* Description: Hide profiles to all users
* Version: 1.0
* Author: josearcos
* Contributors: bi0xid
* Author URI: http://josearcos.me/
* License: GNU/GPL 2
*/

/**
 * Test if the current browser runs on a mobile device (smart phone, tablet, etc.)
 *
 * @since 3.9.1
 * @access public
 *
 * @uses $wpdb to get the current user ID.
 * @uses $bp to get the profile user ID.
 * @global object $wpdb 
 * @global object $bp 
 */

add_action( 'template_redirect', 'hide_profiles', 1 );

function hide_profiles() {
	global $wpdb;
	global $bp;

	/* Bloqueamos el acceso a la página de miembros para los no admins */
	if( bp_current_component('members') && !current_user_can( 'switch_themes' ) ) {
		// Redirigir al usuario
		bp_core_redirect( get_option( 'home' ));
	}

	/* Bloqueamos el acceso a la página de un perfil que no sea el propio */
	if ( bp_is_user() ){

		// Buscamos el ID del perfil del usuario que visitamos, y nuestro ID de usuario 
		$usuario_visitante = wp_get_current_user()->ID;
		$usuario_miembro = $bp->displayed_user->id;
	
		// Comparamos los IDs de usuario. Si no coinciden, el usuario no tiene permiso para ver el perfil y debe salir de la web
		if ( $usuario_visitante != $usuario_miembro ) {
			// Redirigir al usuario
			wp_redirect( home_url() );
			exit();
		}
	}

}
