<?php

namespace App\Providers;

use App\Policies\ClientPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Client;
use App\Models\Order;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Client::class=>ClientPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function ($user){
            return $user->role=='admin';
        });
        Gate::define('isOperator',function($user){
       return $user->role == 'operator';
        });

//        Gate::define('update-client', function (User $user, Client $client) {
//            return $user->id === $client->user_id || $user->role=='admin'
//            ? Response::allow()
//                : Response::deny("this is not your client");
//        });

        Gate::define('update-order', function (User $user, Order $order) {
            return  $user->id === $order->user_id || $user->role=='admin' ;
        });

        Gate::define('cancel-order',function(User $user ,Order $order){
            return $user->id === $order->user_id || $user->role=='admin' ;

        });

    }
}
