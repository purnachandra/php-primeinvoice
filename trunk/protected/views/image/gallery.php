<h2>Image Gallery</h2>
<div class="form">
<?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>
<?php echo CHtml::errorSummary($model); ?>
<?php echo CHtml::activeFileField($model, 'image'); ?>
<br>
<?php echo CHtml::submitButton('Upload', array('name'=>'submitPost')); ?>
<?php echo CHtml::endForm(); ?>
</div><!-- form -->
<br>
<?php
$current = Yii::app()->params['imageHomeAbs'];

$filelist = array();
$d = dir($current);
while($tmp = $d->read()) {
  if ($tmp != '.' && $tmp != '..' && $tmp != '.svn') {
    array_push($filelist, $tmp);
  }
 }
asort($filelist, SORT_STRING);

//$criteria=new CDbCriteria;
//$pages=new CPagination(count($filelist));
//$pages->pageSize=Yii::app()->params['imagesPerPage'];
//$pages->applyLimit($criteria);

$i = 0;
?>

<table class="dataGrid">
  <tr>
    <th><?php echo 'Thumbnail'; ?></th>
    <th><?php echo 'File Name'; ?></th>
    <th><?php echo 'Create Date'; ?></th>
    <th><?php echo 'Delete'; ?></th>
  </tr>
<?php foreach($filelist as $file): ?>
<?php
// BB process
if (file_exists($current.$file))
  $size=getimagesize($current.$file);
else
  $size=array(100, 100);

$bb = Yii::app()->params['imageThumbnailBoundingbox'];
if ($size[0] > $bb && $size[1] <= $bb)
  $whtext = 'width';
else if ($size[0] <= $bb && $size[1] > $bb)
  $whtext = 'height';
else if ($size[0] > $bb && $size[1] > $bb)
  if (1.0 <= $size[1]/$size[0])
    $whtext = 'height';
  else
    $whtext = 'width';

$url = Yii::app()->baseUrl.'/'.Yii::app()->params['imageHome'].$file;
?>
  <tr class="<?php echo $i++%2?'even':'odd';?>">
    <td><?php echo CHtml::link(CHtml::image($url, 'image', array($whtext=>$bb)), $url, array('class'=>'highslide')); ?></td>
    <td><?php echo CHtml::encode($file); ?></td>
    <td><?php echo date('F j, Y', filectime($current.$file)); ?></td>
    <td><?php echo CHtml::linkButton('Delete',array(
						    'submit'=>array('image/delete','name'=>$file),
						    'confirm'=>"Are you sure to delete this image?",
						    )); ?></td>
  </tr>
<?php endforeach; ?>
</table>

<br/>
<?php //$this->widget('CLinkPager',array('pages'=>$pages)); ?>
<!-- $Id: $ -->
