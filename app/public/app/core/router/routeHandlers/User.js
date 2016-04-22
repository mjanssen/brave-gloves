export default function (moduleHandler)
{
    this.index = function ()
    {
        app.log('User page not yet implemented!');
    };

    this.demo = function ()
    {
        moduleHandler.set('UserDemo');
    };
}
