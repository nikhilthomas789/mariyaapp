<template>
    <Head title="Log in" />

    
    <div class="login-wrap">
        <div class="login-contanier">
            <div class="img-box">
                <img src="images/logo.png" alt="#" />
            </div>
            <div class="body">
                <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                    {{ status }}
                </div>
                <form @submit.prevent="submit" novalidate>
                    <div class="group">      
                        <input type="email" class="spl-input" v-model="form.email" required>
                        <label class="f-label spl-label">Username</label>
                    </div>

                    <div class="group">      
                        <input type="password" class="spl-input" v-model="form.password" required autocomplete="current-password">
                        <label class="f-label spl-label">password</label>
                    </div>                    

                    <div class="group ">      
                        <ul>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Remember me!
                                    </label>
                                </div>
                            </li>
                            <li>
                                <Link v-if="canResetPassword" :href="route('password.request')">
                                    Forgot your password?
                                </Link>
                            </li>
                        </ul>
                    </div>  

                    <div class="group">      
                        <button class="btn btn-outline-success btn-block text-uppercase" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Login
                        </button>
                    </div>                     
                </form>
            </div>
        </div>
    </div>
    

    <!-- <jet-authentication-card>

        <jet-validation-errors class="mb-4" />

        

        <form >
            <div>
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus />
            </div>

            <div class="mt-4">
                <jet-label for="password" value="Password" />
                <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <jet-checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Forgot your password?
                </Link>

                <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log issue
                </jet-button>
            </div>
        </form>
    </jet-authentication-card> -->
    
</template>


<script>
    import { defineComponent } from 'vue'
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetCheckbox from '@/Jetstream/Checkbox.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Head,
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors,
            Link,
        },

        props: {
            canResetPassword: Boolean,
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
            }
        }
    })
</script>
