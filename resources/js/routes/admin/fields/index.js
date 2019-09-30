import AdminFieldsIndexScreen from '~/views/admin/fields/AdminFieldsIndexScreen'
import AdminFieldsEditScreen from '~/views/admin/fields/AdminFieldsEditScreen'

export default [
    {
        name: 'admin.fields.index',
        path: 'fields',
        component: AdminFieldsIndexScreen,
        meta: {
            title: 'Manage Fields',
            description: 'Cras mattis consectetur purus sit amet fermentum.',
            icon: 'el-icon-price-tag',
        },
        children: [
            {
                name: 'admin.fields.edit',
                path: 'edit',
                component: AdminFieldsEditScreen,
                meta: {
                    title: 'Edit Field',
                    description: 'Cras mattis consectetur purus sit amet fermentum.',
                    icon: 'el-icon-price-tag',
                }
            }
        ]
    }
]