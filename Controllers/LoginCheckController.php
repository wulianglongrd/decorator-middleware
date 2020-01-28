<?php
namespace App\Controllers;

use App\Common\Request;
use App\Common\Response;
use App\Decorators\LoginDecorator;

/**
 * example controller need check login
 *
 * Class LoginCheckController
 * @package App\Controllers
 */
class LoginCheckController extends BaseController
{
    public function getDecorators()
    {
        return [
            LoginDecorator::class => ['login check params'],
        ];
    }

    function execute(Request $request, Response $response)
    {
        echo "LoginCheckController execute...\n";
        $response->buildSuccess(['login' => 'ok']);
    }
}
