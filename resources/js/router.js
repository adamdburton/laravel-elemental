import VueRouter from "vue-router";
import routes from "./routes";

const router = new VueRouter({
    mode: 'history',
    base: '/' + location.pathname.split('/')[1] + '/',
    routes: routes
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        // this route requires auth, check if logged in
        // if not, redirect to login page.
        if (!auth.loggedIn()) {
            next({
                path: '/login',
                query: {redirect: to.fullPath}
            })
        } else {
            next()
        }
    } else {
        next() // make sure to always call next()!
    }
});

const originalTitle = document.title;

router.beforeEach((to, from, next) => {
    let nearestWithTitle = to.matched.slice().reverse().find(r => r.meta && r.meta.title);

    if (nearestWithTitle) {
        document.title = nearestWithTitle.meta.title + ' • ' + originalTitle;
    } else {
        document.title = originalTitle;
    }

    next();
});

export default router;
