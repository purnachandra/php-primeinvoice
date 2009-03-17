<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />

<title><?php echo $this->pageTitle; ?></title>

<?php
// javascript
  $cs=Yii::app()->clientScript;
//  $cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery-1.3.2.min.js', CClientScript::POS_HEAD);
  $cs->registerCoreScript('jquery');
  $cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/highslide/highslide.js', CClientScript::POS_HEAD);
  $cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/highslide/highslide_eh.js', CClientScript::POS_HEAD);
  $cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/persist.js', CClientScript::POS_HEAD);
  $params = array(
		'BASEURL'=>Yii::app()->request->baseUrl,
                'HTTPHOST'=>$_SERVER['HTTP_HOST']
		  );
  $script = '    var PARAMS = eval('.CJavaScript::jsonEncode($params).');'."\n";
  $script .= implode('',file(Yii::app()->basePath.'/../js/widget-oc.js'));
  $cs->registerScript('widget-oc', $script, CClientScript::POS_READY);
  $script = 'hs.graphicsDir = \''.Yii::app()->request->baseUrl.'/js/highslide/graphics/\';'."\n";
  $script .= 'hs.outlineType = \'rounded-white\';'."\n";
  $script .= 'hs.showCredits = false;';
  $cs->registerScript('hislide-end', $script, CClientScript::POS_BEGIN);
  $script = 'addHighSlideAttribute();';
  $cs->registerScript('hislide-end', $script, CClientScript::POS_END);
// css
  $cs->registerCSSFile(Yii::app()->request->baseUrl.'/js/highslide/highslide.css', CClientScript::POS_HEAD);
  $cs->registerCSSFile(Yii::app()->request->baseUrl.'/css/main.css', CClientScript::POS_HEAD);
?>
</head>

<body class="page">
<div id="container">
  <div id="header">
    <h1><?php echo CHtml::link(CHtml::encode(Yii::app()->params['title']),Yii::app()->homeUrl); ?></h1>
  </div><!-- header -->

  <div id="sidebar">
    <?php $this->widget('UserLogin',array('visible'=>Yii::app()->user->isGuest)); ?>

    <?php $this->widget('UserMenu',array('visible'=>!Yii::app()->user->isGuest)); ?>

    <?php $this->widget('Calendar'); ?>

    <?php $this->widget('RecentPosts'); ?>

    <?php $this->widget('RecentComments'); ?>

    <?php $this->widget('TagCloud'); ?>

    <?php $this->widget('Links'); ?>

  </div><!-- sidebar -->

  <div id="content">
    <?php echo $content; ?>
  </div><!-- content -->

  <br class="clearfloat" />

  <div id="footer">
    <p><?php echo Yii::app()->params['copyrightInfo']; ?><br/>
    All Rights Reserved.<br/>
    <?php echo Yii::powered(); echo Yii::getVersion(); ?></p><br>
  </div><!-- footer -->
</div><!-- container -->

</body>

</html>