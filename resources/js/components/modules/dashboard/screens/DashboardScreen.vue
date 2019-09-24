<template>
    <default-layout padded>
        <template slot="title">
            <page-header></page-header>
        </template>

        <div class="flex">
            <div class="flex flex-col w-1/2 bg-white dark:bg-dark-dark hover:text-brand shadow-lg relative">
                <div class="absolute p-8 z-20 leading-tight">
                    <div class="text-lg">Page Views</div>
                    <countTo class="text-5xl font-light" :startVal="pageViews-500" :endVal="pageViews" :duration="3000"></countTo>
                </div>
                <div class="pt-10"></div>
                <la-cartesian autoresize :bound="[0, n => n + 1000]" :data="values" class="z-10">
                    <la-area animated animation-effect="ease-out" :animation-duration="2" :width="4"
                             fill-color="#1b888103" color="#00B4A9" curve prop="value"></la-area>
                    <la-tooltip></la-tooltip>
                    <la-x-axis hidden prop="label"></la-x-axis>
                </la-cartesian>
            </div>
        </div>
    </default-layout>
</template>

<script>
    import countTo from 'vue-count-to';

    export default {
        components: { countTo },
        data: () => ({
            loading: false,
            show: 'line',
            pageViews: Math.round(7000 + Math.random() * 10000),
            values: [
                {value: Math.round(1000 + Math.random() * 5000), label: 'March'},
                {value: Math.round(1000 + Math.random() * 5000), label: 'April'},
                {value: Math.round(1000 + Math.random() * 5000), label: 'May'},
                {value: Math.round(1000 + Math.random() * 5000), label: 'June'},
                {value: Math.round(1000 + Math.random() * 5000), label: 'July'},
                {value: Math.round(1000 + Math.random() * 5000), label: 'August'},
                {value: Math.round(1000 + Math.random() * 5000), label: 'September'}
            ]
        }),
    }
</script>
