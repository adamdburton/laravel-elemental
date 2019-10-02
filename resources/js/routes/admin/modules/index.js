import AdminModulesIndexScreen from '~/views/admin/modules/AdminModulesIndexScreen'
import api from "~/api";

export default [
    {
        name: 'admin.modules.index',
        path: 'modules',
        component: AdminModulesIndexScreen,
        meta: {
            title: 'Manage Modules',
            description: 'Cras mattis consectetur purus sit amet fermentum.',
            icon: 'el-icon-box',
            data: async () => ({
                modules: await api.get('module', true)
            })
        }
    }
]