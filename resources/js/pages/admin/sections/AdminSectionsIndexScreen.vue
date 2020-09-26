<template>
    <section>
        <template slot="title">
            <page-header>
                <template slot="buttons">
                    <el-button type="primary" icon="el-icon-plus">New Section</el-button>
                </template>
            </page-header>
        </template>

        <div class="bg-white dark:bg-dark-dark shadow-lg">
            <element-table :elements="$route.meta.$data.sections" :attributes="$route.meta.$data.sections[0].attributes"></element-table>
        </div>
    </section>
</template>

<script>
    export default {
        data: () => ({
            properties: [
                {
                    property: 'name',
                    label: 'Name'
                },
                {
                    property: 'slug',
                    label: 'Slug'
                },
            ]
        })
    }
</script>