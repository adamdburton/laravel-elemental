import Splash from '../components/screens/SplashScreen';
import NotFound from '../components/screens/NotFoundScreen';
import Login from '../components/screens/auth/LoginScreen';
import Forgot from '../components/screens/auth/ForgotScreen';
import Dashboard from '../components/screens/DashboardScreen';

export default [
    {
        name: 'splash',
        path: '/',
        component: Splash,
    },
    {
        name: 'auth.login',
        path: '/auth',
        component: Login
    },
    {
        name: 'auth.forgot',
        path: '/auth/forgot',
        component: Forgot
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard
    },
    {
        path: "*",
        component: NotFound
    }
]
