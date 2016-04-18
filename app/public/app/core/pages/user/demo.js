import riot from 'riot';

var template = require('./templates/Demo.html');

import 'elements/global/PageHeader';

riot.tag('demo', template,

    function (opts)
    {
        riot.mount('PageHeader');
    }
);
