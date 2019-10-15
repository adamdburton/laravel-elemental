<template>
    <div class="mr-4 w-xs">
        <div class="border-2 border-b-0 mx-2" :class="active ? 'border-solid' : 'border-dashed'">
            <div class="flex items-center px-4 py-2 bg-white dark:bg-dark-dark">
                <el-tooltip content="Drag to move and reorder tabs" :open-delay="1000">
                    <i class="el-icon-rank cursor-move hover:text-brand tab-reorder-handle mr-3"></i>
                </el-tooltip>
                <div class="flex-1 font-medium mr-4" v-html="tab.name"></div>
                <el-dropdown v-if="active" :show-timeout="50" placement="bottom">
                    <i class="block el-icon-arrow-down cursor-pointer hover:text-brand"></i>
                    <el-dropdown-menu class="text-sm" slot="dropdown">
                        <el-dropdown-item icon="el-icon-edit">Rename</el-dropdown-item>
                        <el-dropdown-item icon="el-icon-close" divided>Remove</el-dropdown-item>
                    </el-dropdown-menu>
                </el-dropdown>
            </div>
        </div>
        <div class="border-2 px-4 bg-white dark:bg-dark-dark" :class="active ? 'border-solid' : 'border-dashed'">
            <div v-if="tab.fields.length < 1" class="p-4 text-center text-sm text-gray-500">
                Drag fields here!
            </div>
            <draggable v-model="tab.fields" group="fields" handle=".field-reorder-handle">
                <field-layout-field v-for="fieldId in tab.fields" :key="fieldId" :field="fields.find(field => field.id === fieldId)" :active="active" />
            </draggable>
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