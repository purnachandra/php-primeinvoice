<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />
<?php echo CHtml::cssFile(Yii::app()->baseUrl.'/css/main.css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/highslide/highslide.css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/highslide/highslide.js"></script>
<script type="text/javascript">
    hs.graphicsDir = '<?php echo Yii::app()->request->baseUrl; ?>/js/highslide/graphics/';
    hs.outlineType = 'rounded-white';
    hs.showCredits = false;
</script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/highslide/highslide_eh.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/persist-min.js"></script>
<title><?php echo $this->pageTitle; ?></title>

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

    <?php $this->widget('Clock'); ?>

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
    <p><center><?php echo Yii::app()->params['copyrightInfo']; ?><br/>
    All Rights Reserved.<br/>
    <?php echo Yii::powered(); echo Yii::getVersion(); ?></p><br><br></center>
  </div><!-- footer -->
</div><!-- container -->

<script type="text/javascript">
<!--
addHighSlideAttribute();
$(document).ready(function(){
var d = 'title_vals'; var g = new Persist.Store('blog-enhanced'); var e = new Array();
var a = new Array(); g.get(d, function (f, b){  if (f && b != null) {
a = b.toString().replace("\n","","g").split(","); } });
var c=0; $(".portlet .header").each(function(){ e[c] = $(this).html().replace("\n","","g");
if (a[c] != 0) { a[c] = 1 }; if (a[c++] == 0) { $(this).next().hide()}});
$(".portlet .header").click(function(){ var f = $(this).html().replace("\n","","g");
for (var b in e) { ti = e[b]; tv = a[b]; if (ti == f) { if (tv == 0) { $(this).next().slideDown();
a[b] = 1} else { $(this).next().slideUp(); a[b] = 0} } else { if (tv != 0) a[b] = 1} }
g.set(d, a.join())})});
//-->
</script>
</body>

</html>