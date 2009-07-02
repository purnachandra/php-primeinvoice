<?php
// @version $Id: YiiBase.php
class EyiiVersion {

  const ID = 'EyiiVersion';

  public static function getVersion() {
    
    $value=Yii::app()->cache->get(self::ID);

    if($value===false) {
      $file=Yii::app()->basePath.'/../../../framework/YiiBase.php';
      $fh = fopen($file, 'r');
      $flag = true;
      while(($rec = fgets($fh)) && $flag) {
	if (strpos($rec, '$Id:')) {
	  $tok = split(' ', $rec);
	  $value = $tok[5];
	  $flag = false;
	}
      }
      fclose($fh);
      Yii::app()->cache->set(self::ID, $value, 3600*24,
			     new CFileCacheDependency($file));
    }
    return $value;
  }
}