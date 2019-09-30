<template>
    <el-tree
            :data="elements"
            draggable
            :indent="28"
            node-key="id"
            icon-class="el-icon-arrow-right"
            default-expand-all
            :highlight-current="false"
            :expand-on-click-node="false">
        <div class="flex-1 flex items-center justify-between py-2 px-4 group" slot-scope="{ node, data }">
            <div class="flex items-center">
                <div class="mr-2">
                    <div class="group-hover:hidden">
                        <i class="el-icon-more-outline text-gray-500"></i>
                    </div>
                    <div class="hidden group-hover:inline-block">
                        <i class="el-icon-rank text-gray-600"></i>
                    </div>
                </div>
                <div class="mr-4">
                    <el-button type="text" @click="$router.push({name: 'content.edit'})">{{ node.label }}</el-button>
                </div>
                <el-tag size="mini" type="info" effect="plain" disable-transitions>{{ data.uri }}</el-tag>

            </div>
            <div class="opacity-0 group-hover:opacity-100">
                <el-button type="text" @click="$router.push({name: 'content.edit'})">View Page</el-button>
                <el-button type="text" @click="$router.push({name: 'content.edit'})">Edit</el-button>
                <el-button type="text">Delete</el-button>
            </div>
        </div>
    </el-tree>
</template>

<script>
    export default {
        props: {
            elements: Array
        }
    }
</script>