<template>
    <el-container>
        <el-aside :width="null" class="max-w-xs w-full -mt-4 -ml-4 -mb-4 mr-4 border-r bg-white dark:bg-dark-dark">
            <div class="border-b p-4">
                <h2>Field Groups</h2>
            </div>
            <el-menu default-active="2">
                <el-menu-item index="2" icon="el-icon-user">
                    <i class="el-icon-document"></i>
                    <span slot="title">Pages</span>
                </el-menu-item>
                <el-menu-item index="3" icon="el-icon-user">
                    <i class="el-icon-link"></i>
                    <span slot="title">Callouts</span>
                </el-menu-item>
            </el-menu>
        </el-aside>
        <el-main>
            <section>
                <template slot="title">
                    <page-header>
                        <template slot="buttons">
                            <el-button type="primary" icon="el-icon-plus">New Field</el-button>
                        </template>
                    </page-header>
                </template>

                <div class="bg-white dark:bg-dark-dark shadow-lg">
                    <element-table :elements="fields" :properties="properties"></element-table>
                </div>
            </section>
        </el-main>
    </el-container>
</template>

<script>
    export default {
        data: () => ({
            properties: [
                {
                    property: 'label',
                    label: 'Label'
                },
                {
                    property: 'type',
                    label: 'Type'
                },
                {
                    property: 'class',
                    label: 'Class'
                }
            ],
            fields: Array(6).fill({
                label: 'Bibendum Porta',
                type: 'Curabitur blandit.',
                class: 'Lorem Cras Elit',
            },)
        })
    }
</script>