<?php
/**
 * Public_Image_Controller
 *
 * Some test methods for the image module.
 *
 * User: Yraen Ironheart
 * Date: 1/11/11
 */
class Public_Image_Controller extends Controller {

	public function executeNew() {
		$image = new Image_Facade('10_big.jpg', 'Tiny');
		$image->stream();
	}

	public function executeStu() {

		$componentTemplate = new StdClass();
		$componentTemplate->component_template_id = 1;
		$componentTemplate->structure = "&lt;div>{LEFT}&lt;/div>&lt;div>{RIGHT}&lt;/div>&lt;footer>{FOOTER}&lt;/footer>";

		$componentData1 = new StdClass();
		$componentData1->component_data_id = 165;
		$componentData1->data = 'This is some generic content';
		$componentData1->key = 'LEFT';
		$componentData1->sequence = 1;
		$componentData1->component_template_instance_id = 48;

		$componentData2 = new StdClass();
		$componentData2->component_data_id = 33;
		$componentData2->data = 'moar generic content';
		$componentData2->key = 'RIGHT';
		$componentData2->sequence = 2;
		$componentData2->component_template_instance_id = 48;

		$componentData3 = new StdClass();
		$componentData3->component_data_id = 117;
		$componentData3->data = 'bleah footer';
		$componentData3->key = 'FOOTER';
		$componentData3->sequence = 3;
		$componentData3->component_template_instance_id = 48;

		$componentTemplateInstance1 = new StdClass();
		$componentTemplateInstance1->instance_id = 48;
		$componentTemplateInstance1->template = $componentTemplate;
		$componentTemplateInstance1->data = array(
			$componentData1,
			$componentData2,
			$componentData3
		);

		$pageRegion1 = new StdClass();
		$pageRegion1->page_region_id = 55;
		$pageRegion1->key = 'LEFTCOL';
		$pageRegion1->data = array(
			$componentTemplateInstance1,
		);

		$layout1 = new StdClass();
		$layout1->layout_id = 3;
		$layout1->name = "Standard two-column with footer";
		$layout1->data = array(
			$pageRegion1,
		);


		Probe::dump($layout1);

		$data =
			array(
				'Layout' => 'Two column footer',
				'Regions' => array(
					'region_id' => 1,
					'key' => 'LEFTCOL',
					'ComponentTemplates' => array(
						array(
							'ComponentTemplate' => array(
								'component_template_id' => 1,
								'structure' => "&lt;div>{LEFT}&lt;/div>&lt;div>{RIGHT}&lt;/div>&lt;footer>{FOOTER}&lt;/footer>",
							),
							'ComponentCollection' => array(
								array(
									'component_data_id' => 65,
									'data' => "This is some generic content",
									'key' => 'LEFT',
								),
								array(
									'component_data_id' => 66,
									'data' => "moar generic content",
									'key' => 'RIGHT',
								),
								array(
									'component_data_id' => 117,
									'data' => "Generic footer",
									'key' => 'FOOTER'
								),
							),
						),
						array(
							'ComponentData' => array(
								'component_data_id' => 67,
								'data' => "hayley is hot"
							),
						),
					),
				),
			);

		Probe::dump($data);
	}

	/**
	 * Create a gallery of images.
	 * This is a test.
	 *
	 * @return void
	 */
	public function executeImageGallery() {
		$path = '../uploads';
		$dirhandle = opendir($path);

		readdir($dirhandle);
		readdir($dirhandle);

		$imageArray = array();

		/* Get a list of image filenames
		 */
		while ($thisFile = readdir($dirhandle)) {
			if ($thisFile != '.DS_Store') {
				$imageArray[] = $thisFile;
			}
		}

		$this->setData($imageArray);
	}
}
