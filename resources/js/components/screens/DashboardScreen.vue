<template>
    <default-layout>
        <el-table
            :data="tableData"
            :default-sort="{prop: 'date', order: 'descending'}"
            style="width: 100%">
            <el-table-column
                prop="date"
                label="Date"
                sortable
                width="180">
            </el-table-column>
            <el-table-column
                prop="name"
                label="Name"
                width="180">
            </el-table-column>
            <el-table-column
                prop="address"
                label="Address">
            </el-table-column>
        </el-table>
    </default-layout>
</template>

<script>
    export default {
        data: () => ({
            tableData: [{
                date: '2016-05-03',
                name: 'Tom',
                address: 'No. 189, Grove St, Los Angeles'
            }, {
                date: '2016-05-02',
                name: 'Dolor Tristique',
                address: 'No. 189, Grove St, Los Angeles'
            }, {
                date: '2016-05-04',
                name: 'Vestibulum',
                address: 'Nullam quis risus eget urna mollis ornare vel eu leo.'
            }, {
                date: '2016-05-01',
                name: 'Mollis Adipiscing',
                address: 'No. 189, Grove St, Los Angeles'
            }]
        })
    }
</script>
