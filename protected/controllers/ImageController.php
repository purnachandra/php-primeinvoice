<?php
/*
 * Image Gallery
 * $Id$
 */

class ImageController extends CController
{
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

}