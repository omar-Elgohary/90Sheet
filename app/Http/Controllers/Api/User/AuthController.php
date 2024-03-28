<?php
namespace App\Http\Controllers\Api\User;
use App\Traits\ResponseTrait;
use App\Services\auth\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserResource;


use App\Http\Requests\Api\User\Auth\LoginRequest;
use App\Http\Requests\Api\User\Auth\ActivateRequest;
use App\Http\Requests\Api\User\Auth\RegisterRequest;
use App\Http\Requests\Api\User\Auth\ResendCodeRequest;
use Illuminate\Http\Request;


class AuthController extends Controller {

    use ResponseTrait ;

    public function register(RegisterRequest $request) {
        $data = (new AuthService())->register($request->validated());
        return $this->response( $data['key'] ,$data['msg'] , $data['user'] == [] ? [] :  new UserResource($data['user']) );
    }

    public function resendCode(ResendCodeRequest $request) {
        (new AuthService())->resendCode($request->validated());
        return $this->response('success', __('auth.code_re_send'));
    }

    public function activate(ActivateRequest $request) {
        $data = (new AuthService())->activate($request->validated());
        $token = $data['user']->login();
        return $this->response('success', __('auth.activated'), UserResource::make($data['user'])->setToken($token));
    }

    public function login(LoginRequest $request) {
        $data = (new AuthService())->login($request->validated());

        if ($data['key'] == 'fail') {
            return $this->failMsg($data['msg']);
        }

        if ($data['key'] == 'blocked') {
            return $this->blockedReturn($data['user']);
        }

        if ($data['key'] == 'needActive') {
            return $this->phoneActivationReturn($data['user']);
        }

        $token = $data['user']->login();
        return $this->response('success', __('apis.signed'), UserResource::make($data['user'])->setToken($token));
    }

    public function logout(Request $request) {
        auth()->user()->logout();
        return $this->response('success', __('apis.loggedOut'));
    }

    public function deleteAccount(Request $request) {
        // if there any delete conditions write it here

        auth()->user()->currentAccessToken()->delete();
        if (request()->device_id) {
            auth()->user()->devices()->where(['device_id' => request()->device_id])->delete();
        }
        auth()->user()->delete();

        return $this->successMsg(__('auth.account_deleted'));
    }



}
