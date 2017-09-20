<?php

namespace App\Http\Controllers\webServer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AuthServiceInterface;


class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

        

    public function postAuthentication(Request $request)
    {

        $array_datas = $this->authService->authentication($request->input('user'));
        return response()->json($array_datas, $array_datas['status_code']);
    }

    public function getAuthorization(){

        $array_datas = $this->authService->authorization();
        return response()->json($array_datas,$array_datas['status_code']);

    }
}
