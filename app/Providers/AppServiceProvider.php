<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {

            $hak_akses = Auth::user()->hak_akses;
            $event->menu->add('Hak Akses : ' . strtoupper($hak_akses));
            $event->menu->add('MENU');

            if ($hak_akses == "superadministrator") {

                $event->menu->add(
                    [
                        'text' => 'Barang',
                        'url' => 'barang',
                        'icon' => 'fas fa-fw fa-cart-plus'
                    ],
                    [
                        'text' => 'Penjualan',
                        'url' => 'penjualan',
                        'icon' => 'fas fa-fw fa-cash-register'
                    ],
                    [
                        'text' => 'Pegawai',
                        'url' => 'pegawai',
                        'icon' => 'fas fa-fw fa-user-astronaut'
                    ],
                    [
                        'text' => 'Laporan',
                        'url' => 'laporan',
                        'icon' => 'fas fa-fw fa-file-pdf'
                    ],
                );
            } else if ($hak_akses == "administrator") {

                $event->menu->add(
                    [
                        'text' => 'Barang',
                        'url' => 'barang',
                        'icon' => 'fas fa-fw fa-cart-plus'
                    ],
                    [
                        'text' => 'Penjualan',
                        'url' => 'penjualan',
                        'icon' => 'fas fa-fw fa-cash-register'
                    ],
                );
            }
        });
    }
}
