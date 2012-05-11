<?php

class ViewController extends GxController {


	public function actionIndex($id) {
		$this->render('/view', array(
			'model' => $this->loadModel($id, 'Page'),
		));
	}
}
