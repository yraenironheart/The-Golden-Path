<?php
/**
 * Image_Strategy_Interface
 *
 * All rendering strategies must implement these methods.
 *
 * User: Yraen Ironheart
 * Date: 1/11/11
 */
interface Image_Strategy_Interface {
	public function load($sourceFile);
	public function show($imageResource);
	public function save($imageResource, $destination);
}