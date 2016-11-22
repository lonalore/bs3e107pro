<?php

/**
 * @file
 * Shortcodes for bs3e107pro theme.
 */

// Loads [THEME]/languages/English.php (if English is the current language).
e107::lan('theme');


/**
 * Class theme_shortcodes.
 */
class theme_shortcodes extends e_shortcode
{

	/**
	 * Constructor.
	 */
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Return with HTML formatted site name.
	 *
	 * @return string
	 */
	function sc_site_name()
	{
		return e107::getParser()->parseTemplate('{SITENAME}');
	}

	/**
	 * Returns with HTML formatted site slogan.
	 *
	 * @return string
	 */
	function sc_site_slogan()
	{
		return e107::getParser()->parseTemplate('{SITEDESCRIPTION}');
	}

	/**
	 * Renders user navigation and login drop-down.
	 *
	 * @return string
	 */
	function sc_navigation_user()
	{
		$tp = e107::getParser();

		include_lan(e_PLUGIN . 'login_menu/languages/' . e_LANGUAGE . '.php');
		require(e_PLUGIN . 'login_menu/login_menu_shortcodes.php');

		$userReg = defset('USER_REGISTRATION');

		if(!USERID) // Logged Out.
		{
			$socialActive = e107::pref('core', 'social_login_active');

			if(empty($userReg)) // value of 1 or 2 = login okay.
			{
				return '';
			}

			$text = '<ul class="nav navbar-nav navbar-right">';

			if($userReg == 1)
			{
				$text .= '<li><a href="' . e_SIGNUP . '">' . LAN_LOGINMENU_3 . '</a></li>'; // Signup
			}

			$text .= '<li class="divider-vertical"></li>';
			$text .= '<li class="dropdown">';
			$text .= '<a class="dropdown-toggle" href="#" data-toggle="dropdown">' . LAN_LOGINMENU_51 . ' <strong class="caret"></strong></a>';
			$text .= '<div class="dropdown-menu col-sm-12" style="min-width:250px; padding: 15px; padding-bottom: 0;">';

			if(!empty($socialActive))
			{
				$text .= '{SOCIAL_LOGIN: size=2x&label=1}';
			}

			$text .= '<form method="post" onsubmit="hashLoginPassword(this);return true" action="' . e_REQUEST_HTTP . '" accept-charset="UTF-8">';
			$text .= '<div class="form-group">{LM_USERNAME_INPUT}</div>';
			$text .= '<div class="form-group">{LM_PASSWORD_INPUT}</div>';
			$text .= '{LM_IMAGECODE_NUMBER}';
			$text .= '{LM_IMAGECODE_BOX}';
			$text .= '<div class="checkbox">';
			$text .= '<label class="string optional" for="autologin"><input style="margin-right: 10px;" type="checkbox" name="autologin" id="autologin" value="1">' . LAN_LOGINMENU_6 . '</label>';
			$text .= '</div>';
			$text .= '<div class="form-group">';
			$text .= '<input class="btn btn-primary btn-block" type="submit" name="userlogin" id="userlogin" value="' . LAN_LOGINMENU_51 . '">';
			$text .= '<a href="{LM_FPW_LINK=href}" class="btn btn-default btn-sm btn-block">' . LAN_LOGINMENU_4 . '</a>';
			$text .= '<a href="{LM_RESEND_LINK=href}" class="btn btn-default btn-sm btn-block">' . LAN_LOGINMENU_40 . '</a>';
			$text .= '</div>';
			$text .= '</form>';
			$text .= '</div>';
			$text .= '</li>';
			$text .= "</ul>";

			$login_menu_shortcodes = vartrue($login_menu_shortcodes, '');
			return $tp->parseTemplate($text, true, $login_menu_shortcodes);
		}

		$text = '<ul class="nav navbar-nav navbar-right">';
		$text .= '<li class="dropdown">{PM_NAV}</li>';
		$text .= '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">{SETIMAGE: w=20} {USER_AVATAR: shape=circle} ' . USERNAME . ' <b class="caret"></b></a>';
		$text .= '<ul class="dropdown-menu">';
		$text .= '<li>';
		$text .= '<a href="{LM_USERSETTINGS_HREF}"><span class="glyphicon glyphicon-cog"></span> ' . LAN_SETTINGS . '</a>';
		$text .= '</li>';
		$text .= '<li>';
		$text .= '<a class="dropdown-toggle no-block" role="button" href="{LM_PROFILE_HREF}"><span class="glyphicon glyphicon-user"></span> ' . LAN_LOGINMENU_13 . '</a>';
		$text .= '</li>';
		$text .= '<li class="divider"></li>';

		if(ADMIN)
		{
			$text .= '<li><a href="' . e_ADMIN_ABS . '"><span class="fa fa-cogs"></span> ' . LAN_LOGINMENU_11 . '</a></li>';
		}

		$text .= '<li><a href="' . e_HTTP . 'index.php?logout"><span class="glyphicon glyphicon-off"></span> ' . LAN_LOGOUT . '</a></li>';
		$text .= '</ul>';
		$text .= '</li>';
		$text .= '</ul>';

		$login_menu_shortcodes = vartrue($login_menu_shortcodes, '');
		return $tp->parseTemplate($text, true, $login_menu_shortcodes);
	}

}
