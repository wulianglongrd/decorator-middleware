<?php
namespace App\Controllers;

use App\Common\BaseAction;

abstract class BaseController extends BaseAction
{
    public function getDecorators()
    {
        return [];
    }
}
