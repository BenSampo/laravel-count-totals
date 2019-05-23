# About

Inspired by [Jonathan Reinink's](https://reinink.ca) post about [Calculating totals in Laravel using conditional aggregates](https://reinink.ca/articles/calculating-totals-in-laravel-using-conditional-aggregates) I've created an elegant way to grab multiple totals in an efficient way.

Please see the post for details about what this package aims to solve.

## Install

```
composer require bensampo/laravel-count-totals
```

## Usage

Given the following `subscribers` table structure:

name | status
|---|---|
Adam Campbell | confirmed
Taylor Otwell | confirmed
Jonathan Reinink | bounced
Adam Wathan	| cancelled

```php
$totals = Subscriber::countTotals([
    ['status' => 'confirmed'],
    ['status' => 'cancelled'],
    ['name' => 'Jonathan Reinink'],
]);

$totals->confirmed // 2
$totals->cancelled // 1
$totals->jonathanReinink // 1
```

You may also use the `DB` facade:

```php
$totals = DB::table('subscribers')->countTotals([
    ['status' => 'confirmed'],
    ['status' => 'cancelled'],
    ['name' => 'Jonathan Reinink'],
]);
```