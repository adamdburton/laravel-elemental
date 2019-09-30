import ContentIndexScreen from '~/views/content/screens/ContentIndexScreen'
import ContentEditScreen from '~/views/content/screens/ContentEditScreen'

import PageHeader from "~elements/PageHeader";

export default [
    {
        name: 'content.index',
        path: '/content',
        components: {
            default: ContentIndexScreen
            // sidebar:
        },
        meta: {
            title: 'Manage Content',
            description: 'Cras mattis consectetur purus sit amet fermentum.',
            icon: 'el-icon-notebook-2',
        }
    },
    {
        name: 'content.edit',
        path: '/content/edit',
        component: ContentEditScreen,
        meta: {
            title: 'Edit Content',
            description: 'Cras mattis consectetur purus sit amet fermentum.',
            icon: 'el-icon-notebook-2',
        }
    }
]