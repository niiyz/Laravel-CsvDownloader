# Laravel-CsvDownloader for Laravel 5

Laravel-CsvDownloader is Very Simple Csv Downloader

#Installation

Require this package in your `composer.json` and update composer.

```php
"niiyz/laravel-csv": "~0.1"
```

After updating composer, add the ServiceProvider to the providers array in `config/app.php`

```php
'Niiyz\Csv\CsvServiceProvider',
```

You can use the facade for shorter code. Add this to your aliases:

```php
'Csv'       => 'Niiyz\Csv\Facades\Csv',
```

The class is bound to the ioC as `csv`

```php
use Csv;
```

Sample.1
```php
Csv::create([[1, 2, 3], [10, 20, 30]], []);
Csv::convertEncoding('UTF-8', 'SJIS-win');// ex. Japanese
return Csv::download('sample.csv');
```

Sample.2
```php
$users = \User::where('type', '=', '1')->get(['name', 'birth_day'])->toArray();// from DB
$header = ['customer', 'birthday'];
Csv::create($users, $header);
Csv::convertEncoding('UTF-8', 'SJIS-win');// ex. Japanese
return Csv::download('customers.csv');
```
