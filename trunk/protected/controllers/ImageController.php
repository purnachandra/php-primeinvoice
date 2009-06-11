<?php
/*
 * Image Gallery
 * $Id$
 */

class ImageController extends CController {

  public $defaultAction='upload';

  public function actionUpload()
  {
    $model=new Image;

    if(isset($_FILES['Image'])) {
      $model->image=CUploadedFile::getInstance($model,'image');
      $model->image->saveAs(Yii::app()->params['imageHomeAbs'].$model->image->name);
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