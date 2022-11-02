<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserRepository extends Repository
{
   const MODEL = User::class;

   public function getActiveUsers() {
        return User::query()->where('role', 'admin')->get();
   }

   public function getUsers(): Collection
   {
       return User::all();
   }
}
