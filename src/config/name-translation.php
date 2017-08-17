<?php

/**
 * package Configuration is here
 */
return [

    'default'   =>  'rosette',
    'connections'   =>  [
        'google'   =>   [
            'url'   =>  'https://www.googleapis.com/language/translate/v2?key=',
            'key'   =>  ''
        ],
        'rosette'   =>  [
            'url'   =>  'https://api.rosette.com/rest/v1/name-translation',
            'key'   =>  ''
        ]
    ],
];

