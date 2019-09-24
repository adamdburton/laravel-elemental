import AdminElementsIndexScreen from '~modules/admin/elements/screens/AdminElementsIndexScreen'
import AdminElementsEditScreen from '~modules/admin/elements/screens/AdminElementsEditScreen'

export default [
    {
        name: 'admin.elements.index',
        path: '/admin/elements',
        component: AdminElementsIndexScreen,
        meta: {
            title: 'Manage Elements',
            description: 'Cras mattis consectetur purus sit amet fermentum.',
            icon: 'el-icon-copy-document',
        }
    },
    {
        name: 'admin.elements.edit',
        path: '/admin/elements/edit',
        component: AdminElementsEditScreen,
        meta: {
            title: 'Edit Element',
            description: 'Cras mattis consectetur purus sit amet fermentum.',
            icon: 'el-icon-copy-document',
        }
    }
]