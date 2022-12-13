<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Services\ResponseService;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * @param UserLoginRequest $request
     * @return Response|Application|ResponseFactory
     */
    public function login(UserLoginRequest $request): Response|Application|ResponseFactory
    {
        if (auth()->attempt($request->validated())) {
            $user = auth()->user();
            $token = Str::uuid();
            $user->api_token = $token;
            $user->save();

            return ResponseService::success(["token" => $token]);
        }
        return ResponseService::error(401, "еверный номер телефона или пароль");
    }

    /**
     * @param UserStoreRequest $request
     * @return Response|Application|ResponseFactory
     */
    public function store(UserStoreRequest $request): Response|Application|ResponseFactory
    {
        $user = User::create($request->validated());

        return ResponseService::success($user, 204);
    }
}
