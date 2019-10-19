<template>
    <div class="mr-4 w-xs">
        <div class="flex">
            <div class="border-2 border-b-0 flex mx-2" :class="active ? 'border-solid' : 'border-dashed'">
                <div class="flex items-center px-4 py-2 bg-white dark:bg-dark-dark cursor-move">
                    <div class="font-medium mr-4" v-html="tab.name"></div>
                    <el-dropdown v-if="active" :show-timeout="50" placement="bottom">
                        <i class="block el-icon-more cursor-pointer hover:text-brand"></i>
                        <el-dropdown-menu class="text-sm" slot="dropdown">
                            <el-dropdown-item icon="el-icon-edit">Rename</el-dropdown-item>
                            <el-dropdown-item icon="el-icon-close" divided>Remove</el-dropdown-item>
                        </el-dropdown-menu>
                    </el-dropdown>
                </div>
            </div>
        </div>
        <div class="border-2 px-4 bg-white dark:bg-dark-dark" :class="active ? 'border-solid' : 'border-dashed'">
            <draggable v-model="tab.fields" group="fields" :emptyInsertThreshold="100">
                <field-layout-field v-for="fieldId in tab.fields" :key="fieldId" :field="fields.find(field => field.id === fieldId)" :active="active" />
            </draggable>
            <div v-if="tab.fields.length < 1" class="p-4 text-center text-sm text-gray-500">
                Add some fields!
            </div>
        </div>
    </div>
</template>

<script>
    import draggable from 'vuedraggable'

    export default {
        components: {
            draggable,
        },
        props: {
            tab: {
                type: Object,
                default: () => ({})
            },
            active: {
                type: Boolean,
                default: true
            },
            fields: {
                type: Array,
                default: () => ([])
            }
        }
    }
</script>