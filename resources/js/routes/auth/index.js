import Login from '~/pages/auth/LoginScreen';
import Forgot from '~/pages/auth/ForgotScreen';
import Reset from "~/pages/auth/ResetPasswordScreen";

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
    },
    {
        name: 'auth.reset',
        path: '/auth/reset',
        component: Reset,
        meta: {
            layout: 'modal'
        }
    }
]