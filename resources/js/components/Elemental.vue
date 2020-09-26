<template>
    <transition name="page-fade" mode="out-in">
        <component :is="layout">
            <router-view></router-view>
            <slot v-for="(_, name) in $slots" :name="name" :slot="name" />
            <template v-for="(_, name) in $scopedSlots" :slot="name" slot-scope="slotData"><slot :name="name" v-bind="slotData" /></template>
        </component>
    </transition>
</template>

<script>
    const defaultLayout = 'default';

    export default {
        computed: {
            layout() {
                return (this.$route.meta.layout || defaultLayout) + '-layout';
            }
        },
    }
</script>

<style>
    .page-fade-enter-active,
    .page-fade-leave-active {
        transition-duration: 0.2s;
        transition-property: opacity;
        transition-timing-function: ease;
    }

    .page-fade-enter,
    .page-fade-leave-active {
        opacity: 0
    }
</style>
