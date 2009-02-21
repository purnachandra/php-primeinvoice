<?php

class Clock extends Portlet
{
  public $title='Clock';

  protected function renderContent()
  {
    $this->render('clock');
  }
}
