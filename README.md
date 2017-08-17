# name-translation

Transliterate the names in your content, don’t translate


## Getting Started

This package is constructed to allow users to translate names from a source language to a target language with two possible
connections (Rosette ,Google Translate).

After downloading the package, you need to set your API KEYs for the previously mentioned connections in the configuration file (config/name-translation.php).

Also, you need to assign them in the test file (tests/NameTranslation/TranslatioTest) if you want to run the used tests in the package.

By default,the translation will be held with the Rosette Connection from English to Arabic.

You can use the main method translate($name, $source, $target),
which take three parameters as
$name => The given name that you want to translate (must be given)
$source => The source language (optional _default = arabic);
$target => The source language (optional _default = english).


### Prerequisites

The requirements for this package are:

        php: ">=5.6.4",
        illuminate/support: "~5.0"

Also for the tests,you need to have the following in the require-dev:

        "phpunit/phpunit": "5.0.*"

Also, the test configuration includes the code coverage which can be enabled if you have Xdebug in your system. Xdebug can be installed via brew install:


brew install <php-version>-xdebug

eg.

brew install php56-xdebug


### Installing

Install the package via composer:

composer require Yamsafer/name-translation

Register the ServiceProvider in config/app.php

        'providers' => [
		// [...]
                Yamsafer\NameTranslation\TranslationServiceProvider::class,
        ],
You may also register the NameTranslation Facade:

        'aliases' => [
		// [...]
                'NameTranslation' => Yamsafer\NameTranslation\Facades\NameTranslationFacade::class,
        ],


## Run Tests

You can run the tests using the following command under the previously mentioned
specifications:

vendor/bin/phpunit tests/NameTranslation/TranslationTest.php

