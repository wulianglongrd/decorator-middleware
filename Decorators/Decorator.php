<?php
namespace App\Decorators;

use App\Common\Action;

abstract class Decorator implements Action
{
    /**
     * decorator param
     * @var array
     */
    private $decoratorParam = [];

    public function getDecoratorParam()
    {
        return $this->decoratorParam;
    }

    public function setDecoratorParam($decoratorParam)
    {
        $this->decoratorParam = $decoratorParam;
    }
}
