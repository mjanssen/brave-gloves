export function load (url, callback)
{
    var request = new XMLHttpRequest;

    request.open('GET', app.api.baseUrl + url, true);
    request.onload = (e) =>
    {
        callback(JSON.parse(request.responseText));
    };

    request.send();
}
