<?php
namespace App\Decorators;

use App\Common\BaseAction;
use App\Common\Errno;
use App\Common\Request;
use App\Common\Response;

/**
 * exception decorator is used to catch exception
 *
 * Class ExceptionDecorator
 * @package App\Decorators
 */
class ExceptionDecorator extends BaseDecorator
{
    private $action;

    public function __construct(BaseAction $action)
    {
        $this->action = $action;
    }

    function execute(Request $request, Response $response)
    {
        echo "ExceptionDecorator start...\n";
        try {
            $this->action->execute($request, $response);
        } catch (\LogicException $e) {
            $response->buildException($e->getMessage(), $e->getCode());
        } catch (\Exception $e) {
            $response->buildException(Errno::ERROR_UNKNOWN, 'Unknown Exception');
        }
    }
}
