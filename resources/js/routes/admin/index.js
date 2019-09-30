import dashboard from './dashboard';
import modules from './modules';
import fields from './fields';

export default [
    {
        name: 'admin.index',
        path: '/admin',
        component: {
            render (c) { return c('router-view') }
        },
        children: [
            ...dashboard,
            ...modules,
            ...fields,
        ]
    }
]