<?php
namespace App\Decorators;

use App\Common\BaseAction;

abstract class BaseDecorator extends BaseAction
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
