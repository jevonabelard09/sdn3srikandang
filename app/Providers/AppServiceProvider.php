<?php

namespace App\Providers;

use App\Models\ContactMessage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        View::composer('admin.*', function ($view) {
            $hasContactMessagesTable = Schema::hasTable('contact_messages');
            $hasContactMessageReadAtColumn = $hasContactMessagesTable && Schema::hasColumn('contact_messages', 'read_at');

            $view->with('adminHasContactMessagesTable', $hasContactMessagesTable);
            $view->with('adminHasContactMessageReadAtColumn', $hasContactMessageReadAtColumn);
            $view->with(
                'adminUnreadContactMessages',
                $hasContactMessageReadAtColumn
                    ? ContactMessage::query()->whereNull('read_at')->count()
                    : 0
            );
        });
    }
}
