<?php

namespace NameTranslation\TranslationDriver;

use NameTranslation\Client;
use NameTranslation\TranslationInterface;

class RosetteTranslation implements TranslationInterface
{
    /**
     * The driver that is constructed in this class
     * @var string
     */
    protected $driver = 'rosette';

    /**
    * The application instance.
    *
    * @var \Illuminate\Foundation\Application
    */
    protected $app;

    /**
     * The driver API url
     * @var string
     */
    protected $url;

    /**
     * The driver API KEY
     * @var string
     */
    protected $key;

    /**
     * The Client
     * @var Client
     */
    protected $client;

     /**
     * Constructor
     *
     * @param Client $client
     * @param \Illuminate\Foundation\Application $app
     */
    public function __construct(Client $client, $app)
    {
        $this->app = $app;
        $this->client = $client;
        $this->url = $this->client->getUrl($this->app, $this->driver);
        $this->key = $this->client->getKey($this->app, $this->driver);
    }

    /**
     * Translate given name from the source language to the target language
     *
     * @param  string $name A given name
     * @param  string $source Source language
     * @param  string $target Target language
     * @return string The translated name
     */
    public function translate($name, $source = 'ar', $target = 'eng')
    {
        $headers = ['Content-Type:application/json', 'X-RosetteAPI-Key:'.$this->key];
        $body = [
            'name' => $name,
            'targetLanguage' => $target
        ];

        $requestUrl = $this->url;
        $translation = $this->handelRequest($requestUrl, $headers, $body);
        $translation = $translation['translation'];

        return $translation;
    }

    /**
     * Handle the Http POST Request with the given url, header, body and return
     * the request response decoded with JSON
     *
     * @param  string $requestUrl Request URL
     * @param  string $headers Requset Header
     * @param  string $body Requset Body
     * @return Json Object The Requset's response
     */
    public function handelRequest($requestUrl, $headers, $body)
    {
        $handle = $this->client->constructRequest($requestUrl, $headers, $body);
        $responseDecoded = $this->client->getResponse($handle);
        $responseCode = $this->client->close($handle);

        return $responseDecoded;
    }
}
