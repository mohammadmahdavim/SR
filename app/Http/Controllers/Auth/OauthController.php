<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Crypt;
use Laravel\Passport\Passport;

class OauthController extends Controller
{
    //
    /**
     * @OA\Post(
     * path="/api/login",
     * operationId="authLogin",
     * tags={"Login"},
     * summary="User Login",
     * description="Login User Here",
     *
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"user_name", "password" , "type"},
     *               @OA\Property(property="user_name", type="user_name"),
     *               @OA\Property(property="type", type="type"),
     *               @OA\Property(property="password", type="password")
     *            ),
     *        ),
     *    ),
     *      @OA\Response(
     *          response=201,
     *          description="Login Successfully",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Login Successfully",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     * )
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if (!$this->attemptLogin($request)) {
            return new JsonResource(
                [
                    'status' => 401,
                    'data' => [],
                    'message' => 'Unauthorised',
                    'url' => \request()->getUri()
                ]
            );
        } else {
            $data['token'] = auth()->user()->createToken('token')->accessToken;
            $data['user'] = auth()->user();
            return new JsonResource(
                [
                    'status' => 200,
                    'data' => $data,
                    'message' => 'success',
                    'url' => \request()->getUri()
                ]
            );
        }
    }

    /**
     * Validate the user login request.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'password' => 'required',
            'type' => 'required',
            'user_name' => 'required'
        ]);


        switch ($request->all()) {
            case $request['type'] = 1:
                $validator = $request->validate([
                    'user_name' => 'required|']); // Validation for username
            case $request['type'] = 2:
                $validator = $request->validate([
                    'user_name' => 'required|email']); // Validation for emails
            case $request['type'] = 3:
                $validator = $request->validate([
                    'user_name' => 'required|']); // Validation for phone number

        }
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        //Try with username AND email AND username fields
        if (auth()->attempt([
                'user_name' => $request['user_name'],
                'password' => $request['password']
            ], $request->has('remember'))
            || auth()->attempt([
                'email' => $request['user_name'],
                'password' => $request['password']
            ], $request->has('remember'))
            || auth()->attempt([
                'phone_number' => $request['user_name'],
                'password' => $request['password']
            ], $request->has('remember'))) {
            return true;
        }
        return false;
    }

    /**
     * @OA\Get (
     * path="/api/user",
     * operationId="authuser",
     * tags={"user"},
     * summary="User ",
     * description="User Here",
     *     security={{"passport": {} }},
     *      @OA\Response(
     *          response=201,
     *          description="Login Successfully",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Login Successfully",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     * )
     */

    public function user(Request $request){
        $user =  $request->user();
        return $user;
    }
}
