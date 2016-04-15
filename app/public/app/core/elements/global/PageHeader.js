import Riot from 'riot';

var template = require('./templates/PageHeader.html');

Riot.tag('PageHeader', template,

    function (opts)
    {
        this.title = opts.title;
        
        Riot.mount('PageTitle');
    }
);
