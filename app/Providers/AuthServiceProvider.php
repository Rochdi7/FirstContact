<?php

namespace App\Providers;

use App\Models\MailProvider;
use App\Policies\MailProviderPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        MailProvider::class => MailProviderPolicy::class,
        // Add more policies here if needed
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Optional: define any custom Gates here
    }
}
