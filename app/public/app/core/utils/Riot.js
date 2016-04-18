import riot from 'riot';

export function mount (name)
{
    riot.mount('div#application', name);
}
