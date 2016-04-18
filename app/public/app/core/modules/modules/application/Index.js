import {mount} from 'utils/Riot';

export default function () {

    this.init = function ()
    {
        require('../../../pages/application/Index');
        mount('index');
    }
}
