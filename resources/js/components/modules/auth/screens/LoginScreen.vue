<template>
    <modal-layout>
        <el-form ref="form" :model="form" :rules="rules" :hide-required-asterisk="true">
            <el-button type="text" size="small" @click="$router.push({name: 'auth.forgot'})">Forgot password?</el-button>
            <el-form-item label="Email" prop="email" required @keyup.enter.native="submit">
                <el-input v-model="form.email"></el-input>
            </el-form-item>
            <el-form-item label="Password" prop="password" required @keyup.enter.native="submit">
                <el-input v-model="form.password" show-password></el-input>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="submit" :loading="loading">Login</el-button>
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
                email: '',
                password: ''
            },
            rules: {
                email: [
                    {required: true, message: 'Please input your email address.', trigger: 'blur'},
                    {type: 'email', message: 'Please input a valid email address.', trigger: 'blur'}
                ],
                password: [
                    {required: true, message: 'Please input your password.', trigger: 'blur'},
                ]
            }
        }),
        methods: {
            submit() {
                this.loading = true;

                this.$refs.form.validate((valid) => {
                    if (valid) {
                        api.authentiFake(this.form).then(user => {
                            this.$emit('authenticated', user);
                            this.$message.success('Logged in successfully, ' + user.name + '!');
                            this.$router.push({name: 'dashboard'});
                        }).catch(reason => {
                            this.$message.error(reason);
                     f       this.loading = false;
                        });
                    } else {
                        this.loading = false;
                    }
                });
            }
        }
    }
</script>
