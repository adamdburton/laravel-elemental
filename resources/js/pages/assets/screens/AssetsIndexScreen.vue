<template>
    <el-container>
        <el-aside :width="null" class="max-w-xs w-full mr-4 border-r bg-white dark:bg-dark-dark">
            <div class="border-b p-4">
                <h2>Asset Volumes</h2>
            </div>
            <el-menu default-active="2">
                <el-menu-item index="2" icon="el-icon-user">
                    <i class="el-icon-files"></i>
                    <span slot="title">Images</span>
                </el-menu-item>
                <el-menu-item index="3" icon="el-icon-user">
                    <i class="el-icon-files"></i>
                    <span slot="title">Files</span>
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

                </div>
            </section>
        </el-main>
    </el-container>
</template>

<script>
    export default {
        data: () => ({

        })
    }
</script>