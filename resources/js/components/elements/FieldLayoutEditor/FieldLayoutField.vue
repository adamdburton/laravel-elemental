<template>
    <div class="border-2 px-4 py-2 flex items-center justify-between my-4 bg-white dark:bg-dark-dark" :class="active ? 'border-solid' : 'border-dashed'">
        <el-tooltip content="Drag to move and reorder fields" :open-delay="1000">
            <i class="el-icon-rank cursor-move hover:text-brand field-reorder-handle mr-3"></i>
        </el-tooltip>
        <el-tooltip>
            <div slot="content" class="font-mono">{{ field.slug }}</div>
            <div class="mr-2" v-html="field.name"></div>
        </el-tooltip>
        <div class="flex-1"></div>
        <el-dropdown v-if="active" :show-timeout="50" placement="bottom">
            <i class="block el-icon-arrow-down cursor-pointer hover:text-brand"></i>
            <el-dropdown-menu class="text-sm" slot="dropdown">
                <el-dropdown-item icon="el-icon-setting">Configure</el-dropdown-item>
                <el-dropdown-item icon="el-icon-close" divided>Remove</el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
    </div>
</template>

<script>
    export default {
        props: {
            field: {
                type: Object,
                default: () => ({
                    name: 'Undefined'
                })
            },
            active: {
                type: Boolean,
                default: true
            },
        }
    }
</script>