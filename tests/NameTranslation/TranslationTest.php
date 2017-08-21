<?php

namespace NameTranslation;

use NameTranslation\TranslationManager;

class  TranslationTest extends \PHPUnit_Framework_TestCase
{
    /**
    * The application instance.
    *
    * @var \Illuminate\Foundation\Application
    */
    protected $app;

    /**
     * Constructor that initalize the conifuration in the $app variable in order to be used
     * in the tests
     */
    public function __construct()
    {
        $this->app = [
            'config' => [
                'name-translation.default'   =>  'rosette',
                'name-translation.connections'   => [
                    'google'    => [
                        'url'   =>  'https://www.googleapis.com/language/translate/v2?key=',
                        'key'   =>  '',
                    ],
                    'rosette'   => [
                        'url'   => 'https://api.rosette.com/rest/v1/name-translation',
                        'key'   => 'b7e589a5df9577f0f2b22a73d5a9b4a2',
                    ]
                ],
            ]
        ];
    }

    /**
     * Test the default Connection which is Rosette in this config
     * And run the translate method with the chosen connection on the given name
     *
     * @return void
     */
    public function testDefaultConnection_RosetteCanBeResolved()
    {
        $name = 'مانع سويحل النومسي'; // Mani' Suwayhil Alanawmisi
        $givenTranslation = 'Mani\' Suwayhil Alanawmisi';

        $driver = new TranslationManager($this->app);

        $resultTranslation = $driver->translate($name);
        $this->assertSame($givenTranslation, $resultTranslation);
    }

    /**
     * Test the Other Connection as a parameter for the connection method
     * And run the translate method with the chosen connection on the given name
     *
     * @return void
     */
    public function testOtherConnection_GoogleCanBeResolved()
    {
        $name = 'مانع سويحل النومسي'; // Mani' Suwayhil Alanawmisi
        $givenTranslation='Antiseptic';

        $driver = new TranslationManager($this->app);

        $resultTranslation = $driver->connection('Google')->translate($name);
        $this->assertSame($givenTranslation, $resultTranslation);
    }
}
