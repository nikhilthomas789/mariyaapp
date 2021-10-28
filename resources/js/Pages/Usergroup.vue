<template>
    <app-layout>
        <template #content>
            <div class="main-wrapper">
                <div class="page-header">
                    Usergroup
                </div>
                   
                <div class="row justify-content-center">
                    <div class="col-sm-6">
                        <form @submit.prevent="submit" novalidate>
                            <div class="main-box box-default">
                                <div class="body with-border">
                                    <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
                                                <div class="group">      
                                                    <input type="text" class="spl-input" v-model="form.name" required>
                                                    <label class="f-label spl-label">Name</label>
                                                    <p class="text-danger" v-if="form.errors.name" :errors="errors">{{ form.errors.name }}</p>
                                                </div>
                                            </div>
                                        </div>
                                
                                        
                                
                                </div>
                                <div class="foot">
                                    <button class="btn btn-outline-danger">Cancel</button> &nbsp;
                                    <button class="btn btn-outline-success" type="submit">Submit</button> 
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </template>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'

    export default defineComponent({
        components: {
            AppLayout,
        },
        data() {
            return {
                form: this.$inertia.form({
                name: null,
            }),
            }
    },
        methods: {
        submit() {
            this.form.post(this.route("usergroup"),{
                onSuccess: (response)=>{
                Swal.fire(
                    'Success!',
                    response.props.message,
                    'success'
                ),
                this.name = null;

                }
            })
        },
    },
    })
</script>
