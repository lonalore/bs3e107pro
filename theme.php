<?php

/**
 * @file
 * Bootstrap 3 based theme for e107 v2.x.
 */

if(!defined('e107_INIT'))
{
	exit;
}

if(($library = e107::library('load', 'cdn.bootstrap')) && !empty($library['loaded']))
{
	define("BOOTSTRAP", 3);
}

if(($library = e107::library('load', 'cdn.fontawesome')) && !empty($library['loaded']))
{
	define("FONTAWESOME", 4);
}

define('VIEWPORT', "width=device-width, initial-scale=1.0");

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

$LAYOUT['home'] = '
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

<div id="content" class="main-container">
    <div class="container">
	    {ALERTS}
		<div class="row">
   			<div class="col-xs-12">
				{---}
 			</div>
        </div>
    </div>
</div>
';

$LAYOUT['project'] = '
{SETSTYLE=default}
<div id="content" class="main-container">
    <div class="container">
	    {ALERTS}
		<div class="row">
   			<div class="col-xs-12">
				{---}
 			</div>
        </div>
    </div>
</div>
';
