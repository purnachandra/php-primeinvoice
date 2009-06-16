<?php
/*
 * Image Gallery
 * $Id: $
 */

class ImageController extends CController {

  public $defaultAction='upload';

  public function actionUpload()
  {
    $model=new Image;

    if(isset($_FILES['Image'])) {
      $model->image=CUploadedFile::getInstance($model,'image');
      $name = $model->image->name;
      if ($name != '') {
	if (file_exists(Yii::app()->params['imageHomeAbs'].$name)) {
	  // already there
	  $v = 2;
	  preg_match('/(\w+)\.(\w+)/', $name, $match);
	  do {
	    $name = $match[1].'('.$v++.').'.$match[2];
	  } while (file_exists(Yii::app()->params['imageHomeAbs'].$name));
	}
	if ($model->validate())
	  $model->image->saveAs(Yii::app()->params['imageHomeAbs'].$name);
      } else {
	// blank validation
	$model->validate();
      }
    }
    $this->render('gallery', array('model'=>$model));
  }

  public function actionDelete() {
    if (Yii::app()->request->isPostRequest) {
      // we only allow deletion via POST request
      $name = Yii::app()->params['imageHomeAbs'].$_GET['name'];
      unlink($name);
      $this->redirect(array('upload'));
    } else {
      throw new CHttpException(500,'Invalid request. Please do not repeat this request again.');
    }
  }

}