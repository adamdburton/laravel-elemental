<template>
    <section>

        <el-form label-position="left" label-width="160px" ref="form" :model="element.attributes" :rules="rules"
                 :status-icon="true">
            <el-tabs>
                <el-tab-pane label="Content">
                    <div class="bg-white dark:bg-dark-dark">
                        <div v-for="(config, property) in element.properties" :key="property"
                             class="p-6 border-b">
                            <el-form-item :label="config.label" :prop="property">
                                <component :is="componentForType(config)"
                                           v-bind="attributesForType(config)"
                                           v-model="element.attributes[property]"
                                ></component>
                            </el-form-item>
                        </div>
                    </div>
                </el-tab-pane>
                <el-tab-pane label="Tab 2">
                    <div class="bg-white dark:bg-dark-dark">
                        hello
                    </div>
                </el-tab-pane>
            </el-tabs>

        </el-form>

        <el-drawer
                title="Content"
                :visible="editingElementType"
                @close="editingElementType = false"
                direction="rtl"
                size="30%">
        </el-drawer>

        <template slot="title">
            <page-header></page-header>
        </template>
    </section>
</template>

<script>
    export default {
        data: () => ({
            loading: false,
            editingElementType: false,
            element: {
                properties: {
                    title: {
                        type: 'string',
                        label: 'Title',
                        validation: [
                            {required: true},
                        ]
                    },
                    slug: {
                        type: 'string',
                        label: 'Slug',
                        validation: [
                            {required: true},
                        ]
                    },
                    description: {
                        type: 'text',
                        label: 'Description',
                        validation: [
                            {required: true},
                        ]
                    }
                },
                attributes: {
                    title: ''
                }
            }
        }),

        methods: {
            componentForType(config) {
                if (config.type === 'string' || config.type === 'text') {
                    return 'el-input';
                }
            },
            attributesForType(config) {
                if (config.type === 'text') {
                    return {
                        type: 'textarea',
                        autosize: {minRows: 6}
                    };
                }
            }
        },

        computed: {
            rules() {
                return Object.keys(this.element.properties)
                    .filter(key => typeof this.element.properties[key].validation !== 'undefined')
                    .reduce((out, key) => {
                        out[key] = this.element.properties[key].validation;
                        return out;
                    }, {});
            }
        }
    }
</script>
