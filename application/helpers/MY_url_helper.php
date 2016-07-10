<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('css_url'))
{
	/**
	 * Site URL
	 *
	 * Create a local URL based on your basepath. Segments can be passed via the
	 * first parameter either as a string or an array.
	 *
	 * @param	string	$uri
	 * @param	string	$protocol
	 * @return	string
	 */
	function css_url($uri = '')
	{
		return site_url('assets/css/'.$uri);
	}
}

if ( ! function_exists('js_url'))
{
	/**
	 * Site URL
	 *
	 * Create a local URL based on your basepath. Segments can be passed via the
	 * first parameter either as a string or an array.
	 *
	 * @param	string	$uri
	 * @param	string	$protocol
	 * @return	string
	 */
	function js_url($uri = '')
	{
		return site_url('assets/js/'.$uri);
	}
}

if ( ! function_exists('img_url'))
{
	/**
	 * Site URL
	 *
	 * Create a local URL based on your basepath. Segments can be passed via the
	 * first parameter either as a string or an array.
	 *
	 * @param	string	$uri
	 * @param	string	$protocol
	 * @return	string
	 */
	function img_url($uri = '')
	{
		return site_url('assets/img/'.$uri);
	}
}
