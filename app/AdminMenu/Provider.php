<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 11/29/2017
 * Time: 12:41 PM
 */

namespace App\AdminMenu;

use App\AdminMenu\Facade as AdminMenuFacade;

use App\Http\ViewComposers\AdminNavComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class Provider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     */
    protected $defer = true;

    public function boot() {
        $this->registerMenu();
        $this->registerViewComposerData();
    }

    public function registerViewComposerData()
    {
        View::composer('admin.layouts.left-nav', AdminNavComposer::class);
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->registerServices();
        $this->app->alias('adminmenu', 'App\AdminMenu\Builder');
    }

    /**
     * Register the Admin Menu instance.
     */
    protected function registerServices()
    {
        $this->app->singleton('adminmenu', function ($app) {
            return new Builder();
        });
    }

    protected function registerMenu()
    {
        /**
         * Add Menu Product
         */
        AdminMenuFacade::add('product')
            ->label(__('lang.product'))
            ->route('admin.product.index');

        /**
         * Add Menu Sales
         */
        AdminMenuFacade::add('sale')
            ->label(__('lang.orders-sold'))
            ->route('admin.order.index');

        /**
         * Add Menu Category
         */
        AdminMenuFacade::add('category')
            ->label(__('lang.category'))
            ->route('admin.category.index');

        /**
         * Add Menu Customers
         */
        AdminMenuFacade::add('customers')
            ->label(__('lang.customer'))
            ->route("admin.buyer.index");

        /**
         * Add Menu Newsletters
         */
        AdminMenuFacade::add('newsletters')
            ->label(__('lang.newsletter'))
            ->route("admin.newsletter.index");
        /**
         * Add Menu System
         */
        AdminMenuFacade::add('system')
            ->label(__('lang.system'))
            ->route("#");
        $systemMenu = AdminMenuFacade::get('system');

        /**
         * Add Submenu Admin User
         */
        $adminUserMenu = new AdminMenu();
        $adminUserMenu->key('admin-user')
            ->label(__('lang.admin-users'))
            ->route('admin.admin-user.index');
        $systemMenu->subMenu('admin-user', $adminUserMenu);

        $changePasswordMenu = new AdminMenu();
        $changePasswordMenu->key('change-password')
            ->label(__('lang.change-password'))
            ->route('admin.change-password.index');
        $systemMenu->subMenu('change-password', $changePasswordMenu);

        /**
         * Add Menu Pages
         */
        AdminMenuFacade::add('home')
            ->label(__('lang.pages'))
            ->route("#");
        $homeMenu = AdminMenuFacade::get('home');

        /**

         * Add Submenu
         */
        $homeSubMenu = new AdminMenu();
        $homeSubMenu->key('home')
            ->label('Home')
            ->route('admin.page.home');
        $homeMenu->subMenu('home', $homeSubMenu);

        $uberUnsMenu = new AdminMenu();
        $uberUnsMenu->key('uber-uns')
            ->label('Uber Uns')
            ->route('admin.page.uber-uns');
        $homeMenu->subMenu('uber-uns',  $uberUnsMenu);

        $wirKaufenMenu = new AdminMenu();
        $wirKaufenMenu->key('wir-kaufen')
            ->label('Wir Kaufen')
            ->route('admin.page.wir-kaufen');
        $homeMenu->subMenu('wir-kaufen',  $wirKaufenMenu);

    }

    public function provides()
    {
        return ['adminmenu', 'App\AdminMenu\Builder'];
    }
}

