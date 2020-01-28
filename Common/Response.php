<?php
namespace App\Common;

class Response
{
    private $response;

    public function getResponse()
    {
        return $this->response;
    }

    public function setResponse($response)
    {
        $this->response = $response;
    }

    public function buildSuccess($aData = null, $sErrMsg = 'SUCCESS', $sErrNo = Errno::ERRNO_SUCCESS)
    {
        $this->setResponse([
            'errno'  => $sErrNo,
            'errmsg' => $sErrMsg,
            'data'   => $aData
        ]);
    }

    public function buildException($sErrNo = Errno::ERROR_UNKNOWN, $sErrMsg)
    {
        $this->setResponse([
            'errno'  => $sErrNo,
            'errmsg' => $sErrMsg,
            'data'   => null
        ]);
    }

    public function renderJson()
    {
        $aResp = $this->getResponse();
        if(empty($aResp['data'])) {
            $aResp['data'] = null;
        }
        $data = [
            'errno'  => strval($aResp['errno']),
            'errmsg' => strval($aResp['errmsg']),
            'data'   => $aResp['data']
        ];
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
