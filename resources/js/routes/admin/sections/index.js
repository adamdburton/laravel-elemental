import AdminSectionsIndexScreen from "~/pages/admin/sections/AdminSectionsIndexScreen";
import AdminSectionEditScreen from "~/pages/admin/sections/AdminSectionEditScreen";
import api from "~/api";

export default [
    {
        name: 'admin.sections.index',
        path: 'sections',
        component: AdminSectionsIndexScreen,
        meta: {
            title: 'Manage Sections',
            description: 'Cras mattis consectetur purus sit amet fermentum.',
            icon: 'el-icon-notebook-2',
            data: async () => ({
                sections: await api.get('section', true)
            })
        },
        children: [
            {
                name: 'admin.sections.edit',
                path: 'edit',
                component: AdminSectionEditScreen,
                meta: {
                    title: 'Edit Field',
                    description: 'Cras mattis consectetur purus sit amet fermentum.',
                    icon: 'el-icon-price-tag',
                }
            }
        ]
    }
]