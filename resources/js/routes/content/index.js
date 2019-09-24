import ContentIndexScreen from '~modules/content/screens/ContentIndexScreen'
import ContentEditScreen from '~modules/content/screens/ContentEditScreen'

export default [
    {
        name: 'content.index',
        path: '/content',
        component: ContentIndexScreen,
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