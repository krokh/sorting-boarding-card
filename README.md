# Boarding Card Sorting API

This PHP API sorts a stack of boarding cards and presents a description of the journey.

## How to Use

1. Clone the repository
2. Run `composer install`
3. Create a json file `input.json` of `BoardingCard` objects with the required information
4. Run `php index.php`

## Run the PHPUnit tests

`vendor/bin/phpunit tests`
The unit tests cover positive scenarios for sorting boarding cards and negative scenarios for handling invalid input.

## Extending the Code

To extend the code for new types of transportation, you can add them as needed to the `BoardingCard` class.