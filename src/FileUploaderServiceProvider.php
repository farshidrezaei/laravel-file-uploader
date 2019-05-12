<?php

namespace farshidrezaei\fileUploader;

use Illuminate\Support\ServiceProvider;

class FileUploaderServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish configuration files
//        $this->publishes( [
//            __DIR__ . '/configs/config.php' => config_path( 'file-uploader.php' ),
//        ], 'config' );


    }

    public function register()
    {
        require_once __DIR__ . '/helpers/helpers.php';
    }
}