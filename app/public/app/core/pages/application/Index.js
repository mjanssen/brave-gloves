import riot from 'riot';

var template = require('./templates/Index.html');

import 'elements/global/PageHeader';

riot.tag('index', template,

    function (opts)
    {
        this.demoButton.addEventListener('click', function () {
            app.router.setRoute('/user/demo');
        });

        riot.mount('PageHeader');
    }
);
