<center>
<ul class="Calendar">
<?php
// Set locale
// uncomment following two lines if you are a Japanese...
// $locale='ja_JP.utf8';
// $setlocale = setlocale(LC_ALL,  $locale);

// load the algorithm of the calendar
// uncomment following line if you are a Japanese...
// include_once('generate_calendar_Japan.php');
include_once('generate_calendar.php');

// Prepare the css style within the calendar widget
$url=CHtml::asset(Yii::getPathOfAlias('application.components.css.calendar').'.css');
Yii::app()->getClientScript()->registerCssFile($url);

// Previous month and next month
if (!empty($_GET['time'])) {
  $month = date('n', $_GET['time']);
  $year = date('Y', $_GET['time']);
  if (!empty($_GET['pn']) && $_GET['pn'] == 'n') $month++;
  if (!empty($_GET['pn']) && $_GET['pn'] == 'p') $month--;
 } else {
  $month = date('n');
  $year = date('Y');
 }
$firstDay = mktime(0,0,0,$month,1,$year);
$firstDayNextMonth = mktime(0,0,0,$month+1,1,$year);

$pn = array('&lt;'=>CHtml::normalizeUrl(array('month/'.$firstDay.'/p')),
	    '&gt;'=>CHtml::normalizeUrl(array('month/'.$firstDay.'/n')));

// Today
$days = array();
if ($firstDay <= time() && time() < $firstDayNextMonth) {
  $today = date('j', time());
  $days[$today] = array(NULL,NULL,'<span id="today">'.$today.'</span>');
}

// Make the links
$post = new Post;
foreach($post->findArtclePostedThisMonth() as $article):
  $days[date('j', $article->createTime)]  = array(CHtml::normalizeUrl(array('date/'.$article->createTime)), 'linked-day');
endforeach;

// Execution
if (isset($locale) && $locale == 'ja_JP.utf8') $len = 3;
else $len = 2;
echo generate_calendar($year, $month, $days, $len, CHtml::normalizeUrl(array('month/'.$firstDay.'/c')), 0, $pn);
?>
</ul>
</center>
