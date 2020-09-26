<template>
    <div class="mr-4 w-xs">
        <div class="flex">
            <div class="border border-b-0 flex mx-2" :class="active ? 'border-solid' : 'border-dashed'">
                <div class="flex items-center px-4 py-2 bg-white dark:bg-dark-dark cursor-move">
                    <div class="font-medium mr-4" v-html="tab.name"></div>
                    <el-dropdown v-if="active" :show-timeout="50" placement="bottom" @command="handleCommand">
                        <i class="block el-icon-more cursor-pointer hover:text-brand"></i>
                        <el-dropdown-menu class="text-sm" slot="dropdown">
                            <el-dropdown-item command="rename" icon="el-icon-edit">Rename</el-dropdown-item>
                            <el-dropdown-item command="remove" icon="el-icon-close" divided>Remove</el-dropdown-item>
                        </el-dropdown-menu>
                    </el-dropdown>
                </div>
            </div>
        </div>
        <div class="border px-4 bg-white dark:bg-dark-dark" :class="active ? 'border-solid' : 'border-dashed'">
            <draggable v-model="tab.fields" group="fields" :emptyInsertThreshold="100">
                <field-layout-field v-for="fieldId in tab.fields" :key="fieldId" :field="fields.find(field => field.id === fieldId)" :active="active"/>
            </draggable>
            <div v-if="tab.fields.length < 1" class="p-4 text-center text-sm text-gray-500">
                Add some fields!
            </div>
        </div>

        <el-dialog title="Rename Tab" :visible.sync="renameDialogOpen">
            <el-form>
                <el-form-item label="Tab Name">
                    <el-input autocomplete="off" v-model="tab.name"></el-input>
                </el-form-item>
            </el-form>
            <div slot="footer" class="dialog-footer">
                <el-button @click="renameDialogOpen = false">Cancel</el-button>
                <el-button type="primary">Confirm</el-button>
            </div>
        </el-dialog>
    </div>
</template>

<script>
    import draggable from 'vuedraggable'

    export default {
        components: {
            draggable,
        },
        data: () => ({
            renameDialogOpen: false
        }),
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
        },
        methods: {
            handleCommand(command) {
                if(command === 'rename') {
                    this.renameDialogOpen = true;
                }
            }
        }
    }
</script>