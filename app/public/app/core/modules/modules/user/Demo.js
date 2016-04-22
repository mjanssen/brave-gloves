import {mount} from 'utils/Riot';

export default function () {

    this.init = function ()
    {
        require('../../../pages/user/Demo');
        mount('demo');
    }
}
