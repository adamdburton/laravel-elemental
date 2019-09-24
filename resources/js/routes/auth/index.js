import Login from '~modules/auth/screens/LoginScreen';
import Forgot from '~modules/auth/screens/ForgotScreen';

export default [
    {
        name: 'auth.login',
        path: '/auth',
        component: Login,
    },
    {
        name: 'auth.forgot',
        path: '/auth/forgot',
        component: Forgot
    }
]