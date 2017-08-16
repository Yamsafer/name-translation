<?php namespace NameTranslation;

Interface TranslationInterface
{
    /**
     *Translate given name from the source language to the target language
     *
     * @param  string $name The given name
     * @param  string $source The source language
     * @param  string $target The target language
     * @return string The translated name
     */
    public function translate($name, $source, $target);

    /**
     * Handle the Http POST Request with the given url, header, body and return
     * the request response decoded with JSON
     *
     * @param  string $request_url Request URL
     * @param  string $headers Requset Header
     * @param  string $body Requset Body
     * @return Json Object The Requset's response
     */
    public function handelRequest($request_url, $headers, $body);
}
