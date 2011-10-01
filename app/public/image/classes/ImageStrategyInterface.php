<?php
interface ImageStrategyInterface {
	public function load($sourceFile);
	public function show($imageResource);
	public function save($imageResource, $destination);
}