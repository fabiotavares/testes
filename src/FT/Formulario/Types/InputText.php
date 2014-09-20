<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 26/08/14
 * Time: 19:37
 */

namespace FT\Formulario\Types;

use FT\Formulario\AbstractField;

class InputText extends AbstractField
{
    private $placeholder;
    private $required;

    function __construct($type, $id, $name, $legend)
    {
        parent::__construct($id, $name, $type, $legend);
    }

    public function render()
    {
        echo "<div class='control-group''>\n";
        echo "<label class='control-label' for='".$this->id."'>".$this->legend."</label>\n";
        echo "<div class='controls'>\n";
        echo "<input type='".$this->type."' id='".$this->id."' name='".$this->name."' value='".$this->value."' placeholder='".$this->placeholder."' ".$this->required."'>\n";
        echo $this->showError();
        echo "</div>\n";
        echo "</div>\n";

    }

    public function setPlaceholder($placeholder)
    {
        $this->placeholder = $placeholder;
    }

    public function getPlaceholder()
    {
        return $this->placeholder;
    }

    public function setRequired($required)
    {
        $this->required = $required;
    }

    public function getRequired()
    {
        return $this->required;
    }

} 