<h2>Image Gallery</h2>
<?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>
<?php echo CHtml::activeFileField($model, 'image'); ?>
<br>
<?php echo CHtml::submitButton('Upload', array('name'=>'submitPost')); ?>
<?php echo CHtml::endForm(); ?>
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
    <th><?php echo 'Thumnail'; ?></th>
    <th><?php echo 'File Name'; ?></th>
    <th><?php echo 'Create Date'; ?></th>
    <th><?php echo 'Delete'; ?></th>
  </tr>
<?php foreach($filelist as $file): ?>
  <tr class="<?php echo $i++%2?'even':'odd';?>">
    <td><?php echo CHtml::image(Yii::app()->baseUrl.'/'.Yii::app()->params['imageHome'].$file, 'image', array('width'=>100)); ?></td>
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