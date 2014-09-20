<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 15/09/14
 * Time: 18:23
 */

namespace FT\Formulario;


abstract class FieldContainer implements iField
{
    protected $fields = [];

    function add (iField $field)
    {
        $this->fields[] = $field;
    }

    public function resetFields()
    {
        $this->fields = null;
    }

    public function setFields($fields)
    {
        $this->fields = $fields;
    }

    public function getFields()
    {
        return $this->fields;
    }

} 