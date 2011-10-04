<?php
class Paragraph_Strategy_Chunkify extends Paragraph_Strategy_Abstract implements Paragraph_Strategy_Interface {

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

