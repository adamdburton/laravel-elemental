import VueRouter from "vue-router";
import routes from "./routes";

const router = new VueRouter({
    mode: 'history',
    base: '/' + location.pathname.split('/')[1] + '/',
    routes: routes
});

// Check auth

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        // this route requires auth, check if logged in
        // if not, redirect to login page.
        if (!auth.loggedIn()) {
            next({
                path: '/login',
                query: {intended: to.fullPath}
            })
        } else {
            next();
        }
    } else {
        next();
    }
});

// Set page title

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

// Load data for routes

router.beforeEach((to, from, next) => {
    if (typeof to.meta.data === 'function') {
        to.meta.data(to).then(data => to.meta.$data = data).then(next);
    } else {
        next();
    }
});

export default router;
