<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 27/08/14
 * Time: 15:05
 */

namespace FT\Formulario\Types;

use FT\Formulario\iField;
use FT\Formulario\FieldContainer;

class Select extends FieldContainer
{
    private $name;
    private $id;
    private $value;
    private $legend;
    private $multiple = "";
    private $size = 1;
    protected $msgError;

    function __construct($id, $name, $legend)
    {
        $this->id = $id;
        $this->name = $name;
        $this->legend = $legend;
    }

    public function render()
    {
        echo "<div class='control-group''>\n";
        echo "<label class='control-label' for='".$this->id."'>".$this->legend."</label>\n";
        echo "<div class='controls'>\n";
        echo "<select id='".$this->id."' name='".$this->name."' value='".$this->value."' size='".$this->size."' ".$this->multiple.">\n";
        //echo "<option value=''></option>";
        echo "<option value='' disabled selected style='display:none; color: #8fff9c'></option>";

        array_walk($this->fields, function(iField $field)
        {
            if($this->value == $field->getValue()) {
                $field->setSelected("selected");
            } else {
                $field->setSelected("");
            }
            $field->render();
            echo "\n";
        });

        echo "</select>\n";
        echo $this->showError();
        echo "</div>\n";
        echo "</div>\n";
    }

    public function showError()
    {
        if(isset($this->msgError)) {
            return "<span class='label label-important'>{$this->msgError}</span>\n";
        }

        return "";
    }

    public function setMsgError($msgError)
    {
        $this->msgError = $msgError;
    }

    public function getMsgError()
    {
        return $this->msgError;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setLegend($legend)
    {
        $this->legend = $legend;
    }

    public function getLegend()
    {
        return $this->legend;
    }

    public function setMultiple($multiple)
    {
        $this->multiple = $multiple;
    }

    public function getMultiple()
    {
        return $this->multiple;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function getSize()
    {
        return $this->size;
    }

} 