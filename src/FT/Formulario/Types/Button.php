<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 27/08/14
 * Time: 14:18
 */

namespace FT\Formulario\Types;

use FT\Formulario\AbstractField;

class Button extends AbstractField
{
    private $class;

    function __construct($type, $id, $name, $legend, $class)
    {
        if($type != "submit" and $type != "reset") {
            throw new \InvalidArgumentException("Os únicos tipos aceitos para Button são submit e reset");
        }

        $this->class = $class;
        parent::__construct($id, $name, $type, $legend);
    }

    public function render()
    {
        echo "<div class='control-group''>\n";
        echo "<div class='controls'>\n";
        echo "<button type='".$this->type."' id='".$this->id."' name='".$this->name."' class='".$this->class."'>".$this->legend."</button>\n";
        echo "</div>\n";
        echo "</div>\n";
    }

    public function setClass($class)
    {
        $this->class = $class;
    }

    public function getClass()
    {
        return $this->class;
    }

} 