<?php
namespace App\Common;

class Request
{
    public function getParams()
    {
        return $_REQUEST;
    }

    public function getParam($name)
    {
        return $_REQUEST[$name] ?? null;
    }
}
