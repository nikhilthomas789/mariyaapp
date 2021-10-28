<template>
    <app-layout>
        <template #content>
        <div class="main-wrapper">
            <div class="page-header"> 
                <div class="left">
                    <h1>
                        CRM System 
                    </h1>
                </div>
                <div class="right">
                    <ul>
                        <li>
                            <i class="fa fa-dashboard"></i> 
                        </li>
                    </ul>
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
    })
</script>
