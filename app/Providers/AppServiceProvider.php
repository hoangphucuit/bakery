<?php

namespace App\Providers;
use App\ProductType;
use App\Cart;
use Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //đọc loại sp ra thanh menu (header)
        view()->composer('header',function($view){
            $loai_sp=ProductType::all();
            $view->with('loai_sp',$loai_sp);
        });

        view()->composer('header',function($view){
            if(Session('cart'))// neu da co session cart roi
            {
                $oldcart=Session::get('cart');//lay gio hang hien tai gan vao gio hang cũ
                $cart= new Cart($oldcart);//tao lai gio hang mới
                $view->with([
                         'cart'=>Session::get('cart'),
                         'product_cart'=>$cart->items,
                         'totalPrice'=>$cart->totalPrice,
                         'totalQty'=>$cart->totalQty
                         ]);
            }
            
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
