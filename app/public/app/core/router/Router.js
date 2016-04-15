import Riot from 'riot';

Riot.route('/test', function (name) {
    console.log('The list of fruits')
});

Riot.route.start();
