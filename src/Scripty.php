<?php

namespace Laext\Scripty;

use Encore\Admin\Admin;
use Encore\Admin\Form\Field;

class Scripty extends Field
{
	protected $script = '';

	public function __construct($script, $arguments)
	{
		$this->script = $script;
	}
	
	public function render()
	{
		if ($this->script instanceof \Closure) {
			$this->script = $this->script->call($this->form->model(), $this->form);
		}
		$this->script = preg_replace("/<script>/", '', $this->script);
		$this->script = preg_replace("/<\/script>/", '', $this->script);
		Admin::script($this->script);
	}
}
