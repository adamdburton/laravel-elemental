<template>
    <div class="p-4 flex bg-white dark:bg-dark-dark border-b dark:border-b-brand items-center justify-between sticky">
        <div class="shadow-lg mr-4 bg-brand text-white w-12 h-12 flex items-center justify-center">
            <slot name="icon">
                <i v-if="realIcon" class="text-2xl" :class="realIcon"></i>
            </slot>
        </div>
        <div class="flex-1 leading-relaxed">
            <h1 v-html="realTitle"></h1>
            <div class="text-sm text-gray-700 dark:text-gray-400" v-if="realDescription" v-html="realDescription"></div>
        </div>
        <div>
            <slot name="buttons"></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            title: {
                type: String
            },
            description: {
                type: String,
            },
            icon: {
                type: String,
                default: 'el-icon-magic-stick'
            }
        },
        computed: {
            realTitle() {
                return this.setTitle ? this.setTitle : this.title;
            },
            realDescription() {
                return this.setDescription ? this.setDescription : this.description;
            },
            realIcon() {
                return this.setIcon ? this.setIcon : this.icon;
            }
        },
        data: () => ({
            setTitle: '',
            setDescription: '',
            setIcon: ''
        }),
        methods: {
            setValues() {
                if (this.$route.meta && this.$route.meta.title) {
                    this.setTitle = this.$route.meta.title;
                }

                if (this.$route.meta && this.$route.meta.description) {
                    this.setDescription = this.$route.meta.description;
                }

                if (this.$route.meta && this.$route.meta.icon) {
                    this.setIcon = this.$route.meta.icon;
                }
            }
        },
        watch: {
            '$route.meta': function (id) {
                this.setValues()
            }
        },
        mounted() {
            this.setValues();
        },
    }
</script>