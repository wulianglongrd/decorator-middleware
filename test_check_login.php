<?php
namespace App;

use App\Common\Request;
use App\Common\Response;
use App\Controllers\BaseController;
use App\Controllers\LoginCheckController;
use App\Decorators\BaseDecorator;
use App\Decorators\ExceptionDecorator;

require_once './autoload.php';
ob_start();

/**
 * @var $oController BaseController
 * @var $oDecorator BaseDecorator
 */

$_REQUEST['user'] = 'admin'; // mock request data, see LoginDecorator
//$_REQUEST['user'] = 'guest'; // mock request data, see LoginDecorator

$oControllerClass = LoginCheckController::class;
$oController = new $oControllerClass();
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
