<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 27/08/14
 * Time: 14:20
 */

namespace FT\Formulario\Types;

use FT\Formulario\AbstractField;

class TextArea extends AbstractField
{
    private $cols;
    private $rows;
    private $placeholder = "";
    private $required = "";

    function __construct($id, $name, $legend, $rows, $cols)
    {
        $this->rows = $rows;
        $this->cols = $cols;
        parent::__construct($id, $name, null, $legend);
    }

    public function render()
    {
        echo "<div class='control-group''>\n";
        echo "<label class='control-label' for='".$this->id."'>".$this->legend."</label>\n";
        echo "<div class='controls'>\n";
        echo "<textarea name='".$this->name."' id='".$this->id."' cols='".$this->cols."' rows='".$this->rows."' placeholder='".$this->placeholder."' ".$this->required.">".$this->value."</textarea>\n";
        echo $this->showError();
        echo "</div>\n";
        echo "</div>\n";
    }

    public function setCols($cols)
    {
        $this->cols = $cols;
    }

    public function getCols()
    {
        return $this->cols;
    }

    public function setRows($rows)
    {
        $this->rows = $rows;
    }

    public function getRows()
    {
        return $this->rows;
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