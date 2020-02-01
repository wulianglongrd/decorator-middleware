<?php
namespace App\Controllers;

use App\Common\Action;

abstract class Controller implements Action
{
    public function getDecorators()
    {
        return [];
    }
}
