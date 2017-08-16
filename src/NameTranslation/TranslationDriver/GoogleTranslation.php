<?php namespace NameTranslation\TranslationDriver;

use \NameTranslation\TranslationInterface;
use \NameTranslation\Client;

class GoogleTranslation implements TranslationInterface
{
    /**
     * The driver that is constructed in this class
     * @var string
     */
    protected $driver = 'Google';

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
        $this->client = $client;
        $this->app = $app;
        $this->url   = $this->client->getUrl($this->app, $this->driver);
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
    public function translate($name, $source = 'ar', $target = 'en')
    {
        $request_url = $this->url.$this->key;
        $headers = ["Content-Type:application/json"];
        $body = [
           "q" => $name,
           "target" => $target,
           "source"=> $source
        ];
        $translation = $this->handelRequest($request_url, $headers, $body);
        $translation = $translation['data']['translations'][0]['translatedText'];

        return $translation;
    }

    /**
     * Handle the Http POST Request with the given url, header, body and return
     * the request response decoded with JSON
     *
     * @param  string $request_url Request URL
     * @param  string $headers Requset Header
     * @param  string $body Requset Body
     * @return Json Object The Requset's response
     */
    public function handelRequest($request_url, $headers, $body)
    {
        $handle = $this->client->constructRequest($request_url, $headers, $body);
        $responseDecoded = $this->client->getResponse($handle);
        $responseCode = $this->client->close($handle);

        return $responseDecoded;
    }
}