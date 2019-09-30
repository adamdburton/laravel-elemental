import AdminDashboardScreen from '~/views/admin/dashboard/AdminDashboardScreen'

export default [
    {
        name: 'admin.dashboard.index',
        path: 'dashboard',
        component: AdminDashboardScreen,
        meta: {
            title: 'Administration Dashboard',
            description: 'Configure system settings and manage the website.',
            icon: 'el-icon-s-operation'
        },
    }
]