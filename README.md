# LEJ

Framework for building CPM systems.

The product is based on the [Laravel](https://laravel.com/) and [ExtJS](https://www.sencha.com/products/extjs/) frameworks.

## Quick install

1. Set up the environment in the "config/*" files or ".env" file
2. Install
    ```npm
    $ composer update
    
    ### Migrate DB
    $ php artisan module:publish-migration
    $ php artisan migrate
 
    ### Frontend
    $ php artisan module:publish
    $ npm i
    $ npm run prod
    ```

## Resources

* **[Laravel framework](https://laravel.com/)**
    - *[Documentation](https://laravel.com/docs/5.8)*
    - *[GitHub](https://github.com/laravel/laravel)*
* **[Laravel-Module](https://github.com/nWidart/laravel-modules)**
    - *[Documentation](https://nwidart.com/laravel-modules/v4/introduction)*
    - *[GitHub](https://github.com/nWidart/laravel-modules)*
* **[ExtJS](http://www.sencha.com/)**
    - *[Documentation](https://docs.sencha.com/)*

## Third-party

* Laravel 5.8.* ([MIT License](https://opensource.org/licenses/MIT))
* ExtJS 6.2.0 ([GPL v3](https://www.sencha.com/legal/GPL/))