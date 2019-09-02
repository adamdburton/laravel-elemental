<template>
    <main class="h-screen flex items-center justify-center text-center">
        <div>
            <h1 class="text-5xl uppercase tracking-widest">404</h1>
            <p class="text-sm mb-2">Sorry, there's nothing here.</p>
            <p class="text-sm opacity-75">
                <router-link :to="{name: 'splash'}">
                    <div class="text-sm underline">Start over?</div>
                </router-link>
            </p>
        </div>
    </main>
</template>
