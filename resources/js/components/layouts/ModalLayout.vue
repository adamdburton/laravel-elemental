<template>
    <main class="h-screen bg-brand flex flex-col items-center justify-center">
        <div class="w-full max-w-2xl flex border-2 border-black shadow-2xl">
            <div
                class="w-2/5 flex flex-col items-center justify-center border-r-2 border-black shadow-inner text-center">
                <div>
                    <elemental-logo mode="square" class="w-48"/>
                </div>
            </div>

            <div class="w-3/5 bg-white border-black px-8 py-6 shadow-inner">
                <slot></slot>
            </div>
        </div>
        <a href="https://clickdigitalsolutions.co.uk/" target="_blank" class="block pt-10 no-underline">
            <click-logo class="w-6"/>
<!--            <p class="block pt-4 text-white opacity-75 text-xs">&copy; Click 2019</p>-->
        </a>
    </main>
</template>
