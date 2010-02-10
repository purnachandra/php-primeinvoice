<?php
  // @version $Id$
class Clock extends Portlet
{
  public $title='Clock';

  protected function renderContent()
  {
    //    $this->render('digital-clock');
     $this->render('analog-clock');
  }
}
