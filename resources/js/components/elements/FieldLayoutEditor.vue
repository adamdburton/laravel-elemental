<template>
    <div class="shadow-lg">
        <div class="p-6 border-b">
            <div class="flex items-center mb-8">
                <h2 class="text-xl font-medium mr-4">Selected Fields</h2>
                <el-button @click="handleNewTab" size="small" type="primary"><i class="el-icon-plus"></i> New Tab</el-button>
            </div>

            <div class="active-tabs flex mb-4">
                <draggable v-model="activeTabs" group="tabs" class="flex" handle=".tab-reorder-handle">
                    <field-layout-tab v-for="tab in activeTabs" :key="tab.name" :tab="tab" :fields="fields" :active="true"/>
                </draggable>
            </div>
        </div>

        <div class="p-6">
            <div class="flex items-center mb-8">
                <h2 class="text-xl font-medium mr-4">Available Fields</h2>
                <div class="w-xs">
                    <el-input size="small" placeholder="Search..."></el-input>
                </div>
            </div>

            <div class="active-tabs flex mb-4">
                <draggable v-model="inactiveTabs" group="tabs" class="flex" handle=".tab-reorder-handle">
                    <field-layout-tab v-for="tab in inactiveTabs" v-if="tab.fields.length > 0" :key="tab.name" :tab="tab" :fields="fields" :active="false"/>
                </draggable>
            </div>
        </div>
    </div>
</template>

<script>
    import draggable from 'vuedraggable'

    export default {
        components: {
            draggable,
        },
        data: () => ({
            activeTabs: [
                {
                    name: 'Content',
                    fields: [1, 2]
                },
                {
                    name: 'Meta',
                    fields: [5, 3]
                },
                {
                    name: 'SEO',
                    fields: [4]
                }
            ],
            inactiveTabs: [
                {
                    name: 'Settings',
                    fields: [3, 4, 5]
                },
                {
                    name: 'Events',
                    fields: [1, 2]
                },
                {
                    name: 'Something',
                    fields: [4]
                }
            ],
            fields: [
                {
                    id: 1,
                    name: 'Title',
                    slug: 'title'
                },
                {
                    id: 2,
                    name: 'Introduction',
                    slug: 'intro'
                },
                {
                    id: 3,
                    name: 'Main Image',
                    slug: 'mainImage'
                },
                {
                    id: 4,
                    name: 'SEO Description',
                    slug: 'seoDescription'
                },
                {
                    id: 5,
                    name: 'Form',
                    slug: 'form'
                }
            ]
        }),
        methods: {
            handleNewTab() {
                this.$prompt('Label', 'Add Tab').then(({ value }) => {
                    this.activeTabs.push({
                        name: value,
                        fields: [5, 3]
                    })
                });
            }
        }
    }
</script>

<style lang="scss">

</style>