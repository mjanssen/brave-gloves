import riot from 'riot';

export default function () {

    this.init = function ()
    {
        require('../../../pages/application/Index');
        riot.mount('index');
    }
}
