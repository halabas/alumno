<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Alumno;
use App\Policies\AlumnoPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Alumno::class => AlumnoPolicy::class,
    ];
    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
