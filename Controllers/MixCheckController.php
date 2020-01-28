<?php
namespace App\Controllers;

use App\Common\Request;
use App\Common\Response;
use App\Decorators\LoginDecorator;
use App\Decorators\SignDecorator;

/**
 * example controller need check sign and login
 *
 * Class MixCheckController
 * @package App\Controllers
 */
class MixCheckController extends BaseController
{
    public function getDecorators()
    {
        // decorators are executed in the same order as they are defined
        return [
            SignDecorator::class  => ['mix sign check params'],
            LoginDecorator::class => ['mix login check params'],
        ];
    }

    function execute(Request $request, Response $response)
    {
        echo "MixCheckController execute...\n";
        $response->buildSuccess(['mix' => 'ok']);
    }
}
