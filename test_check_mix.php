<?php
namespace App;

use App\Actions\LoginCheckAction;
use App\Common\Request;
use App\Common\Response;
use App\Controllers\Controller;
use App\Controllers\MixCheckController;
use App\Decorators\Decorator;
use App\Decorators\ExceptionDecorator;

require_once './autoload.php';
ob_start();

/**
 * @var $oController Controller
 * @var $oDecorator Decorator
 */

// 1. test mock request data group one:
$_REQUEST['user'] = 'admin'; // see LoginDecorator
$_REQUEST['sign'] = 'PASS'; // see SignDecorator

// 2. test mock request data group two:
//$_REQUEST['user'] = 'admin'; // see LoginDecorator
//$_REQUEST['sign'] = 'SIGN_ERROR'; // see SignDecorator


$sControllerClass = MixCheckController::class;
$oController = new $sControllerClass();
$aDecorators = array_merge([
    ExceptionDecorator::class => [] // exception decorator use to catch global exception
], $oController->getDecorators());
$aDecorators = array_reverse($aDecorators);

echo "LoginCheckController decorators: \n";
print_r($aDecorators);

$oExecStack = $oController;
foreach ($aDecorators as $className => $param) {
    $oDecorator = new $className($oExecStack);
    $oDecorator->setDecoratorParam($param);
    $oExecStack = $oDecorator;
}

echo "==============execute==============\n";
$oRequest = new Request();
$oResponse = new Response();
$oExecStack->execute($oRequest, $oResponse);

echo "==============render==============\n";
// render response data as json
$oResponse->renderJson();
