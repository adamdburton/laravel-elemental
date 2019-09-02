<template>
    <modal-layout>
        <div class="mb-6 flex flex-col">
            <label for="email" class="font-bold mb-2 uppercase tracking-widest">Email</label>
            <input type="text" name="email" id="email" class="border-2 border-black p-2 text-center">
        </div>

        <div class="flex items-center">
            <input type="submit" value="Send" @click="submit"
                   class="border-2 shadow-inner border-transparent hover:border-brand bg-brand hover:bg-white text-white hover:text-brand cursor-pointer px-4 py-2 uppercase tracking-widest">
            <router-link :to="{name: 'auth.login'}">
                <div class="ml-4 underline hover:text-brand text-xs opacity-75">Login?</div>
            </router-link>
        </div>
    </modal-layout>
</template>

<script>
    import api from '../../../api';

    export default {
        data: () => ({
            form: {
                email: ''
            }
        }),
        methods: {
            submit() {
                api.sendPasswordResetLink(this.form).then(() => {
                    this.$message.success('Password reset link sent to your email address!');
                    this.$router.push({name: 'auth.login'});
                }).catch(reason => {
                    this.$message.error(reason);
                });
            }
        }
    }
</script>
