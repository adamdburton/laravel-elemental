<template>
    <div class="border-2 px-4 py-2 cursor-move flex items-center justify-between my-4 bg-white dark:bg-dark-dark" :class="active ? 'border-solid' : 'border-dashed'">
        <el-tooltip>
            <div slot="content" class="font-mono">{{ field.slug }}</div>
            <div class="mr-2" v-html="field.name"></div>
        </el-tooltip>
        <div class="flex-1"></div>
        <el-dropdown v-if="active" :show-timeout="50" placement="bottom" @command="handleSettingsDropdown">
            <i class="block el-icon-more cursor-pointer hover:text-brand"></i>
            <el-dropdown-menu class="text-sm" slot="dropdown">
                <el-dropdown-item command="showSettings" icon="el-icon-setting">Configure</el-dropdown-item>
                <el-dropdown-item icon="el-icon-close" divided>Remove</el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>

        <el-drawer title="Configure Field" direction="rtl" :before-close="handleSettingsDrawerClose" :visible.sync="settingsShown">
            <div class="px-4">
                <el-form>
                    <el-form-item label="Name">
                        <el-input autocomplete="off"></el-input>
                    </el-form-item>
                    <el-form-item label="Area">
                        <el-select placeholder="Please select activity area">
                            <el-option label="Area1" value="shanghai"></el-option>
                            <el-option label="Area2" value="beijing"></el-option>
                        </el-select>
                    </el-form-item>
                </el-form>
                <div class="demo-drawer__footer">
                    <el-button @click="settingsShown = false">Cancel</el-button>
                    <el-button type="primary" :loading="settingsLoading">{{ settingsLoading ? 'Loading...' : 'Save' }}</el-button>
                </div>
            </div>
        </el-drawer>
    </div>
</template>

<script>
    export default {
        data: () => ({
            settingsShown: false,
            settingsLoading: false
        }),
        props: {
            field: {
                type: Object,
                default: () => ({
                    id: 0,
                    name: 'Undefined',
                    slug: 'undefined'
                })
            },
            active: {
                type: Boolean,
                default: true
            },
        },
        methods: {
            handleSettingsDrawerClose(done) {
                done();
            },
            handleSettingsDropdown(command) {
                if (command === 'showSettings') {
                    this.settingsShown = true;
                }
            },
        }
    }
</script>