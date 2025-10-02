<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\Usuario;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\LogoutResponse;
use Laravel\Fortify\Contracts\LoginResponse;
use App\Actions\Fortify\LoginResponse as CustomLoginResponse;



class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(LoginResponse::class, CustomLoginResponse::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    // Definir rate limiter para login
    RateLimiter::for('login', function (Request $request) {
        $email = (string) $request->documento; // ahora tu login es por documento
        return Limit::perMinute(5)->by($email.$request->ip());
    });
        Fortify::loginView(function () {
        return view('auth.login'); // tu Blade modificado
    });

    Fortify::authenticateUsing(function (Request $request) {
    $request->validate([
        'documento' => 'required|integer',
        'password' => 'required|string',
    ]);

        $user = Usuario::where('Documento', $request->documento)->first();
        if ($user && Hash::check($request->password, $user->Password)) {
            return $user;
        }

        return null;
    });
    $this->app->singleton(
        \Laravel\Fortify\Contracts\LogoutResponse::class,
        LogoutResponse::class
    );

    }
}
