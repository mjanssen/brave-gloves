import riot from 'riot';

var template = require('./templates/SubHeading.html');

riot.tag('SubHeading', template,

    function (opts)
    {
        this.title = opts.title;
        this.class = opts.class;
    }
);
