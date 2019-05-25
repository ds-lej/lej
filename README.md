# LEJ ***(Laravel & ExtJS)***

## Install

### 1. Lej

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


### 2. Modules

1. Run the database migrations ```$ php artisan module:migrate Blog```
2. NPM install
    ```npm
    # clear
    $ npm cache verify  (or "$ npm cache clear --force")
    $ rm package-lock.json
    $ rm -rf node_modules
    
    # install
    $ npm i
    $ npm i sass sass-loader
    ```
