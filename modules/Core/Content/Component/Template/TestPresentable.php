<?php
/**
 * Author: Yraen Ironheart
 * Date: 15/07/12
 * Time: 12:39 AM
 *
 * Some generic test methods
 */
class Core_Content_Component_Template_TestPresentable {

	/**
	 * Test method
	 *
	 * @return \Core_Content_Component_Template_Instance_Abstract
	 */
	public function generateHeading() {
		$componentData1 = new Core_Content_Component_Data_Instance();
		$componentData1->setComponentDataId(172);
		$componentData1->setComponentTemplateInstanceId(3);
		$componentData1->setData('FEDERATION 141');
		$componentData1->setKey('HEADING');

		$componentTemplateInstance = new Core_Content_Component_Template_Instance_Presentable();
		$componentTemplateInstance->setComponentTemplateInstanceId(4);
		$componentTemplateInstance->setStructure("
			<h1>{HEADING}</h1>
		");
		$componentTemplateInstance->addComponent($componentData1);

		return $componentTemplateInstance;
	}

	/**
	 * Test method
	 *
	 * @return Core_Content_Component_Template_Instance_Abstract
	 */
	public function generateBody() {
		$componentData1 = new Core_Content_Component_Data_Instance();
		$componentData1->setComponentDataId(45);
		$componentData1->setComponentTemplateInstanceId(4);
		$componentData1->setData('This is some kind of generic content');
		$componentData1->setKey('LEFT');

		$componentData2 = new Core_Content_Component_Data_Instance();
		$componentData2->setComponentDataId(46);
		$componentData2->setComponentTemplateInstanceId(4);
		$componentData2->setData('Some more content');
		$componentData2->setKey('RIGHT');

		$componentData3 = new Core_Content_Component_Data_Instance();
		$componentData3->setComponentDataId(47);
		$componentData3->setComponentTemplateInstanceId(4);
		$componentData3->setData('Bottom content');
		$componentData3->setKey('BOTTOM');

		$componentTemplateInstance = new Core_Content_Component_Template_Instance_Presentable();
		$componentTemplateInstance->setComponentTemplateInstanceId(4);
		$componentTemplateInstance->setStructure("
			<div style='outline:2px dotted #f0f;'>
				<div style='outline:1px solid #0f0;width:100px;height:100px;float:left;'>{LEFT}</div>
				<div style='outline:1px solid #f00;width:200px;height:100px;float:left;'>{RIGHT}</div>
				<div style='outline:1px solid #0ff;clear:both;'>{BOTTOM}</div>
			</div>
		");
		$componentTemplateInstance->addComponent($componentData1);
		$componentTemplateInstance->addComponent($componentData2);
		$componentTemplateInstance->addComponent($componentData3);

		return $componentTemplateInstance;
	}

	/**
	 * Test method
	 *
	 * @return Core_Content_Component_Template_Instance_Abstract
	 */
	public function generateImage() {
		$componentData1 = new Core_Content_Component_Data_Instance();
		$componentData1->setComponentDataId(487);
		$componentData1->setComponentTemplateInstanceId(3);
		$componentData1->setData('/image/new');
		$componentData1->setKey('URL');

		$componentData2 = new Core_Content_Component_Data_Instance();
		$componentData2->setComponentDataId(488);
		$componentData2->setComponentTemplateInstanceId(3);
		$componentData2->setData('Portrait');
		$componentData2->setKey('ALT');

		$componentData3 = new Core_Content_Component_Data_Instance();
		$componentData3->setComponentDataId(489);
		$componentData3->setComponentTemplateInstanceId(3);
		$componentData3->setData('A wonderful portrait');
		$componentData3->setKey('CAPTION');

		$componentTemplateInstance = new Core_Content_Component_Template_Instance_Presentable();
		$componentTemplateInstance->setComponentTemplateInstanceId(4);
		$componentTemplateInstance->setStructure("
			<div>
				<img src='{URL}' alt='{ALT}' title='{ALT}'/>
				<caption>{CAPTION}</caption>
			</div>
		");
		$componentTemplateInstance->addComponent($componentData1);
		$componentTemplateInstance->addComponent($componentData2);
		$componentTemplateInstance->addComponent($componentData3);

		return $componentTemplateInstance;
	}
}
