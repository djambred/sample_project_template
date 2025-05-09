<?php

namespace App\Providers\Filament;

use App\Filament\Admin\Resources\FooterLinkResource;
use App\Filament\Admin\Resources\JargonResource;
use App\Filament\Admin\Resources\LogoResource;
use App\Filament\Admin\Resources\PageConfigResource;
use App\Filament\Admin\Resources\PageResource;
use App\Filament\Admin\Resources\PostResource;
use App\Filament\Admin\Resources\ProductResource;
use App\Filament\Admin\Resources\SeoResource;
use App\Filament\Cms\PayrollResource;
use Filament\Enums\ThemeMode;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Navigation\NavigationGroup;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Joaopaulolndev\FilamentEditProfile\Pages\EditProfilePage;

class CmsPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('cms')
            ->path('cms')
            ->brandName('CMS')
            ->spa()
            ->login()
            ->passwordReset()
            ->profile(\App\Filament\Pages\Auth\EditProfile::class, isSimple: false)
            ->defaultThemeMode(ThemeMode::Light)
            ->font('Montserrat')
            ->colors([
                'primary' => Color::Blue,
            ])
            ->maxContentWidth(MaxWidth::SevenExtraLarge)
            ->sidebarCollapsibleOnDesktop()
            ->pages([
                Pages\Dashboard::class,
            ])
            ->navigationGroups([
                // NavigationGroup::make()
                //     ->label('Administration'),
            ])
            ->userMenuItems([
                'profile' => MenuItem::make()
                    ->label(fn () => auth()->user()->name)
                    ->url(fn (): string => EditProfilePage::getUrl())
                    ->icon('heroicon-m-user-circle'),
                // 'profile' => \Filament\Navigation\MenuItem::make()
                //     ->label(fn () => auth()->user()->name)
                //     ->icon('heroicon-m-user-circle'),
            ])
            ->plugins([
                \Hasnayeen\Themes\ThemesPlugin::make(),
                \Njxqlus\FilamentProgressbar\FilamentProgressbarPlugin::make()->color('#29b'),
                \DiogoGPinto\AuthUIEnhancer\AuthUIEnhancerPlugin::make()
                    ->showEmptyPanelOnMobile(false)
                    ->formPanelPosition('right')
                    ->formPanelWidth('40%')
                    ->emptyPanelBackgroundImageOpacity('70%')
                    ->emptyPanelBackgroundImageUrl('https://picsum.photos/seed/picsum/1260/750.webp/?blur=1'),
                \Awcodes\LightSwitch\LightSwitchPlugin::make()
                    ->position(\Awcodes\LightSwitch\Enums\Alignment::BottomCenter)
                    ->enabledOn([
                        'auth.login',
                        'auth.password',
                    ]),
                \Awcodes\Overlook\OverlookPlugin::make()
                    ->includes([
                        \App\Filament\Admin\Resources\UserResource::class,
                    ]),
                \Joaopaulolndev\FilamentEditProfile\FilamentEditProfilePlugin::make()
                    ->slug('my-profile')
                    ->setTitle('My Profile')
                    ->shouldRegisterNavigation(false)
                    ->shouldShowDeleteAccountForm(false)
                    ->shouldShowSanctumTokens(false)
                    ->shouldShowBrowserSessionsForm()
                    ->shouldShowAvatarForm(),
            ])
            ->resources([
                SeoResource::class,
                LogoResource::class,
                JargonResource::class,
                ProductResource::class,
                PageConfigResource::class,
                FooterLinkResource::class,

            ])
            ->viteTheme('resources/css/filament/admin/theme.css')
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
                \Hasnayeen\Themes\Http\Middleware\SetTheme::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
