<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Contact;
use App\Models\Models;
use App\Models\Privacy;
use App\Models\Setting;
use App\Models\CompanyInfo;
use App\Models\Social;
use App\Models\Term;
use App\Models\Wishlist;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{

    public function boot()
    {
        view()->composer('*', function ($view) {





            $data['logoData'] = 'abc';




            $view->with($data);
        });
    }


    public function register()
    {
        //
    }
}