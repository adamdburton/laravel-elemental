<template>
    <main class="h-screen flex items-center justify-center text-center text-white">
        <div>
            <h1 class="text-5xl uppercase tracking-widest">404</h1>
            <p class="mb-2">Sorry, there's nothing here.</p>
            <p class="opacity-75">
                <router-link :to="{name: 'splash'}">
                    <div class="underline">Start over?</div>
                </router-link>
            </p>
        </div>
    </main>
</template>
