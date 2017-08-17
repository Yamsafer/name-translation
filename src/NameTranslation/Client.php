<?php

namespace NameTranslation;

class Client
{
    /**
     * Get HTTP code and Closes the given cURL session and frees all resources
     *
     * @param cURL handle $handel
     * @return integer Last received HTTP code
     */
    public function close($handle)
    {
        $responseCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        curl_close($handle);
        return $responseCode;
    }

    /**
     * Get the url for the given diver from the configuration file
     *
     * @param  \Illuminate\Foundation\Application $app
     * @param  string $driver The given driver
     * @return string The driver API url
     */
    public function  getUrl($app, $driver)
    {
        return $app['config']['translation.connections'][$driver]['url'];
    }

    /**
     * Get the key for the given diver from the configuration file
     *
     * @param  \Illuminate\Foundation\Application $app
     * @param  string $driver The given driver
     * @return string The driver API key
     */
    public function  getKey($app, $driver)
    {
        return $app['config']['translation.connections'][$driver]['key'];
    }

    /**
     * Initialize a cURL session with the given settings for the header and post fields
     *
     * @param  string $url The Http post requset API url
     * @param  array $header The Http post request headers
     * @param  array $body The Http post request body
     * @return curl handel
     */
    public function constructRequest($url, $headers, $body)
    {
        $handle = curl_init($url);
        curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($handle, CURLOPT_POSTFIELDS, json_encode($body));

        return $handle;
    }

    /**
     * Execute the given cURL session
     *
     * @param  curl handel $handle
     * @return JSON Object Response for the Http request
     */
    public function getResponse($handle)
    {
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($handle);
        $responseDecoded = json_decode($response, true);

        return $responseDecoded;
    }
}
