<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class ClientRepository extends Repository
{
   const MODEL = Client::class;



   public function getClients(): Collection
   {
       return Client::all();
   }
}
