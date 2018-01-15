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
         * Add Menu Catalog
         */
        AdminMenuFacade::add('catalog')
                        ->label(__('lang.catalog'))
                        ->route("#");
        $catalogMenu = AdminMenuFacade::get('catalog');

        /**
         * Add Submenu Product
         */
        $productMenu = new AdminMenu();
        $productMenu->key('product')
                    ->label(__('lang.product'))
                    ->route('admin.product.index');
        $catalogMenu->subMenu('product',$productMenu);

        /**
         * Add Submenu Category
         */
        $categoryMenu = new AdminMenu();
        $categoryMenu->key('category')
                     ->label(__('lang.category'))
                     ->route('admin.category.index');
        $catalogMenu->subMenu('category', $categoryMenu);

        /**
         * Add Menu Sales
         */
        AdminMenuFacade::add('sale')
            ->label(__('lang.sales'))
            ->route("#");
        $saleMenu = AdminMenuFacade::get('sale');


        /**
         * Add Submenu Orders
         */
        $orderMenu = new AdminMenu();
        $orderMenu->key('order')
            ->label(__('lang.orders'))
            ->route('admin.order.index');
        $saleMenu->subMenu('order',$orderMenu);

        /**
         * Add Menu Customers
         */
        AdminMenuFacade::add('buyers')
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

    }

    public function provides()
    {
        return ['adminmenu', 'App\AdminMenu\Builder'];
    }
}

