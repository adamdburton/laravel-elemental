import Splash from '~/pages/util/SplashScreen';
import NotFound from '~/pages/util/NotFoundScreen';

export default [
    {
        name: 'splash',
        path: '/',
        component: Splash,
        meta: {
            layout: 'blank'
        }
    },
    {
        name: '404',
        path: '*',
        component: NotFound,
        meta: {
            layout: 'modal'
        }
    }
]