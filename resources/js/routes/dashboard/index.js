import Dashboard from '~/views/dashboard/DashboardScreen';

export default [
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard,
        meta: {
            title: 'Your Dashboard',
            description: 'At-a-glance statistics and easy access to the things you do the most.',
            icon: 'el-icon-data-line'
        }
    }
]