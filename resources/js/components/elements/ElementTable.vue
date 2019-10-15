<template>
    <el-table-draggable>
        <el-table :data="filteredElements">
            <el-table-column type="selection"></el-table-column>
            <el-table-column v-for="property in properties"
                             v-bind="propsForColumn(property)"
                             :key="property.key"
                             :prop="'attributes.' + property.key"
                             :label="property.meta.label">
            </el-table-column>
            <el-table-column label="" align="right" width="200">
                <template slot="header" slot-scope="scope">
                    <el-input size="mini" v-model="search" placeholder="Search elements"/>
                </template>
                <template slot-scope="scope">
                    <div class="pr-2">
                        <el-button type="text" @click="$router.push({name: 'content.view'})">View</el-button>
                        <el-button type="text" @click="$router.push({name: 'content.edit'})">Edit</el-button>
                        <el-button type="text">Delete</el-button>
                    </div>
                </template>
            </el-table-column>
        </el-table>
    </el-table-draggable>
</template>

<script>
    export default {
        props: {
            elements: {
                type: Array,
                default: () => ([])
            },
            properties: {
                type: Array,
                default: () => ([])
            }
        },
        data: () => ({
            search: '',
        }),
        computed: {
            filteredElements() {
                const search = this.search.toLowerCase();

                return this.elements.filter(function (obj) {
                    return Object.keys(obj.attributes).some(function (key) {
                        return obj.attributes[key].toLowerCase().includes(search);
                    })
                });
            }
        },
        methods: {
            propsForColumn(property) {
                let props = {};

                // sorting

                props.sortable = true;

                // filters

                // statuses

                // Fixable

                // resizable

                // formatter

                return props;
            }
        }
    }
</script>