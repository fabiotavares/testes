<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 27/08/14
 * Time: 14:00
 */

namespace FT\Formulario\Types;

use FT\Formulario\AbstractField;

class InputMark extends AbstractField
{
    private $checked;

    function __construct($type, $id, $name, $legend, $checked = "")
    {
        $this->checked = $checked;
        parent::__construct($id, $name, $type, $legend);
    }

    public function render()
    {
        echo "<div class='control-group''>\n";
        echo "<div class='controls'>\n";
        echo "<label class='".$this->type."'>\n";
        echo "<input type='".$this->type."' id='".$this->id."' name='".$this->name."' value='".$this->value."' ".$this->checked.">\n";
        echo $this->legend."\n";
        echo "</label>\n";
        echo "</div>\n";
        echo "</div>\n";
    }

    public function setChecked($checked)
    {
        $this->checked = $checked;
    }

    public function getChecked()
    {
        return $this->checked;
    }

} 