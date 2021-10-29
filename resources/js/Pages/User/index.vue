<template>
    <app-layout>
        <template #content>
            <div class="main-wrapper">
                <div class="page-header">
                    Users
                </div>
                <div class="main-box box-default">
                    <div class="body with-border">
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="group">
                                        <select class="form-control">
                                            <option value="-- select --">-- select --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="group">      
                                        <input type="text" class="spl-input" required>
                                        <span class="span1"></span>
                                        <label class="f-label spl-label">Name</label>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="group">      
                                        <input type="text" class="spl-input" required>
                                        <span class="span1"></span>
                                        <label class="f-label spl-label">Email</label>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="group">      
                                        <input type="text" class="spl-input" required>
                                        <span class="span1"></span>
                                        <label class="f-label spl-label">Username</label>
                                    </div>
                                </div>
                                
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="group">      
                                        <input type="text" class="spl-input" required>
                                        <span class="span1"></span>
                                        <label class="f-label spl-label">Password</label>
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="group">      
                                        <input type="file" required>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="foot">
                        <button class="btn btn-primary">Submit</button> &nbsp;
                        <button class="btn btn-danger">Cancel</button>
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
            AppLayout
        },
    })
</script>
