<?php
namespace App\Http\Controllers;

use App\Model\User;

use Illuminate\Http\Request;

use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller

{

    /**

     * Create a new AuthController instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('auth:api', ['except' => ['login']]);

    }

    /**

     * Get a JWT via given credentials.

     *

     * @return \Illuminate\Http\JsonResponse

     */

    public function login()

    {

        $credentials = request(['email', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {

            return response()->json(['error' => '账号密码错误','code'=>401]);

        }

        return $this->respondWithToken($token);

    }

    /**

     * Get the authenticated User.

     *

     * @return \Illuminate\Http\JsonResponse

     */

    public function me()

    {

        return response()->json(JWTAuth::parseToken()->touser());

    }

    /**

     * Log the user out (Invalidate the token).

     *

     * @return \Illuminate\Http\JsonResponse

     */

    public function logout()

    {

        JWTAuth::parseToken()->invalidate();

        return response()->json(['message' => 'Successfully logged out']);

    }

    /**

     * Refresh a token.

     *

     * @return \Illuminate\Http\JsonResponse

     */

    public function refresh()

    {

        return $this->respondWithToken(JWTAuth::parseToken()->refresh());

    }

    /**

     * Get the token array structure.

     *

     * @param  string $token

     *

     * @return \Illuminate\Http\JsonResponse

     */

    protected function respondWithToken($token)

    {

        return response()->json([

            'access_token' => $token,

            'token_type' => 'bearer',

            'expires_in' => JWTAuth::factory()->getTTL() * 60

        ]);

    }

}