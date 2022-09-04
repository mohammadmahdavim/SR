<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
     *               required={"username", "password" },
     *               @OA\Property(property="user_name", type="user_name"),
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

//        $data = $request->all();

        $validator = $request->validate([
            'user_name' => 'required',
            'password' => 'required'
        ]);
//        if($data->type){
//
//        }
//        switch ($data->type){
//            case $data->type = 1:
//                $validator = $request->validate([
//                    'username' => 'required|']); // Validation for username
//            case $data->type = 2:
//                $validator = $request->validate([
//                    'username' => 'required|email']); // Validation for emails
//            case $data->type = 3:
//                $validator = $request->validate([
//                    'username' => 'required|']); // Validation for phone number
//        }

        if (!auth()->attempt($validator)) {
            return response()->json(['error' => 'Unauthorised'], 401);
        } else {
            $success['token'] = auth()->user()->createToken('authToken')->accessToken;
            $success['user'] = auth()->user();
            return response()->json(['success' => $success])->setStatusCode(200);
        }
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
