<?php
namespace App\Common;

abstract class BaseAction
{
    abstract function execute(Request $request, Response $response);
}
