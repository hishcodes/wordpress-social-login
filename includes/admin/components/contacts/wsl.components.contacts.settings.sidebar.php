<?php
/*!
* WordPress Social Login
*
* http://hybridauth.sourceforge.net/wsl/index.html | http://github.com/hybridauth/WordPress-Social-Login
*    (c) 2011-2014 Mohamed Mrassi and contributors | http://wordpress.org/extend/plugins/wordpress-social-login/
*/

/**
* BuddyPress integration.
*/

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit; 

// --------------------------------------------------------------------

function wsl_component_contacts_settings_sidebar()
{
	// HOOKABLE: 
	do_action( "wsl_component_contacts_settings_sidebar_start" );

	$sections = array(
		'what_is_this' => 'wsl_component_contacts_settings_sidebar_what_is_this',
	);

	$sections = apply_filters( 'wsl_component_contacts_settings_sidebar_alter_sections', $sections );


	foreach( $sections as $section => $action )
	{
		?>
			<div class="postbox">
				<div class="inside">
					<?php
						do_action( $action . '_start' );

						do_action( $action );

						do_action( $action . '_end' );
					?>
				</div>
			</div>
		<?php
	}

	// HOOKABLE: 
	do_action( "wsl_component_contacts_settings_sidebar_end" );
}

// --------------------------------------------------------------------	

function wsl_component_contacts_settings_sidebar_what_is_this()
{
?>
<h3 style="cursor: default;"><?php _wsl_e("User contacts import", 'wordpress-social-login') ?></h3>

<div style="padding:0 20px;">
	<p>
		<?php _wsl_e( 'WordPress Social Login also allow you to import users contact list from Google Gmail, Facebook, Windows Live and LinkedIn', 'wordpress-social-login') ?>.
	</p> 

	<p>
		<?php _wsl_e( 'When enabled, users authenticating through WordPress Social Login will be asked for the authorisation to import their contact list. Note that some social networks do not provide certain of their users information like contacts emails, photos and or profile urls', 'wordpress-social-login') ?>.
	</p> 
	<hr />
	<p>
		<b><?php _wsl_e("Notes", 'wordpress-social-login') ?>:</b> 
	</p> 
	
	<ul style="margin-left:40px;margin-top:0px;">
		<li><?php _wsl_e('To enable contacts import from these social network, you need first to enabled them on the <a href="options-general.php?page=wordpress-social-login&wslp=networks"><b>Networks</b></a> tab and register the required application', 'wordpress-social-login') ?>.</li> 
		<li><?php _wsl_e("<b>WSL</b> will try to import as much information about a user contacts as he was able to pull from the social networks APIs.", 'wordpress-social-login') ?></li> 
		<li><?php _wsl_e('All contacts data are sotred into your database on the table: <code>`wsluserscontacts`</code>', 'wordpress-social-login') ?>.</li> 
	</ul> 
</div> 
<?php
}

add_action( 'wsl_component_contacts_settings_sidebar_what_is_this', 'wsl_component_contacts_settings_sidebar_what_is_this' );

// --------------------------------------------------------------------	