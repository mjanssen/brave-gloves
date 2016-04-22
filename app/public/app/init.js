(function init() {

    window.app = {};

    app.log = function (message, color = '#FF0044')
    {
        console.log('%c ' + message + ' ', 'background: ' + color + '; color: #ECECEC');
    };

    app.api = {
        baseUrl: '//api.bravegloves.dev/'
    };

    app.router = {};
})();
