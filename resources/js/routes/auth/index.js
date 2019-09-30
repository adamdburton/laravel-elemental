import Login from '~/views/auth/LoginScreen';
import Forgot from '~/views/auth/ForgotScreen';

export default [
    {
        name: 'auth.login',
        path: '/auth',
        component: Login,
        meta: {
            layout: 'modal'
        }
    },
    {
        name: 'auth.forgot',
        path: '/auth/forgot',
        component: Forgot,
        meta: {
            layout: 'modal'
        }
    }
]