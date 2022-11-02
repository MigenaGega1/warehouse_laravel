<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserService
{
    private UserRepository $userRepository;
    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function createUser(Request $request): User
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'created_at' => Carbon::now()->toDateTimeString(),

        ]);
       return $user;
    }

    public function updateUser(Request $request ,User $user)
    {
        $user = User::where('id','=',$user->id)
        ->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);

    }
}
