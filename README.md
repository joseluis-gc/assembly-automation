# Assembly Automation

Description

## Why ?
Description

[![Support the project](_support/banner-host1plus.png)](https://affiliates.host1plus.com/ref/devmetal/36f4d828.html)

Find the other versions here:

**version** (not maintained anymore)
Full login script in one file. Uses a one-file SQLite database (no MySQL needed) and PDO: Register, login, logout.
https://github.com/panique/php-login-one-file

## Requirements

- PHP 5.3.7+
- MySQL 5 database (please use a modern version of MySQL (5.5, 5.6, 5.7) as very old versions have a exotic bug that
[makes PDO injections possible](http://stackoverflow.com/q/134099/1114320).
- activated mysqli (last letter is an "i") extension (activated by default on most server setups)

## Installation (quick setup)

Create a database *login* and the table *users* via the SQL statements in the `_install` folder.
Change mySQL database user and password in `config/db.php` (*DB_USER* and *DB_PASS*).

## Installation (detailed setup tutorials)

- [Detailed tutorial for installation on Ubuntu 12.04 LTS](http://www.dev-metal.com/install-php-login-nets-1-minimal-login-script-ubuntu/)
- [Detailed tutorial for installation on Windows 7 and 8 (useful for development)](http://www.dev-metal.com/how-to-install-php-login-minimal-on-windows-7-8/)

## Security notice

This script comes with a handy .htaccess in the views folder that denies direct access to the files within the folder
(so that people cannot render the views directly). However, these .htaccess files only work if you have set
`AllowOverride` to `All` in your apache vhost configs. There are lots of tutorials on the web on how to do this.

## Useful links

- [A little guideline on how to use the PHP 5.5 password hashing functions and its "library plugin" based PHP 5.3 & 5.4 implementation](http://www.dev-metal.com/use-php-5-5-password-hashing-functions/)
- [How to setup latest version of PHP 5.5 on Ubuntu 12.04 LTS](http://www.dev-metal.com/how-to-setup-latest-version-of-php-5-5-on-ubuntu-12-04-lts/). Same for Debian 7.0 / 7.1:
- [How to setup latest version of PHP 5.5 on Debian Wheezy 7.0/7.1 (and how to fix the GPG key error)](http://www.dev-metal.com/setup-latest-version-php-5-5-debian-wheezy-7-07-1-fix-gpg-key-error/)
- [Notes on password & hashing salting in upcoming PHP versions (PHP 5.5.x & 5.6 etc.)](https://github.com/panique/php-login/wiki/Notes-on-password-&-hashing-salting-in-upcoming-PHP-versions-%28PHP-5.5.x-&-5.6-etc.%29)
- [Some basic "benchmarks" of all PHP hash/salt algorithms](https://github.com/panique/php-login/wiki/Which-hashing-&-salting-algorithm-should-be-used-%3F)

## License

Licensed under [MIT](http://www.opensource.org/licenses/mit-license.php). You can use this script for free for any
private or commercial projects.

## Contribute

Please create a feature-branch if possible when committing to the project, if not then simply commit to master branch.

## Support

If you think this script is useful and saves you a lot of work, then think about supporting the project by renting
a server at [HOST1PLUS](https://affiliates.host1plus.com/ref/devmetal/36f4d828.html).

## I'm blogging...

at **[DEV METAL](http://www.dev-metal.com)**, mostly about PHP and IT-related stuff. Have a look if you like.
