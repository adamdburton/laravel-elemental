import Splash from '~modules/util/screens/SplashScreen';
import NotFound from '~modules/util/screens/NotFoundScreen';

export default [
    {
        name: 'splash',
        path: '/',
        component: Splash,
    },
    {
        path: '*',
        component: NotFound
    }
]