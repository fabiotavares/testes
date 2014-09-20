<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 15/09/14
 * Time: 18:28
 */

namespace FT\Formulario\Types;

use FT\Formulario\FieldContainer;
use FT\Formulario\iField;

class FieldSet extends FieldContainer
{
    private $name;
    private $legend;

    public function __construct($name, $legend)
    {
        $this->name = $name;
        $this->legend = $legend;
    }

    public function render()
    {
        echo "<fieldset >\n";
        echo "<legend>".$this->legend."</legend>\n";

        array_walk($this->fields, function(iField $field)
        {
            $field->render();
            echo "\n";
        });

        echo "</fieldset>\n";
    }

    public function setLegend($legend)
    {
        $this->legend = $legend;
    }

    public function getLegend()
    {
        return $this->legend;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

}