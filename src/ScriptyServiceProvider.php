<?php

namespace Laext\Scripty;

use Encore\Admin\Admin;
use Encore\Admin\Form;
use Illuminate\Support\ServiceProvider;

class ScriptyServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(ScriptyExtension $extension)
    {
        if (! ScriptyExtension::boot()) {
            return ;
        }
        
        Admin::booting(function () {

            Form::extend('scripty', Scripty::class);

            if ($alias = ScriptyExtension::config('alias')) {
                Form::alias('scripty', $alias);
            }
        });
    }
}