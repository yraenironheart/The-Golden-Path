<?php
/**
 * Author: Yraen Ironheart
 * Date: 5/08/12
 * Time: 7:17 PM
 *
 *
 */
class Colonel_Strategy_Abstract {
	protected $output = '';
	protected $isValid = false;
	protected $message = '';

	/**
	 * Find out if this calculation was valid
	 *
	 * @return bool
	 */
	public function isValid() {
		if ($this->getIsValid() === true) {
			return true;
		}

		return false;
	}

	/* Getters/Setters
	 */

	/**
	 * Set isValid
	 *
	 * @param $isValid
	 */
	protected function setIsValid($isValid) {
		$this->isValid = $isValid;
	}

	/**
	 * Get isValid
	 *
	 * @return bool
	 */
	protected function getIsValid() {
		return $this->isValid;
	}

	/**
	 * Set message
	 *
	 * @param $message
	 */
	protected function setMessage($message) {
		$this->message = $message;
	}

	/**
	 * Get message
	 *
	 * @return string
	 */
	public function getMessage() {
		return $this->message;
	}

	/**
	 * Set output
	 *
	 * @param $output
	 */
	protected function setOutput($output) {
		$this->output = $output;
	}

	/**
	 * Get output
	 *
	 * @return string
	 */
	protected function getOutput() {
		return $this->output;
	}

}
