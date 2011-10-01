<?php
class ChunkifyStrategy extends Strategy implements StrategyInterface {

    /**
     * Javascript chunks the input 
     */
    public function execute() {
		$data = $this->getInput();

		$data = chunk_split($data, 2, "'+'");
		$data = "'" . substr($data, 0, strlen($data)-2);
		$data = "document.write(\"<a href='ma\" + \"ilto:\"+" . $data . "+\"'>\"+" . $data . "+\"</a>\");";
		$data = "<script type='text/javascript'>\n$data\n</script>";

		$this->setOutput($data);
    }
}

