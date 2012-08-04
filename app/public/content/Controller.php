<?php
/**
 * Author: Yraen Ironheart
 * Date: 14/07/12
 * Time: 11:32 PM
 *
 *
 */
class Public_Content_Controller extends Controller {

	/**
	 * Test method for content
	 *
	 * @return Core_Content_Region
	 */
	public function executeTestEditable() {
		$region = new Core_Content_Region_Instance_Editable(new Core_Content_Component_Template_TestEditable());

		return $region;
	}

	/**
	 * Test method for content
	 *
	 * @return Core_Content_Component_Template_Collection
	 */
	public function executeTestPresentable() {
		$region = new Core_Content_Region_Instance_Presentable(new Core_Content_Component_Template_TestPresentable());

		return $region;




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
}
