<template>
    <el-container class="h-screen">
        <el-header class="text-sm pr-4 py-3 bg-white dark:bg-dark-dark flex items-center justify-between z-10">
            <div class="px-4">
                <el-dropdown :show-timeout="50">
                    <elemental-logo class="w-8" mode="square"></elemental-logo>
                    <el-dropdown-menu class="text-sm" slot="dropdown">
                        <el-dropdown-item icon="el-icon-link">View Homepage</el-dropdown-item>
                        <el-dropdown-item icon="el-icon-reading" divided>View Documentation</el-dropdown-item>
                        <el-dropdown-item icon="el-icon-help">Get Help!</el-dropdown-item>
                        <el-dropdown-item command="clickWebsite" divided>Elemental v0.0.1</el-dropdown-item>
                        <el-dropdown-item command="clickWebsite">&copy; 2019 Click Digital Solutions Ltd
                        </el-dropdown-item>
                    </el-dropdown-menu>
                </el-dropdown>
            </div>

            <div class="flex-1 mr-4 text-gray-700 dark:text-gray-400">
                <el-breadcrumb separator-class="el-icon-arrow-right">
                    <el-breadcrumb-item :to="{ path: '/' }">Homepage</el-breadcrumb-item>
                    <el-breadcrumb-item :to="{ path: '/' }">Promotion Management</el-breadcrumb-item>
                    <el-breadcrumb-item :to="{ path: '/' }">Promotion List</el-breadcrumb-item>
                    <el-breadcrumb-item>Promotion Detail</el-breadcrumb-item>
                </el-breadcrumb>
            </div>
            <div class="max-w-xs flex-1 mr-4">
                <el-autocomplete :fetch-suggestions="handleSearch"
                                 placeholder="Search (press / to focus)" v-model="search" ref="searchInput"
                                 size="large" class="dark:bg-dark-light"
                                 prefix-icon="el-icon-search"></el-autocomplete>
            </div>
            <div>
                <el-dropdown :show-timeout="50" class="text-sm" @command="handleAvatarDropdown" :hide-on-click="false">
                    <div class="flex items-center">
                        <el-avatar size="medium" icon="el-icon-user" src="https://clickdigitalsolutions.co.uk/assets/images/logo.png"></el-avatar>
                        <i class="el-icon-arrow-down ml-2"></i>
                    </div>
                    <el-dropdown-menu slot="dropdown">
                        <el-dropdown-item command="showProfile" icon="el-icon-user">View Profile</el-dropdown-item>
                        <el-dropdown-item icon="el-icon-key">Change Password</el-dropdown-item>
                        <el-dropdown-item icon="el-icon-s-operation" divided command="adminDashboard">Administration
                        </el-dropdown-item>
                        <el-dropdown-item command="toggleDarkMode" divided>
                            <div class="flex items-center justify-between">
                                <div>Dark Mode</div>
                                <i class="text-lg" :class="darkMode ? 'el-icon-open' : 'el-icon-turn-off'"></i>
                            </div>
                        </el-dropdown-item>
                        <el-dropdown-item icon="el-icon-switch-button" divided>Log out</el-dropdown-item>
                    </el-dropdown-menu>
                </el-dropdown>
            </div>
        </el-header>

        <el-container class="flex-1">
            <el-aside width="auto" class="bg-white dark:bg-dark-dark">
                <el-menu :collapse="true" :default-active="$route.path" class="text-sm" router>
                    <el-menu-item index="/dashboard">
                        <i class="el-icon-data-line"></i>
                        <span slot="title">Dashboard</span>
                    </el-menu-item>
                    <el-menu-item index="/content">
                        <i class="el-icon-notebook-2"></i>
                        <span slot="title">Content</span>
                    </el-menu-item>
                    <el-menu-item index="/store">
                        <i class="el-icon-goods"></i>
                        <span slot="title">Store</span>
                    </el-menu-item>
                    <el-menu-item index="/forms">
                        <i class="el-icon-postcard"></i>
                        <span slot="title">Forms</span>
                    </el-menu-item>
                    <el-menu-item index="/assets">
                        <i class="el-icon-files"></i>
                        <span slot="title">Assets</span>
                    </el-menu-item>
                    <el-menu-item index="/comments">
                        <i class="el-icon-chat-dot-square"></i>
                        <span slot="title">Comments</span>
                    </el-menu-item>
                    <el-menu-item index="/events">
                        <i class="el-icon-date"></i>
                        <span slot="title">Events</span>
                    </el-menu-item>
                    <el-menu-item index="/settings">
                        <i class="el-icon-set-up"></i>
                        <span slot="title">Settings</span>
                    </el-menu-item>
                </el-menu>
            </el-aside>

            <el-main class="relative flex flex-col bg-gray-200 dark:bg-dark-light shadow-inner border-t border-l">
                <el-container class="absolute inset-0">
                    <router-view name="sidebar"></router-view>
                    <el-container>
                        <el-header :height="null">
                            <page-header></page-header>
                        </el-header>
                        <el-main class="flex-col">
                            <slot></slot>
                        </el-main>
                    </el-container>
                </el-container>
            </el-main>
        </el-container>
        <el-drawer direction="rtl" :visible.sync="profileShown" :before-close="handleProfileDrawerClose">
            <div class="p-4 flex flex-col items-center">
                <div class="mb-12">
                    <el-avatar :size="96" icon="el-icon-user" src="https://clickdigitalsolutions.co.uk/assets/images/logo.png"></el-avatar>
                </div>
                <div class="text-2xl mb-2">Click Digital</div>
                <div class="text-sm text-brand uppercase">Administrator</div>
            </div>
        </el-drawer>
    </el-container>
</template>

<script>
    import api from '~/api';

    export default {
        props: {
            padded: Boolean,
        },
        data: () => ({
            search: '',
            darkMode: false,
            profileShown: false
        }),
        methods: {
            handleAvatarDropdown(command) {
                if (command === 'toggleDarkMode') {
                    // TODO: Fix this
                    this.darkMode = !this.darkMode;
                    document.documentElement.classList.toggle('mode-dark');
                    localStorage.setItem('mode-dark', this.darkMode ? '1' : '0');
                } else if (command === 'adminDashboard') {
                    this.$router.push({name: 'admin.dashboard.index'});
                } else if (command === 'showProfile') {
                    this.profileShown = true;
                }
            },
            handleSearchFocus(event) {
                if (event.key === '/') {
                    this.$refs.searchInput.focus();
                }
            },
            handleSearch(queryString, callback) {
                api.searchElements({search: queryString}).then(results => {
                    callback(results);
                });
            },
            handleProfileDrawerClose(done) {
                done();
            }
        },
        mounted() {
            window.addEventListener('keyup', this.handleSearchFocus);

            // TODO: Fix this
            if (localStorage.getItem('mode-dark') && localStorage.getItem('mode-dark') !== '0') {
                document.documentElement.classList.add('mode-dark');
                this.darkMode = true;
            }
        },
        beforeDestroy() {
            window.removeEventListener('resize', this.handleSearchFocus);
        }
    }
</script>
