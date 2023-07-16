# laravel-repository-interface
This package is intended to create a Command to create a repository and an Interface


## Installation

You can install the package via composer for latest version
```bash
$ composer require medjadji/laravel-repository-interface
```
## How To Use 

```bash
# Create a repository with interface at The Same Time
$ php artisan make:repository-interface Auth/User Auth/User 


```
┌── `apps` \
├─  └─ `Repositories` \
├─  └──── `Auth` \
├─  └─────── `UserRepository.php` \
├─  └─ `Interface` \
├─  └──── `Auth` \
├─  └─────── `UserInterface.php` \
├─  `bootstrap` \
├─  `config` \
├─  `database` \
├─  `public` \
├─  `resources` \
├─  `routs` \
├─  `storage` \
├─  `tests` \
├─  `vendor` \
├─  `.env.example` \
├─  `artisan` \
├─  `composer.json` \
├─  `package.json` \
└── `README.md`

```bash
# Create a interface 
$ php artisan make:interface Company/Apply
# Create a repository 
$ php artisan make:repository Company/Apply

```

┌── `apps` \
├─  └─ `Repositories` \
├─  └──── `Company` \
├─  └─────── `ApplyRepository.php` \
├─  └─ `Interface` \
├─  └──── `Company` \
├─  └─────── `ApplyInterface.php` \
├─  `bootstrap` \
├─  `config` \
├─  `database` \
├─  `public` \
├─  `resources` \
├─  `routs` \
├─  `storage` \
├─  `tests` \
├─  `vendor` \
├─  `.env.example` \
├─  `artisan` \
├─  `composer.json` \
├─  `package.json` \
└── `README.md`

