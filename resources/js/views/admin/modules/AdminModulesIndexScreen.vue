<template>
    <section>
        <template slot="title">
            <page-header>
                <template slot="buttons">
                    <el-button type="primary" icon="el-icon-plus">New Element</el-button>
                </template>
            </page-header>
        </template>

        <div class="bg-white dark:bg-dark-dark shadow-lg">
            <element-table :elements="$route.meta.$data.modules" :properties="properties"></element-table>
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
                    property: 'description',
                    label: 'Description'
                },
            ]
        })
    }
</script>