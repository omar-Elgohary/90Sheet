<?php

namespace App\Services\auth;

use DB;
use App\Models\User;
use App\Models\UserUpdate;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\Api\UserResource;

class AuthService
{
    use GeneralTrait ;

    public function register($request)
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            // Create a new user
            $user = User::create($request);

            // Send verification code to the user
            $user->sendVerificationCode();

            // Commit the transaction
            DB::commit();

            // Return success response with user details
            return [
                'key' => 'success',
                'msg' => __('auth.registered'),
                'user' => new UserResource($user->refresh())
            ];
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollback();

            // Return error response
            return [
                'key' => 'fail',
                'msg' => __('site.wrong'),
                'user' => []
            ];
        }
    }

    /**
     * Activates a user based on the provided phone and country code.
     *
     * @param array $request The request data containing the phone and country code.
     * @return array The response data containing the success message and the refreshed user data.
    */
    public function activate($request)  {
        // Find the user based on the provided phone and country code
        $user = User::where([
            'phone' => $request['phone'], 
            'country_code' => $request['country_code']
        ])->first();

        $user->markAsActive() ;

        // Return the response data
        return [
            'key' => 'success', 
            'msg' => __('auth.activated'), 
            'user' => $user->refresh()
        ];
    }
    
    public function resendCode($request)  {
        // Find the user based on the phone and country code
        $user = User::where([
            'phone' => $request['phone'],
            'country_code' => $request['country_code']
        ])->first();

        // Send the verification code to the user
        $user->sendVerificationCode();

        // Return the success message and the updated user data
        return [
            'key' => 'success',
            'msg' => __('auth.code_re_send'),
            'user' => $user->refresh()
        ];
    }

    public function login($request) {
        // Find user by phone and country code
        $user = User::where([
            'phone' => $request['phone'], 
            'country_code' => $request['country_code']
        ])->first();

        // If user does not exist, return failure
        if (!$user) {
            return [
                'key' => 'fail', 
                'msg' => __('auth.incorrect_key_or_phone'), 
                'user' => []
            ];
        }

        // If password is incorrect, return failure
        if (!Hash::check($request['password'], $user->password)) {
            return [
                'key' => 'fail', 
                'msg' => __('auth.incorrect_pass'), 
                'user' => []
            ];
        }

        // If user is blocked, return blocked
        if ($user->is_blocked) {
            return [
                'key' => 'blocked', 
                'msg' => __('auth.blocked'), 
                'user' => $user
            ];
        }

        // If user is not active, return not active
        if (!$user->active) {
            return [
                'key' => 'needActive', 
                'msg' => __('auth.not_active'), 
                'user' => $user
            ];
        }

        // If all checks pass, return success
        return [
            'key' => 'success', 
            'msg' => __('auth.signed'), 
            'user' => $user
        ];
    }


    public function updateProfile($request)  {
        // Get the currently authenticated user
        $user = auth()->user();
        
        // Update the user's data
        $user->update($request) ; 
        
        // Return the updated user data
        return ['key' => 'success', 'msg' => __('auth.account_updated'), 'user' => $user->refresh()];
    }


    public function resetPassword($request)
    {
        // Find the user by phone and country code
        $user = User::where([
            'phone' => $request['phone'], 
            'country_code' => $request['country_code']
        ])->first();
        
        // Delete the password reset code
        UserUpdate::where([
            'user_id' => $user->id, 
            'type' => 'password', 
            'code' => $request['code']
        ])->first()->delete();
        
        // Update the user's password
        $user->update(['password' => $request['password']]);
        
        // Return success message
        return [
            'key' => 'success', 
            'msg' => __('auth.password_changed')
        ];
    }

    public function forgetPasswordSendCode($request)
    {
        $user = User::where(['phone' => $request['phone'], 'country_code' => $request['country_code']])->first();
        if (!$user) {
            return ['key' => 'fail', 'msg' => __('auth.incorrect_key_or_phone'), 'user' => []];
        }
        UserUpdate::updateOrCreate(['user_id' => $user->id, 'type' => 'password'] , ['code' => '']); // code will be filled from  UserUpdate model 

        return ['key' => 'success', 'msg' => __('apis.success') , 'user' => $user->refresh()];
    }


}
