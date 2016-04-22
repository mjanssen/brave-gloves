import riot from 'riot';

export function mount (name)
{
    // Mount the page
    riot.mount('div#application', name);
}
