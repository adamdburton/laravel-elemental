<template>
    <el-form ref="form" :model="form" :rules="rules" :hide-required-asterisk="true" @submit.native.prevent="submit">
        <el-form-item label="New Password" prop="password" required>
            <el-input v-model="form.password" show-password></el-input>
        </el-form-item>
        <el-form-item label="New Password (Repeat)" prop="password_repeat" required>
            <el-input v-model="form.password_repeat" show-password></el-input>
        </el-form-item>
        <el-form-item>
            <el-button type="primary" @click="submit">Set Password</el-button>
        </el-form-item>
    </el-form>
</template>

<script>
    import api from '~/api';
    import validation from '~/utils/validation';

    export default {
        data() {
            return {
                loading: false,
                form: {
                    password: '',
                    password_repeat: ''
                },
                rules: {
                    password: [
                        {required: true, message: 'New Password is required.', trigger: 'blur'},
                    ],
                    password_repeat: [
                        {required: true, message: 'New Password (repeat) is required.', trigger: 'blur'},
                        {
                            validator: validation.valuesMatch,
                            message: 'Passwords must match.',
                            match: () => this.form.password,
                            trigger: 'blur'
                        }
                    ]
                }
            };
        },
        methods:
            {
                submit() {
                    this.loading = true;

                    this.$refs.form.validate((valid) => {
                        if (valid) {
                            let data = {...this.form, ...this.$route.query};

                            api.resetPassword(data).then(() => {
                                this.$message.success('Your password has been reset.');
                                this.$router.push({name: 'auth.login'});
                            }).catch(reason => {
                                this.$message.error(reason);
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
