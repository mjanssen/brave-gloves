import riot from 'riot';

var template = require('./templates/Index.html');

import 'elements/global/PageHeader';

riot.tag('index', template,

    function (opts)
    {
        riot.mount('PageHeader');
    }
);
