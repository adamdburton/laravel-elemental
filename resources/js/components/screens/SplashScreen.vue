<template>
    <main class="h-screen flex items-center justify-center text-center text-white">
        <div>
            <elemental-logo mode="wide" />
        </div>
    </main>
</template>

<script>
    export default {
        mounted() {
            setTimeout(() => this.$router.push({name: 'auth.login'}), 2000);
        }
    }
</script>
