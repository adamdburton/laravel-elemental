<template>
    <modal-layout>
        <el-form ref="form" :model="form" :rules="rules" :hide-required-asterisk="true" @submit.native.prevent="submit">
            <el-button type="text" size="small" @click="$router.push({name: 'auth.login'})">Just logging in?</el-button>
            <el-form-item label="Email" prop="email" required>
                <el-input v-model="form.email"></el-input>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="submit">Send Reminder</el-button>
            </el-form-item>
        </el-form>
    </modal-layout>
</template>

<script>
    import api from '~/api';

    export default {
        data: () => ({
            loading: false,
            form: {
                email: ''
            },
            rules: {
                email: [
                    {required: true, message: 'Please input your email address.', trigger: 'blur'},
                    {type: 'email', message: 'Please input a valid email address.', trigger: 'blur'}
                ]
            }
        }),
        methods: {
            submit() {
                this.loading = true;

                this.$refs.form.validate((valid) => {
                    if (valid) {
                        api.sendPasswordResetLink(this.form).then(() => {
                            this.$notify.success('Password reset link sent to your email address!');
                            this.$router.push({name: 'auth.login'});
                        }).catch(reason => {
                            this.$notify.error(reason);
                            this.loading = false;
                        });
                    } else {
                        this.loading = false;
                    }
                });
            }
        }
    }
</script>
