<?php

namespace App\View\Components\Admin\Inputs;

use Illuminate\View\Component;

class Text extends Component
{
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public $className, $name, $label, $placeholder, $validMessage, $inValidMessage, $value, $required, $disabled, $type, $parameters;

	public function __construct($className = 'form-control', $name = '', $label = '', $placeholder = '', $validMessage = '', $inValidMessage = '', $value = null, $required = false, $disabled = false, $type = 'text', $parameters = [])
	{
		$this->className      = $className;
		$this->name           = $name;
		$this->label          = $label;
		$this->placeholder    = $placeholder;
		$this->validMessage   = $validMessage;
		$this->inValidMessage = $inValidMessage;
		$this->value          = $value;
		$this->required       = $required;
		$this->disabled       = $disabled;
		$this->type           = $type;
		$this->parameters     = $parameters;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render()
	{
		return view('components.admin.inputs.text');
	}
}
