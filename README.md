# name-translation

transliterate the names in your content, don’t translate

## Getting Started

This package is constructed to allow user to translate names from a source language to a target language with two possible connections (Rosette ,Google Translate).
After downloading the package, you need to set your API KEYs for the previously mentioned connections in the configuration file (config/nametranslation.php).
By default,the translation will be hold by Rosette Connection from English to Arabic .

### Prerequisites

The requirements for this package are:
        php: ">=5.6.4",
        illuminate/support: "~5.0"

### Installing

Install the package via composer: composer require Yamsafer/name-translation

Register the ServiceProvider in config/app.php

        'providers' => [
		// [...]
                Yamsafer\NameTranslation\NameTranslationServiceProvider::class,
        ],
You may also register the NameTranslation Facade:

        'aliases' => [
		// [...]
                'NameTranslation' => Yamsafer\NameTranslation\Facades\NameTranslationFacade::class,
        ],




