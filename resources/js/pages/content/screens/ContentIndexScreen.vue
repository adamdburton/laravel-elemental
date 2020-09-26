<template>
    <section class="p-4">
        <template slot="sidebar">
            <el-aside :width="null" class="max-w-xs w-full bg-white dark:bg-dark-dark border-r p-4">
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
        </template>

        <template slot="title">
            <page-header>
                <template slot="buttons">
                    <el-button type="primary" icon="el-icon-plus">New Page</el-button>
                </template>
            </page-header>
        </template>
        <div class="bg-white dark:bg-dark-dark shadow-lg">
            <element-tree :elements="elements"></element-tree>
        </div>
    </section>
</template>

<script>
    export default {
        data: () => ({
            elements: [
                {
                    id: 1,
                    label: 'Home',
                    uri: '/'
                },
                {
                    id: 2,
                    label: 'About Us',
                    uri: 'about-us',
                    children: [
                        {
                            id: 3,
                            label: 'Find Us',
                            uri: 'find-us',
                            children: [
                                {
                                    id: 8,
                                    label: 'Something',
                                    uri: 'something',
                                },
                            ]
                        },
                        {
                            id: 4,
                            label: 'Our History',
                            uri: 'our-history',
                        }
                    ]
                },
                {
                    id: 5,
                    label: 'Products',
                    uri: 'products',
                },
                {
                    id: 6,
                    label: 'Services',
                    uri: 'services',
                },
                {
                    id: 7,
                    label: 'News',
                    uri: 'news',
                }
            ]
        })
    }
</script>