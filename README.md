# Laravel-File-Uploader
requirement : Laravel ^5.0  

`farshidrezaei/laravel-file-uploader` is a Laravel package which help you to upload your files easily.


## Install

To install through Composer, by run the following command:

``` bash
composer require farshidrezaei/laravel-file-uploader
```

The package will automatically register a service provider.

Optionally, publish the package's configuration file by running:

``` bash
php artisan vendor:publish --provider="farshidrezaei\fileUploader"
```

## Documentation

after install package you can use this syntax to upload your files:

```php
    FileUploader::file($request->file('your_file'))
->name('avatar')
->path('avatar')
->save();
```

you can use helper function, too:

```php
    fileUploader($request->file('your_file'))
->name('avatar')
->path('avatar')
->save();
```

### `file( UploadedFile $file )`

this function create an instance of class with uploaded file then, set original file name as uploading file name. and set
 `public_path('files/' . Auth::id() . '/others/')`
  as uploading file path.

### `name( string $name = null )`

 this function set $name as uploading file name.if $name be null, that will save with original name.

### `path( string $path = null )`

 this function set  $path as uploading file path that it will save there.
`public_path('files/' . Auth::id() . '/' . $path . '/')` 
 
if $path be null, that will save in "others" subFolder.
`public_path('files/' . Auth::id() . '/others/')`

### `save()`
 move file to specified path with specified name, and return file url.


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
