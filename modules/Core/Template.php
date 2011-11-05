<?php
/**
 * Template
 *
 * An encapsulation of an HTML template file to use for the current
 * View/Controller method.
 *
 * User: Yraen Ironheart
 * Date: 1/11/11
 */
class Template {
	private $content;

	/**
	 * @throws Exception
	 * @param  $appName
	 * @param  $moduleName
	 * @param  $methodName
	 */
	public function __construct(Router $router) {
		$theme = new Theme($router);
		$this->setContent($theme->getThemeContent());

		$this->preprocess($router->getAppName(), $router->getModuleName(), $router->getMethodName());
	}

	/**
	 * @param  $appName
	 * @param  $moduleName
	 * @param  $methodName
	 * @return void
	 */
	private function preprocess($appName, $moduleName, $methodName) {
		$templateFile = $this->getTemplateFilename($appName, $moduleName, $methodName);

		/* Load page-specific template and replace any variables
		 */
		$content = $this->getTemplateContents($templateFile);

		$this->blockReplace(array(
			'CUSTOM_HEAD' => $this->getCustomHead($content),
			'CUSTOM_BODY' => $this->getCustomBody($content),
		));
	}

	/**
	 * Figger out what Template file to use for this Controller action
	 *
	 * @param  $appName
	 * @param  $moduleName
	 * @param  $methodName
	 * @return string
	 */
	private function getTemplateFilename($appName, $moduleName, $methodName) {
		$templateFile = '../app/' . $appName . '/' . $moduleName . '/html/' . $methodName . '.html';

		return $templateFile;
	}

	/**
	 * Determine whether a Template file exists or not
	 *
	 * @param  $templateFile
	 * @return bool
	 */
	private function isTemplateFilenameExists($templateFile) {
		if (file_exists($templateFile)) {
			return true;
		}

		return false;
	}

	/**
	 * Get the contents of a Template file. If the Template file doesn't exist,
	 * just return an empty string
	 *
	 * @param  $templateFile
	 * @return string
	 */
	private function getTemplateContents($templateFile) {
		if ($this->isTemplateFilenameExists($templateFile)) {
			return file_get_contents($templateFile);
		}

		return '';
	}

	/**
	 * Extract custom head tags
	 *
	 * @param  $data
	 * @return void
	 */
	private function getCustomHead($data) {
		$headMatches = array();

		preg_match('#<head>(.*)</head>#s', $data, $headMatches);

		if (count($headMatches)) {
			return $headMatches[1];
		}

		return;
	}

	/**
	 * Extract custom body tags
	 *
	 * @param  $data
	 * @return
	 */
	private function getCustomBody($data) {
		$bodyMatches = array();

		preg_match('#<body>(.*)</body>#s', $data, $bodyMatches);

		if (count($bodyMatches)) {
			return $bodyMatches[1];
		}

		return;
	}

	/**
	 * Replace blocks with something
	 *
	 * @param $replacements
	 */
	public function blockReplace(array $replacements) {
		$keys = array_keys($replacements);

		$temp = $this->getContent();

		foreach($keys as $currentKey) {
	   		$temp = str_replace('{' . $currentKey . '}', $replacements[$currentKey], $temp);
		}

		$this->setContent($temp);
	}

	/**
	 * Use the parameter to set new template contents. This is used both before
	 * and after replacements occur.
	 *
	 * @param  $content
	 * @return void
	 */
	public function setContent($content) {
		$this->content = $content;
	}

	/**
	 * Get content
	 *
	 * @return
	 */
	public function getContent() {
		return $this->content;
	}
}
