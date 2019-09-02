<template>
    <main class="h-screen overflow-auto bg-white flex">
        <aside class="lg:max-w-xs w-full border-r-2 border-black">
            <div class="border-b-2 border-black flex">
                <div class="flex-1 px-4 flex items-center">
                    Site Name
                </div>
                <div class="px-3 bg-brand py-3 border-l-2 border-black flex items-center justify-center text-2xl">
                    <el-dropdown>
                        <div class="el-dropdown-link">
                            <i class="el-icon-setting el-icon-fw text-white text-2xl"></i>
                        </div>
                        <el-dropdown-menu slot="dropdown">
                            <el-dropdown-item>Visit Site</el-dropdown-item>
                            <el-dropdown-item>Profile</el-dropdown-item>
                            <el-dropdown-item divided>Log out</el-dropdown-item>
                        </el-dropdown-menu>
                    </el-dropdown>
                </div>
            </div>
            <el-menu
                default-active="2"
                class="el-menu-vertical-demo">
                <el-submenu index="1">
                    <template slot="title">
                        <i class="el-icon-edit"></i>
                        <span>Content</span>
                    </template>
                    <el-menu-item index="1-1">item one</el-menu-item>
                    <el-menu-item index="1-2">item one</el-menu-item>
                </el-submenu>
            </el-menu>
        </aside>
        <main class="flex-1">
            <header class="border-b-2 border-black flex">
                <div class="flex-1 px-4 flex items-center">
                    <el-page-header content="Dashboard"></el-page-header>
                </div>
                <div class="px-3 bg-brand py-3 border-l-2 border-black flex items-center justify-center text-2xl">
                    <i class="el-icon-setting el-icon-fw text-white text-2xl"></i>
                </div>
            </header>

            <slot></slot>
        </main>
    </main>
</template>
