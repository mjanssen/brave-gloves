import * as modules from './Modules';

export default function ()
{
    var module = {};

    this.set = function (moduleName)
    {
        module = new modules[capitalizeFirstLetter(moduleName)];
        initModule(module);
    };

    var initModule = function (module)
    {
        module.init();
    };

    var capitalizeFirstLetter = function (string)
    {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }
}
