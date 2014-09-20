<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 18/09/14
 * Time: 17:55
 */

namespace FT\Formulario;


abstract class AbstractField implements iField
{
    protected $id;
    protected $name;
    protected $value;
    protected $type;
    protected $legend;
    protected $msgError;

    public function __construct($id, $name, $type, $legend)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->legend = $legend;
    }

    abstract function render();

    public function showError()
    {
        if(isset($this->msgError)) {
            return "<span class='label label-important'>{$this->msgError}</span>\n";
        }

        return "";
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setLegend($legend)
    {
        $this->legend = $legend;
    }

    public function getLegend()
    {
        return $this->legend;
    }

    public function setMsgError($msgError)
    {
        $this->msgError = $msgError;
    }

    public function getMsgError()
    {
        return $this->msgError;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
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