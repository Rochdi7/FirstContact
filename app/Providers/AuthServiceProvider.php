<?php

namespace App\Providers;

use App\Models\MailProvider;
use App\Models\Template;
use App\Models\Message;
use App\Policies\MailProviderPolicy;
use App\Policies\TemplatePolicy;
use App\Policies\MessagePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        MailProvider::class => MailProviderPolicy::class,
        Template::class => TemplatePolicy::class,
        Message::class => MessagePolicy::class,
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
