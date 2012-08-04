<?php
/**
 * Author: Yraen Ironheart
 * Date: 14/07/12
 * Time: 11:28 PM
 *
 * This class represents one fragment of user-modifiable data in a Core_Component_Template
 * instance. They can be displayed in different ways depending on the context of the
 * Core_Component_Template instance.
 */
class Core_Content_Component_Data_Instance {
	private $componentDataId = -1;
	private $data = '';
	private $key = '';
	private $sequence = -1;
	private $componentTemplateInstanceId = -1;

	/**
	 * Constructor
	 */
	public function __construct() {
	}

	/* Getters/Setters
	 */

	/**
	 * Set component data id
	 *
	 * @param $componentDataId
	 */
	public function setComponentDataId($componentDataId) {
		$this->componentDataId = $componentDataId;
	}

	/**
	 * Get component data id
	 *
	 * @return int
	 */
	public function getComponentDataId() {
		return $this->componentDataId;
	}

	/**
	 * Set component template instance id
	 *
	 * @param $componentTemplateInstanceId
	 */
	public function setComponentTemplateInstanceId($componentTemplateInstanceId) {
		$this->componentTemplateInstanceId = $componentTemplateInstanceId;
	}

	/**
	 * Get component template instance id
	 *
	 * @return int
	 */
	public function getComponentTemplateInstanceId() {
		return $this->componentTemplateInstanceId;
	}

	/**
	 * Set data
	 *
	 * @param $data
	 */
	public function setData($data) {
		$this->data = $data;
	}

	/**
	 * Get data
	 *
	 * @return string
	 */
	public function getData() {
		return $this->data;
	}

	/**
	 * Set key
	 *
	 * @param $key
	 */
	public function setKey($key) {
		$this->key = $key;
	}

	/**
	 * Get key
	 *
	 * @return string
	 */
	public function getKey() {
		return $this->key;
	}

	/**
	 * Set sequence
	 *
	 * @param $sequence
	 */
	public function setSequence($sequence) {
		$this->sequence = $sequence;
	}

	/**
	 * Get sequence
	 *
	 * @return int
	 */
	public function getSequence() {
		return $this->sequence;
	}
}
