<template>
    <section class="h-screen flex flex-col items-center justify-center text-center turnOn">
        <h1 class="text-white text-5xl font-thin uppercase fadeIn mb-8">Elemental</h1>
        <div class="w-48 fadeUp">
            <elemental-logo mode="square"/>
        </div>
        <div class="text-center pt-12 fadeIn">
            <a href="https://clickdigitalsolutions.co.uk/" target="_blank"
               class="block no-underline">
                <click-logo class="w-4 mx-auto"/>
                <p class="block pt-4 text-white opacity-75 text-xs">&copy; Click 2019</p>
            </a>
        </div>
    </section>
</template>

<script>
    export default {
        mounted() {
            setTimeout(() => this.$router.push({name: 'auth.login'}), 2000);
        }
    }
</script>

<style>
    @keyframes fadeUp {
        0% {
            opacity: 0;
            transform: translateY(50%);
        }

        60% {
            opacity: 1;
            transform: translateY(0);
        }

        70% {
            transform: scale(0.9);
        }

        90%,
        to {
            transform: translateY(0);
        }
    }

    @keyframes fadeIn {
        0%,
        70% {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes turnOn {
        0%,
        70% {
            background: #333333;
        }

        75%,
        to {
            background: none;
        }
    }

    .fadeUp {
        animation-duration: 1s;
        animation-name: fadeUp;
    }

    .fadeIn {
        animation-duration: 1s;
        animation-name: fadeIn;
    }

    .turnOn {
        animation-duration: 1s;
        animation-name: turnOn;
    }
</style>