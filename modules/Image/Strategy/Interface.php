<?php
interface Image_Strategy_Interface {
	public function load($sourceFile);
	public function show($imageResource);
	public function save($imageResource, $destination);
}