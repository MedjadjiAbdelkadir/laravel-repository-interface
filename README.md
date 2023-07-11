# laravel-repository-interface
This package is intended to create a Command to create a repository and an Interface


## Installation

You can install the package via composer for latest version
```bash
$ composer require medjadji/laravel-repository-interface
```
## How To Use 

```bash
$ php artisan make:interface Company/Apply
$ php artisan make:repository Company/Apply

```


┌── `apps` \
├─  └─── `Repositories` \
├─  └──────── `Company` \
├─  └────────── `ApplyRepository` \
├─  └─── `Interface` \
├─  └──────── `Company` \
├─  └──────────  `ApplyInterface` \
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

