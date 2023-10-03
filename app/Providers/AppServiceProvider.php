<?php


namespace App\Providers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Model::unguard();
        Paginator::useBootstrap();

        // Gate::define('edit',function(User $user,Comment $comment){
        //     return $user->id == $comment->user_id;
        // });
    }
}
