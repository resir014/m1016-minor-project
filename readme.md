# m1016-laravel-test

## Installation

### Requirements

* Latest version of [XAMPP](https://www.apachefriends.org/).
* Latest version of [Composer](https://getcomposer.org/).

For now, this guide is only for Windows.

* Install XAMPP, prefereably in `C:\xampp`.
* Download the Windows installer for Composer, install it. Make sure to point to the `php.exe` located in the XAMPP installation directory when prompted.

Now, check if you have both `php` and `composer` on the command line.

### Optional Requirements

* [node.js (v4.x)](https://nodejs.org/)

After installing Node.js, install the following from the command line:

* Gulp (`npm install -g gulp`)

### Setting up our development environment

After both XAMPP and Composer are installed, clone this repository to the XAMPP `htdocs` directory.

```
C:\Users\user> cd C:\xampp\htdocs
C:\xampp\htdocs> git clone https://github.com/resir014/m1016-laravel-test.git
```

Next, navigate to the working directory and run Composer to install the dependencies required for this project.

```
C:\xampp\htdocs> cd m1016-laravel-test
C:\xampp\htdocs\m1016-laravel-test> composer install
```

Finally, create an application key using the following command:

```
> php artisan key:generate
```

To update the dependencies at any time, run this command:

```
> composer update
```

**Optional:** If you've installed Node.js, you will have to install the required Node packages as well.

```
> npm install
```

### Compiling CSS and JS

We use Gulp and `laravel-elixir` to compile our CSS and JS files. `cd` to `C:\xampp\htdocs\m1016-laravel-test` and run the following command:

```
> gulp
```

## Running locally

### Through XAMPP

Open the XAMPP Control Panel and activate both Apache and MySQL, then navigate to `http://localhost/m1016-laravel-test/public`.

### Through PHP

Open the XAMPP Control Panel and activate MySQL. Then, open a command prompt and `cd` to the project directory, and run the following command:

```
> php -S localhost:8888 -t public
```

Then, navigate to `http://localhost:8888` to load the page.

## Contributing

1. [Fork it](https://github.com/resir014/m1016-laravel-test/fork)
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Create a new Pull Request

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
