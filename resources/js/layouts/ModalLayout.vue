<template>
    <transition name="page-fade" mode="out-in">
        <main class="h-screen flex flex-col items-center justify-center">
            <div class="w-full max-w-2xl flex shadow-2xl">
                <div class="w-2/5 py-16 bg-brand flex flex-col items-center justify-center shadow-inner text-center">
                    <elemental-logo mode="square" class="w-40"/>
                </div>
                <div class="w-3/5 bg-white px-8 py-8 shadow-inner flex items-center text-black">
                    <slot></slot>
                </div>
            </div>
            <a href="https://clickdigitalsolutions.co.uk/" target="_blank"
               class="block text-center pt-8 opacity-50 hover:opacity-100 no-underline">
                <click-logo class="w-4 mx-auto"/>
                <p class="block pt-4 text-white opacity-75 text-xs">&copy; Click 2019</p>
            </a>
        </main>
    </transition>
</template>
