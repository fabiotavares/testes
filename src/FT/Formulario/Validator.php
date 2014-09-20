<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 11/09/14
 * Time: 14:58
 */

namespace FT\Formulario;

abstract class Validator
{
    protected $request;

    function __construct(Request $request)
    {
        $this->request = $request;
    }

    abstract public function validate($fields);

    public function getRequest()
    {
        return $this->request;
    }

    public function setRequest($request)
    {
        $this->request = $request;
    }

} 