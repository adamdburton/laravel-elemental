<template>
    <transition name="page-fade" mode="out-in">
        <router-view></router-view>
    </transition>
</template>

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
