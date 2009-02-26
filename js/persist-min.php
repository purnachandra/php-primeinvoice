<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/persist-min.js"></script>
<script type="text/javascript">
<!--
//
// Widget opening/closing functionality
//
$(document).ready(function(){var i='<?php echo $_SERVER['HTTP_HOST'].":".Yii::app()->request->baseUrl; ?>';var c=i+':title_vals';var g=new Persist.Store('blog-enhanced');var e=new Array();var a=new Array();g.get(c,function(f,b){if(f&&b!=null){a=b.toString().replace("\n","","g").split(",");}});var d=0;$(".portlet .header").each(function(){e[d]=$(this).html().replace("\n","","g");if(a[d]!=0){a[d]=1}if(a[d++]==0){$(this).next().hide()}});$(".portlet .header").click(function(){var f=$(this).html().replace("\n","","g");for(var b in e){var j=e[b];var h=a[b];if(j==f){if(h==0){$(this).next().slideDown();a[b]=1}else{$(this).next().slideUp();a[b]=0}}else{if(h!=0){a[b]=1}}}g.set(c,a.join());})});
// -->
</script>
