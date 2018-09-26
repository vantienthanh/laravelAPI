<?php

namespace Modules\ThanhUsers\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\InvalidClaimException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Modules\User\Repositories\UserRepository;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class AuthController extends BaseController
{
    private $user;
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }
    public function authenticate(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');
        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return $this->response->errorInternal('Could not create token');
        }

        return $this->response->array([
            'token' => $token,
            'expire_in' => \Carbon\Carbon::now()->addMinutes(config('jwt.ttl'))->format('Y-m-d H:i:s')
        ]);

    }
    public function getAuthenticatedUser()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (InvalidClaimException $e) {

            return response()->json(['token_expired'], $e->getMessage());

        } catch (TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getCode());

        } catch (JWTException $e) {

            return response()->json(['token_absent'], $e->getMessage());

        }

        // the token is valid and we have found the user via the sub claim
        return response()->json(compact('user'));
    }
    public function testPost(){
        JWTAuth::parseToken()->invalidate();
     echo "qưe";
    }
}
