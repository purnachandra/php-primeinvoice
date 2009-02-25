<?php
  // @version $Id$
class Calendar extends Portlet
{
  public $title='Calendar';

  public $st;

	protected function renderContent()
	{
		$this->render('calendar');
	}

}