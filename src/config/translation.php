<?php

/**
 * package Configuration is here
 */
return [

    'default'  =>  'Rosette',
    'target'   =>  'en',
    'source'  =>  'ar',
    'connections'  =>  [
            'Google'    =>  [
                        'url'    =>  'https://www.googleapis.com/language/translate/v2?key=',
                        'key'   =>  'AIzaSyA1jrPsTAmP-5jaS4mx5RDQI4VNSpk1R90'
            ],
            'Rosette'   =>  [
                        'url'   =>  'https://api.rosette.com/rest/v1/name-translation',
                        'key'   =>  'b7e589a5df9577f0f2b22a73d5a9b4a2'
            ]
    ],
];
