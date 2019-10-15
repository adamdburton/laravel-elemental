import AdminDashboardScreen from '~/pages/admin/dashboard/AdminDashboardScreen'
import AdminDashboardEditorScreen from '~/pages/admin/dashboard/AdminDashboardEditorScreen';

export default [
    {
        name: 'admin.dashboard.index',
        path: 'dashboard',
        component: AdminDashboardScreen,
        meta: {
            title: 'Administration Dashboard',
            description: 'Configure system settings and manage the website.',
            icon: 'el-icon-s-operation'
        }
    },
    {
        name: 'admin.dashboard.editor',
        path: 'editor',
        component: AdminDashboardEditorScreen,
        meta: {
            title: 'Field Layout Editor',
            description: 'Cras mattis consectetur purus sit amet fermentum.',
            icon: 'el-icon-price-tag',
        }
    }
]