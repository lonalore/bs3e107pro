<?php

/**
 * @file
 * Bootstrap 3 based theme for e107 v2.x.
 */

if(!defined('e107_INIT'))
{
	exit;
}

// This theme uses Bootstrap with version 3.x.
define('BOOTSTRAP', 3);
// This theme uses Font-Awesome with version 4.x.
define('FONTAWESOME', 4);
// Viewport.
define('VIEWPORT', "width=device-width, initial-scale=1.0");
define('OTHERNEWS_COLS', false); // no tables, only divs.
define('OTHERNEWS_LIMIT', 3); // Limit to 3. 
define('OTHERNEWS2_COLS', false); // no tables, only divs.
define('OTHERNEWS2_LIMIT', 3); // Limit to 3. 
define('COMMENTLINK', e107::getParser()->toGlyph('fa-comment'));
define('COMMENTOFFSTRING', '');
define('PRE_EXTENDEDSTRING', '<br />');

if(($library = e107::library('load', 'cdn.bootstrap')) && !empty($library['loaded']))
{
	define("BOOTSTRAP_LOADED", true);
}

if(($library = e107::library('load', 'cdn.fontawesome')) && !empty($library['loaded']))
{
	define("FONTAWESOME_LOADED", true);
}

/**
 * @param string $caption
 * @param string $text
 * @param string $id : id of the current render
 * @param array $info : current style and other menu data.
 */
function tablestyle($caption, $text, $id = '', $info = array())
{
	$style = $info['setStyle'];
	$html = '';

	switch($style)
	{
		case 'only-content':
			$html .= $text;
			break;

		case 'default':
		default:
			if(!empty($caption))
			{
				$html .= '<h2 class="caption">' . $caption . '</h2>';
			}
			$html .= $text;
			break;
	}

	echo $html;

	return;
}

$LAYOUT['_header_'] = '
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=831316940344714";
  fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));</script>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{SITEURL}">{SITENAME}</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            {NAVIGATION=main}
            {NAVIGATION_USER}
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
';

$LAYOUT['_footer_'] = '
<footer id="footer">
	<div class="footer-inner text-center">
		<p>{SITEDISCLAIMER}</p>
	</div>
</footer>
';

$LAYOUT['sidebar_right'] = '
{SETSTYLE=default}
<div id="content" class="main-container layout-sidebar-right">
    <div class="container">
	    {ALERTS}
		<div class="row">
   			<section class="col-sm-9">
				{---}
 			</section>
 			
 			<aside class="col-sm-3" role="complementary">
 			    {SETSTYLE=default}
 			    {MENU=1}
			</aside>
        </div>
    </div>
</div>
';

$LAYOUT['sidebar_right_project'] = '
{SETSTYLE=default}
<div id="content" class="main-container layout-sidebar-right">
    <div class="container">
	    {ALERTS}
		<div class="row">
   			<section class="col-sm-9">
				{---}
 			</section>
 			
 			<aside class="col-sm-3" role="complementary">
 			    {SETSTYLE=default}
 			    {MENU=1}
			</aside>
        </div>
    </div>
</div>
';

$LAYOUT['full_home'] = '
{SETSTYLE=default}
<!-- Header. -->
<header id="header">

	{SETSTYLE=only-content}
	{MENU=1}
	{SETSTYLE=default}
	
    <div class="container prologue-container">
        <div class="row">
            <div class="col-xs-12">
                <div class="intro-text">
                    <span class="name">{SITE_NAME}</span>
                    <hr class="star-light">
                    <span class="skills">{SITE_SLOGAN}</span>
                </div>
            </div>
        </div>
    </div>
</header>

{SETSTYLE=only-content}
{MENU=2}
{SETSTYLE=default}

<div id="content" class="main-container layout-full-home">
    <div class="container">
	    {ALERTS}
		<div class="row">
   			<section class="col-xs-12">
				{---}
 			</section>
        </div>
    </div>
</div>
';

$LAYOUT['full_profile'] = '
{SETSTYLE=default}
<div id="content" class="main-container layout-full-profile">
    <div class="container">
	    {ALERTS}
		<div class="row">
   			<section class="col-xs-12">
   			    {SETSTYLE=only-content}
				{---}
				{SETSTYLE=default}
 			</section>
        </div>
    </div>
</div>
';
