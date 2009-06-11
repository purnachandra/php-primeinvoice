<h2>Image Gallery</h2>
<?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>
<?php echo CHtml::activeFileField($model, 'image'); ?>
<br>
<?php echo CHtml::submitButton('Upload', array('name'=>'submitPost')); ?>
<?php echo CHtml::endForm(); ?>
<br>
<hr>
<br>
<?php
$current = dirname(__FILE__).'/../../../images/';

$filelist = array();
$d = dir($current);
while($tmp = $d->read()) {
  if ($tmp != '.' && $tmp != '..' && $tmp != '.svn') {
    array_push($filelist, $tmp);
  }
 }
asort($filelist, SORT_STRING);

$i = 0;
foreach($filelist as $file) {
  echo "<span>";
  echo "<img src=\"".Yii::app()->baseUrl.'/'.Yii::app()->params['imageHome'].$file."\" width=\"100\">";
  echo "$file";
  echo "</span>";
  if (++$i % 2 == 0) echo "<br>\n";
}

?>
