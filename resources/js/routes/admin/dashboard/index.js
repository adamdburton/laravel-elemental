import Dashboard from '~modules/admin/dashboard/screens/AdminDashboardScreen';

export default [
    {
        name: 'admin.dashboard.index',
        path: '/admin/dashboard',
        component: Dashboard,
        meta: {
            title: 'Administration Dashboard',
            description: 'Configure system settings and manage the website.',
            icon: 'el-icon-s-operation'
        }
    }
]