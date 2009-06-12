<?php
  /*
   * Image model
   * $Id$
   *
   */
class Image extends CFormModel
{
  public $image;
 
  public function rules()
  {
    return array(
		 array('image', 'file', 'types'=>'jpg, gif, png',
		       'maxSize'=>Yii::app()->params['MaxImageSize'],
		       ),
		 );
  }
}
