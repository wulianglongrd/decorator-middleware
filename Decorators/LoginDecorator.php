<?php
namespace App\Decorators;

use App\Common\BaseAction;
use App\Common\Errno;
use App\Common\Request;
use App\Common\Response;

/**
 * login decorator is used to verify login info
 *
 * Class LoginDecorator
 * @package App\Decorators
 */
class LoginDecorator extends BaseDecorator
{
    private $action;

    public function __construct(BaseAction $action)
    {
        $this->action = $action;
    }

    function execute(Request $request, Response $response)
    {
        echo "LoginDecorator start...\n";
        $this->checkLogin($request, $response);

        echo "check Login PASS...\n";
        $this->action->execute($request, $response);
    }

    /**
     * check login info here
     *
     * @param Request $request
     * @param Response $response
     */
    private function checkLogin(Request $request, Response $response)
    {
        if($request->getParam('user') != 'admin') {
            throw new \LogicException('Check login failed.', Errno::ERRNO_LOGIN);
        }
    }
}
