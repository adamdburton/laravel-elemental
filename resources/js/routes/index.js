import util from './util';
import auth from './auth';

import dashboard from './dashboard';
import assets from './assets';
import content from './content';
import admin from './admin';

const routes = [
    ...mapParents([
        ...dashboard,
        ...assets,
        ...auth,
        ...util,
        ...content,
        ...admin
    ])
];

function mapParents(routes, parent) {
    return routes.map((route) => {
        if (parent) {
            if (typeof route.meta === 'undefined') {
                route.meta = {};
            }

            route.meta.parent = parent;
        }

        if (route.children) {
            route.children = mapParents(route.children, route);
        }

        return route;
    });
}

//TODO: Tidy this

export default routes;
