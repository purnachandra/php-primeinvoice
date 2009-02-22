<?php
  // @version $Id$
class Calendar extends Portlet
{
  public $title='Calendar';

  public $st;

	public function init()
	{
	  parent::init();
	}

	protected function renderContent()
	{
		$this->render('calendar');
	}

}