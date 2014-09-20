<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 27/08/14
 * Time: 15:20
 */

namespace FT\Formulario\Types;

use FT\Formulario\iField;

class Option implements iField
{
    private $value;
    private $legend;
    private $selected;

    function __construct($value, $legend, $selected = "")
    {
        $this->value = $value;
        $this->legend = $legend;
        $this->selected = $selected;
    }

    public function render()
    {
        echo "<option value='".$this->value."' ".$this->selected.">".$this->legend."</option>";
    }

    public function setLegend($legend)
    {
        $this->legend = $legend;
    }

    public function getLegend()
    {
        return $this->legend;
    }

    public function setSelected($selected)
    {
        $this->selected = $selected;
    }

    public function getSelected()
    {
        return $this->selected;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

} 