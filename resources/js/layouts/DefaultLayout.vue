<template>
    <el-container class="h-screen">
        <el-header class="pr-4 py-3 bg-white dark:bg-dark-dark flex items-center justify-between z-10">
            <div class="px-4">
                <el-dropdown>
                    <elemental-logo class="w-8" mode="square"></elemental-logo>
                    <el-dropdown-menu slot="dropdown">
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
                <el-dropdown @command="handleAvatarDropdown" :hide-on-click="false">
                    <div class="flex items-center">
                        <el-avatar size="medium" icon="el-icon-user"
                                   src="https://lh3.googleusercontent.com/-D15IUWMvux4/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rcz8TkI4hNDuWLkxP2fDHYOfKzaDQ.CMID/s192-c/photo.jpg"></el-avatar>
                        <i class="el-icon-arrow-down ml-2"></i>
                    </div>
                    <el-dropdown-menu slot="dropdown">
                        <el-dropdown-item icon="el-icon-user">View Profile</el-dropdown-item>
                        <el-dropdown-item icon="el-icon-key">Change Password</el-dropdown-item>
                        <el-dropdown-item icon="el-icon-s-operation" divided command="adminDashboard">Administration
                        </el-dropdown-item>
                        <el-dropdown-item  command="toggleDarkMode" divided>
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
                <el-menu :collapse="true" :default-active="$route.path" router>
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

            <el-main class="relative flex flex-col bg-gray-200 dark:bg-dark-light shadow-inner border-t border-l ">
                <el-container class="absolute inset-0">
                    <router-view name="sidebar"></router-view>
                    <el-main>
                        <page-header></page-header>
                        <div class="p-4">
                            <slot></slot>
                        </div>
                    </el-main>
                </el-container>
            </el-main>
        </el-container>
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
            darkMode: false
        }),
        methods: {
            handleAvatarDropdown(command) {
                if (command === 'toggleDarkMode') {
                    // TODO: Fix this
                    this.darkMode = !this.darkMode;
                    document.documentElement.classList.toggle('mode-dark');
                    localStorage.setItem('mode-dark', this.darkMode ? '1' : '0');
                } else if (command === 'adminDashboard') {
                    this.$router.push({name: 'admin.index'});
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
