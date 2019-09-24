<template>
    <default-layout padded>
        <template slot="title">
            <page-header>
                <template slot="buttons">
                    <el-button type="primary" icon="el-icon-plus">New Element</el-button>
                </template>
            </page-header>
        </template>

        <div class="bg-white dark:bg-dark-dark shadow-lg">
            <element-table :elements="elements" :properties="properties"></element-table>
        </div>
    </default-layout>
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
            elements: Array(6).fill({
                label: 'Bibendum Porta',
                type: 'Curabitur blandit.',
                class: 'Lorem Cras Elit',
            },)
        })
    }
</script>