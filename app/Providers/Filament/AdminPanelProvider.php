<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use Filament\Widgets;
use Filament\PanelProvider;
use Filament\Pages\Dashboard;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Navigation\NavigationItem;
use Filament\Navigation\NavigationGroup;
use Filament\Widgets\FilamentInfoWidget;
use Filament\Http\Middleware\Authenticate;
use Filament\Navigation\NavigationBuilder;
use App\Filament\Resources\AgunanMasukResource;
use App\Filament\Resources\BerkasMasukResource;
use Illuminate\Session\Middleware\StartSession;
use App\Filament\Resources\AgunanPinjamResource;
use App\Filament\Resources\BerkasLemariResource;
use App\Filament\Resources\BerkasPinjamResource;
use App\Filament\Resources\StatusAgunanResource;
use Illuminate\Cookie\Middleware\EncryptCookies;
use FilipFonal\FilamentLogManager\FilamentLogManager;
use Illuminate\Routing\Middleware\SubstituteBindings;
use App\Filament\Resources\PengembalianAgunanResource;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Njxqlus\FilamentProgressbar\FilamentProgressbarPlugin;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use App\Filament\Resources\AgunanMasukResource\Widgets\StatsAgunan;
use App\Filament\Resources\BerkasMasukResource\Widgets\StatsOverview;
use App\Filament\Resources\AgunanMasukResource\Widgets\AgunanMasukStats;
use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;
use App\Filament\Resources\UserResource;

// use App\Filament\Resources\AgunanMasukResource\Widgets\StatsAgunanMasuk;


class AdminPanelProvider extends PanelProvider

{
    public function panel(Panel $panel): Panel
    {
        return $panel
            // ->renderHook(
            //     // This line tells us where to render it
            //     'panels::body.end',
            //     // This is the view that will be rendered
            //     fn () => view('footer'),
            // )
            ->plugin(FilamentSpatieRolesPermissionsPlugin::make())
            // ->breadcrumbs(false)
            ->plugin(FilamentProgressbarPlugin::make()->color('#29b'))
            ->default()
            // ->sidebarCollapsibleOnDesktop(true)
            ->sidebarFullyCollapsibleOnDesktop(true)
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Violet,
            ])




            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                // Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
                StatsOverview::class,
                // AgunanMasukStats::class,
                // StatsAgunan::class,
            ])

            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])




            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
