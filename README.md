![BEON LOGO](https://beon.studio/blog/wp-content/themes/twentybeon/app/images/beon-purple.png)

# PHP Coding Exercise

Before joining the coding exercise, you should have set up the local environment for the application.

Consider having installed:
- Composer (for ubuntu: sudo apt install composer)
- PHP 7.3^ and extension: php-xml (for ubuntu: sudo apt install php-xml)

Steps:

1. Clone this repository
2. Run `composer install`
3. Run `./vendor/bin/phpunit tests/ClientTest.php` and `./vendor/bin/phpunit tests/BookingTest.php` (requires php >= 7.3 if you use other version please update composer.json file first)

Also, we recommend you read the code so that you are not caught off guard.

# What does the coding interview looks like?

The coding interview session will be more like a pair programming exercise, we will request you to implement a feature, solve bugs or give code advice. You will be able to use Google and any documentation that can help you. Instructions will be provided in the live coding session.

# Extra details

To add the phone validation feature you should use the following API: https://numverify.com/documentation considering US numbers.

# Basic requirements

- Your preferred IDE / Code Editor
- PHP >= 7.3
- Composer
- Git

## Libraries used:

- PHP Unit ^9.2
