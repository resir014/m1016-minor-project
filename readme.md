# m1016-minor-project

> IS Minor Project

## Installation

### Requirements

* Latest version of [XAMPP](https://www.apachefriends.org/) (on Windows).
* A working LAMP stack (on Linux).
* Latest version of [Composer](https://getcomposer.org/).

For now, this guide is mostly compatible for Windows only.

* Install XAMPP, prefereably in `C:\xampp`.
* Download the Windows installer for Composer, install it. Make sure to point to the `php.exe` located in the XAMPP installation directory when prompted.

Now, check if you have both `php` and `composer` on the command prompt.

```
> php -v
> composer -v
```

### Optional requirements

* [node.js (v4.x)](https://nodejs.org/)

After installing Node.js, install the following from the command line:

* Gulp (`npm install -g gulp`)

## Setting up our development environment

After both XAMPP and Composer are installed, clone this repository.

```bash
$ git clone https://github.com/resir014/m1016-minor-project.git
```

First, make a copy of `.env.example` and rename it to `.env`, then make sure you have your database settings set up properly:

```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_DATABASE=homestead
DB_USERNAME=root
DB_PASSWORD=
```

The `DB_DATABASE` variable should be set to the database you created for the app, and the `DB_USERNAME` and `DB_PASSWORD` variable should be set to the username and password you use to log in to MySQL.

Next, navigate to the working directory and run Composer to install the dependencies required for this project.

```bash
$ composer install
```

Finally, create an application key using the following command:

```bash
$ php artisan key:generate
```

### Optional tasks

If you've installed Node.js, you will have to install the required Node packages as well.

```bash
$ npm install
```

To update the dependencies at any time, run this command:

```bash
$ composer update
```

## Development

### Running locally

Make sure you have MySQL and Apache activated (On Windows, you can use the XAMPP Control Panel). Then, open a command prompt and `cd` to the project directory, and run the following command:

```bash
$ php artisan serve
```

Then, navigate to `http://localhost:8000` to load the page.

### Compiling CSS and JS

We use Gulp and `laravel-elixir` to compile our CSS and JS files. `cd` to `C:\xampp\htdocs\m1016-laravel-test` and run the following command:

```bash
$ npm install
```

Then use the following command to build the SCSS and JS files:

```bash
$ gulp
```

### Working with database

Coming soon!

## Vagrant (with Homestead)

You can also use Vagrant for easy setup of your development environment through a VM.

Read the documentation [here](http://laravel.com/docs/5.1/homestead).

Requirements (You MUST install these in order):

* [Oracle VirtualBox](https://www.virtualbox.org/wiki/Downloads)
* [Vagrant](https://www.vagrantup.com)

First, clone the repository to anywhere you like.

```bash
$ git clone https://github.com/resir014/m1016-minor-project.git
```

Make a copy of `.env.example` and rename it to `.env`

Then simply install the required dependencies and generate your key:

```bash
$ composer install
$ php artisan key:generate
```

After that, we can generate the Vagrant config files by running one of the following commands:

On Linux:

```bash
$ php vendor/bin/homestead make
```

On Windows:

```
> vendor\bin\homestead make
```

Then, edit these lines on the `.env` file to the following:

```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

Then, simply run the following command to run the VM:

```bash
$ vagrant up
```

Then go to `192.168.10.10` on your browser, and voila!

To access the VM's command line:

```bash
$ vagrant ssh
```

To shutdown the VM:

```bash
$ vagrant halt
```

**Note:** Don't forget to run `vagrant halt` to shutdown the VM after you've finished working on the project.

## Contributing

1. [Fork it](https://github.com/resir014/m1016-laravel-test/fork)
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Create a new Pull Request

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
