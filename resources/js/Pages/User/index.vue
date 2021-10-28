<template>
    <app-layout>
        <template #content>
            <div class="main-wrapper">
                <div class="page-header">
                    Users
                </div>
                <div class="main-box">
                    <div class="head">
                        <div class="title">
                            
                        </div>
                    </div>
                    <div class="body">
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
                                        <input type="text" required>
                                        <span class="span1"></span>
                                        <label class="f-label">Name</label>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="group">      
                                        <input type="text" required>
                                        <span class="span1"></span>
                                        <label class="f-label">Email</label>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="group">      
                                        <input type="text" required>
                                        <span class="span1"></span>
                                        <label class="f-label">Username</label>
                                    </div>
                                </div>
                                
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="group">      
                                        <input type="text" required>
                                        <span class="span1"></span>
                                        <label class="f-label">Password</label>
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
