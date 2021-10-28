<template>




    <div class="navigation">

    <div class="navigation-menu-tab">
        <div class="user-img">
            <img src="images/women_avatar1.jpg" alt="">
        </div>
    </div>

    <!-- begin::navigation menu -->
    <div class="navigation-menu-body" tabindex="3" style="overflow: hidden; outline: none;">

        <!-- begin::navigation-logo -->
        <div>
            <div id="navigation-logo">
                <a href="index.html">
                        <img class="logo" src="images/logo.png" alt="logo">
                    </a>
            </div>
        </div>
        <!-- end::navigation-logo -->

        <div class="navigation-menu-group">

            <div class="dashboard-nav">
                <ul>
                    <li>
                        <Link :href="route('dashboard')">Dashboard</Link>
                    </li>
                    <li>
                        <Link :href="route('usergroup')">Usergroup</Link>
                    </li>
                    <li>
                        <Link :href="route('user')">User</Link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end::navigation menu -->
</div>

</template>

<script>
    import { defineComponent } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    


    export default defineComponent({
        components: {
            Head,
            Link,
        },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },

        methods: {
            logout() {
                this.$inertia.post(route('logout'));
            },
        }
    })
</script>
