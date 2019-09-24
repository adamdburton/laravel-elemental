<template>
    <default-layout padded>
        <template slot="title">
            <page-header></page-header>
        </template>

        <div class="flex justify-between">
            <router-link :to="{name:'admin.elements.index'}" tag="div" class="max-w-xs w-full py-8 flex flex-col justify-content items-center bg-white dark:bg-dark-dark hover:text-brand  shadow-lg cursor-pointer">
                <div class="text-2xl mb-4 text-black dark:text-brand">
                    <i class="el-icon-notebook-2"></i>
                </div>
                Elements
            </router-link>
            <div class="max-w-xs w-full py-8 flex flex-col justify-content items-center bg-white dark:bg-dark-dark hover:text-brand  shadow-lg cursor-pointer">
                <div class="text-2xl mb-4 text-black dark:text-brand">
                    <i class="el-icon-goods"></i>
                </div>
                Shop
            </div>
            <div class="max-w-xs w-full py-8 flex flex-col justify-content items-center bg-white dark:bg-dark-dark hover:text-brand  shadow-lg cursor-pointer">
                <div class="text-2xl mb-4 text-black dark:text-brand">
                    <i class="el-icon-postcard"></i>
                </div>
                Forms
            </div>
            <div class="max-w-xs w-full py-8 flex flex-col justify-content items-center bg-white dark:bg-dark-dark hover:text-brand  shadow-lg cursor-pointer">
                <div class="text-2xl mb-4 text-black dark:text-brand">
                    <i class="el-icon-files"></i>
                </div>
                Assets
            </div>
        </div>
    </default-layout>
</template>

<script>
    export default {
        data: () => ({
            loading: false,
        })
    }
</script>
