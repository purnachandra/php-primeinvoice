<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/persist-min.js"></script>
<script type="text/javascript">
<!--
//
// Widget opening/closing functionality
//
$(document).ready(function(){var i='<?php echo str_replace('/', '_', $_SERVER['HTTP_HOST']."__".Yii::app()->request->baseUrl); ?>';var f=i+'__widget_title_vals';var g=new Persist.Store('blog-enhanced');var d=new Array();var a=new Array();g.get(f,function(e,b){if(e&&b!=null){a=b.toString().replace("\n","","g").split(",")}});var c=0;$(".portlet .header").each(function(){d[c]=$(this).html().replace("\n","","g");if(a[c]!=0){a[c]=1}if(a[c++]==0){$(this).next().hide()}});$(".portlet .header").click(function(){var e=$(this).html().replace("\n","","g");for(var b in d){var j=d[b];var h=a[b];if(j==e){if(h==0){$(this).next().slideDown();a[b]=1}else{$(this).next().slideUp();a[b]=0}}else{if(h!=0){a[b]=1}}}g.set(f,a.join())})});
// -->
</script>
