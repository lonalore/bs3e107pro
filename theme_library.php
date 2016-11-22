<?php

/**
 * @file
 * Provides information about external libraries.
 */


/**
 * Class bs3e107pro_library.
 */
class bs3e107pro_library
{

	/**
	 * Return information about external libraries.
	 */
	function config()
	{
		// Bootstrap (CDN) v3.3.6.
		$libraries['cdn.bootstrap'] = array(
			'name'              => 'Bootstrap (CDN)',
			'vendor_url'        => 'http://getbootstrap.com/',
			'download_url'      => 'https://github.com/twbs/bootstrap/releases/download/v3.3.6/bootstrap-3.3.6-dist.zip',
			'version_arguments' => array(
				'file'    => 'js/bootstrap.min.js',
				// Bootstrap v3.3.6
				'pattern' => '/Bootstrap\s+v(3\.\d\.\d+)/',
				'lines'   => 5,
			),
			// Override library path to CDN.
			'library_path'      => 'https://cdn.jsdelivr.net/bootstrap/3.3.6/',
			'files'             => array(
				'js'  => array(
					'js/bootstrap.min.js' => array(
						'zone' => 2,
						'type' => 'url',
					),
				),
				'css' => array(
					'css/bootstrap.min.css' => array(
						'zone' => 2,
					),
				),
			),
		);

		// Font-Awesome (CDN) v4.6.3.
		$libraries['cdn.fontawesome'] = array(
			'name'              => 'Font-Awesome (CDN)',
			'vendor_url'        => 'http://fontawesome.io/',
			'download_url'      => 'http://fontawesome.io/',
			'version_arguments' => array(
				'file'    => 'css/font-awesome.min.css',
				// Font Awesome 4.6.3 by
				'pattern' => '/(\d\.\d\.\d+)/',
				'lines'   => 10,
			),
			// Override library path to CDN.
			'library_path'      => 'https://cdn.jsdelivr.net/fontawesome/4.7.0/',
			'files'             => array(
				'css' => array(
					'css/font-awesome.min.css' => array(
						'zone' => 2,
					),
				),
			),
		);

		return $libraries;
	}

}
