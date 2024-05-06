<?php

namespace App\Providers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;

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
    public function boot(): void
    {
        // Gate::define('job.edit', function (?User $user, Job $job) {
        Gate::define('job.edit', function (User $user, Job $job) {
            return ($job->company->user->is($user));
        });

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(6)->by($request->ip());
        });
    }
}
