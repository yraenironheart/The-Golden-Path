<?php
/**
 * Theme
 *
 * Controls which group of CSS, JS and HTML files to use, allowing you to (if
 * needed) dynamically switch between Themes.
 *
 * User: Yraen Ironheart
 * Date: 5/10/11
 */
class Theme {

	/* The current theme to use. Files that comprise this theme are stored here.
	 * setThemeDir() can be used to dynamically determine this.
	 */
	private $themeDir = 'core';

	/**
	 * Have a router so you can do subdomain-based themes
	 *
	 * @param Router $router
	 */
	public function __construct(Router $router) {
		$this->setThemeDir($router->getSubdomainName());
		$this->setThemeFile();
	}

	/**
	 * Load the theme file
	 *
	 * @throws Exception
	 * @return string
	 */
	public function getThemeContent() {
		if (file_exists($this->getThemeFile())) {
			return file_get_contents($this->getThemeFile());
		}
		else {
			throw new Exception("Could not load sitewide template.");
		}
	}

	/**
	 * TODO: Check subdomain to perform dynamic switching
	 *
	 * @param  $themeDir
	 * @return void
	 */
	private function setThemeDir($themeDir) {
		$this->themeDir = $themeDir;
	}

	/**
	 * Get theme dir
	 *
	 * @return string
	 */
	public function getThemeDir() {
		return $this->themeDir;
	}

	/**
	 * Set theme file
	 *
	 * @return void
	 */
	private function setThemeFile() {
		$this->themeFile = dirname(__FILE__) . '/../../webroot/theme/' . $this->getThemeDir() . '/html/sitewide.html';
	}

	/**
	 * Get theme file
	 *
	 * @return string
	 */
	private function getThemeFile() {
		return $this->themeFile;
	}
}
