<?php
namespace App\Decorators;

use App\Common\BaseAction;
use App\Common\Errno;
use App\Common\Request;
use App\Common\Response;

/**
 * sign decorator is used to verify sign
 *
 * Class SignDecorator
 * @package App\Decorators
 */
class SignDecorator extends BaseDecorator
{
    private $action;

    public function __construct(BaseAction $action)
    {
        $this->action = $action;
    }

    function execute(Request $request, Response $response)
    {
        echo "LoginDecorator start...\n";
        $this->checkSign($request);

        echo "check Sign PASS...\n";
        $this->action->execute($request, $response);
    }

    /**
     * check sign logic here
     * @param Request $request
     */
    private function checkSign(Request $request)
    {
        if($request->getParam('sign') != 'PASS') {
            throw new \LogicException('Check sign failed.', Errno::ERRNO_SIGN);
        }
    }
}
