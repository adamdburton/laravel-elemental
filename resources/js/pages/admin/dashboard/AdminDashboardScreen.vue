<template>
    <section>
        <template slot="title">
            <page-header></page-header>
        </template>

        <div class="flex justify-between">
            <router-link :to="{name:'admin.modules.index'}" tag="div" class="max-w-xs w-full py-8 flex flex-col justify-content items-center bg-white dark:bg-dark-dark hover:text-brand shadow-lg cursor-pointer">
                <div class="text-2xl mb-4 text-black dark:text-brand">
                    <i class="el-icon-box"></i>
                </div>
                Modules
            </router-link>
            <router-link :to="{name:'admin.fields.index'}" tag="div" class="max-w-xs w-full py-8 flex flex-col justify-content items-center bg-white dark:bg-dark-dark hover:text-brand shadow-lg cursor-pointer">
                <div class="text-2xl mb-4 text-black dark:text-brand">
                    <i class="el-icon-price-tag"></i>
                </div>
                Fields
            </router-link>
            <router-link  :to="{name:'admin.dashboard.editor'}" tag="div" class="max-w-xs w-full py-8 flex flex-col justify-content items-center bg-white dark:bg-dark-dark hover:text-brand shadow-lg cursor-pointer">
                <div class="text-2xl mb-4 text-black dark:text-brand">
                    <i class="el-icon-goods"></i>
                </div>
                Field Layout Editor
            </router-link>
            <div class="max-w-xs w-full py-8 flex flex-col justify-content items-center bg-white dark:bg-dark-dark hover:text-brand shadow-lg cursor-pointer">
                <div class="text-2xl mb-4 text-black dark:text-brand">
                    <i class="el-icon-postcard"></i>
                </div>
                Forms
            </div>
            <div class="max-w-xs w-full py-8 flex flex-col justify-content items-center bg-white dark:bg-dark-dark hover:text-brand shadow-lg cursor-pointer">
                <div class="text-2xl mb-4 text-black dark:text-brand">
                    <i class="el-icon-files"></i>
                </div>
                Assets
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        data: () => ({
            loading: false,
        })
    }
</script>
