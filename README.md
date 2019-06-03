## LEJ ***(Laravel & ExtJS)***

### Resources

- **[Laravel framework](https://laravel.com/)**
    - *[Documentation](https://laravel.com/docs/5.8)*
    - *[GitHub](https://github.com/laravel/laravel)*
- **[Laravel-Module](https://github.com/nWidart/laravel-modules)**
    - *[Documentation](https://nwidart.com/laravel-modules/v4/introduction)*
    - *[GitHub](https://github.com/nWidart/laravel-modules)*
- **[ExtJS](http://www.sencha.com/)**
    - *[Documentation](https://docs.sencha.com/)*
    - *[GitHub](https://github.com/cdnjs/cdnjs/tree/master/ajax/libs/extjs/6.2.0)*


### Quick install

#### 1. Lej

1. Create DB (collation = utf8mb4_unicode_ci)
2. Install ```$ composer update```
3. Set up the environment in the "config/*" files or ".env" file
4. Run the database migrations ```$ php artisan migrate```
5. NPM install
    ```npm
    # clear
    $ npm cache verify  (or "$ npm cache clear --force")
    $ rm package-lock.json
    $ rm -rf node_modules
    
    # install
    $ npm i
    ```
6. RUN frontend
    * Dev - ```$ npm run dev```
    * Prod - ```$ npm run prod```
    * Watch - ```$ npm run watch``` or ```$ npm run watch-poll```


#### 2. Modules

On the example of the module 'Blog':
- ```$ cd Modules/Blog```
- Run the database migrations ```$ php artisan module:migrate Blog```
- Publish assets ```$ php artisan module:publish```
- NPM install *(for Dev)*
    ```npm
    $ npm i
    $ npm i sass sass-loader
    ```
