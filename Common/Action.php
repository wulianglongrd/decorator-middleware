<?php
namespace App\Common;

interface Action
{
    public function execute(Request $request, Response $response);
}
