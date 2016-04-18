import riot from 'riot';

var template = require('./templates/PageHeader.html');

riot.tag('PageHeader', template,

    function (opts)
    {
        this.title = opts.title;
        this.class = opts.class;

//         this.demoButton.addEventListener('click', function ()
//         {
//             console.log('sdfsdf');
//         });
    }
);
