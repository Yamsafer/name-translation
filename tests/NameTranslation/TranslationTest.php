<?php namespace NameTranslation;

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
     *Constructor that initalize the conifuration in the $app variable in order to be used
     * in the tests
     */
    public function __construct()
    {
        $this->app = [
                     'config' => [
                           'translation.default'  =>  'Rosette',
                           'translation.target'   =>  'en',
                           'translation.source'  =>  'ar',
                           'translation.connections'  =>  [
                                  'Google'    =>  [
                                              'url'    =>  'https://www.googleapis.com/language/translate/v2?key=',
                                              'key'   =>  'AIzaSyA1jrPsTAmP-5jaS4mx5RDQI4VNSpk1R90'
                                  ],
                                  'Rosette'   =>  [
                                              'url'   =>  'https://api.rosette.com/rest/v1/name-translation',
                                              'key'   =>  'b7e589a5df9577f0f2b22a73d5a9b4a2'
                                  ]
                           ],
                     ]
          ];
    }

    /**
     *Test the default Connection which is Rosette in this config
     *And run the translate method with the chosen connection on the given name
     *
     * @return void
     */
    public function testDefaultConnection_RosetteCanBeResolved()
    {
      $name = 'مانع سويحل النومسي'; //Mani' Suwayhil Alanawmisi
      $given_translation='Mani\' Suwayhil Alanawmisi';
      $driver = new TranslationManager($this->app);
      $result_translation=$driver->translate($name);
      $this->assertSame($given_translation,$result_translation);
    }

    /**
     *Test the Other Connection as a parameter for the connection method
     *And run the translate method with the chosen connection on the given name
     *
     * @return void
     */
    public function testOtherConnection_GoogleCanBeResolved()
    {
      $name = 'مانع سويحل النومسي'; //Mani' Suwayhil Alanawmisi
      $given_translation='Antiseptic';
      $driver = new TranslationManager($this->app);
      $result_translation=$driver->connection('Google')->translate($name);
      $this->assertSame($given_translation,$result_translation);
    }
}