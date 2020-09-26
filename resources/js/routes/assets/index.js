import AssetsIndexScreen from '~/pages/assets/screens/AssetsIndexScreen'

export default [
    {
        name: 'assets.index',
        path: '/assets',
        components: {
            default: AssetsIndexScreen
            // sidebar:
        },
        meta: {
            title: 'Assets',
            description: 'Cras mattis consectetur purus sit amet fermentum.',
            icon: 'el-icon-files',
        }
    }
]