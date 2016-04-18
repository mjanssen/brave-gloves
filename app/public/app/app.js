'use strict';

import './init';
import Router from './core/router/Router';

import Riot from 'riot';
import './core/elements/global/PageTitle';
import './core/elements/global/PageHeader';

var r = new Router();
r.init();

Riot.mount('PageHeader');
