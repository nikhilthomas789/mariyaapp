<template>
    <div>
        <Head :title="title" />

        <div class="min-h-screen bg-gray-100">

            <div class="header">
                <div class="left">
                    <ul>
                        <li>
                            <Link :href="route('dashboard')"><i class="fa fa-plus"></i> Create</Link>
                        </li>
                        <li>
                            <Link :href="route('dashboard')"><i class="fa fa-plus"></i> Create</Link>
                        </li>
                        <li>
                            <Link :href="route('dashboard')"><i class="fa fa-plus"></i> Create</Link>
                        </li>
                    </ul>
                </div>
                <div class="right">
                    <ul>
                        <li>
                            <Link :href="route('dashboard')"><i class="fa fa-plus"></i> Create</Link>
                        </li>
                        <li>
                            <Link :href="route('dashboard')"><i class="fa fa-plus"></i> Create</Link>
                        </li>
                        <li>
                            <Link :href="route('dashboard')"><i class="fa fa-plus"></i> Create</Link>
                        </li>
                    </ul>
                </div>
            </div>

            

            <side-nav />
            
              <slot name="content"></slot>


            
            <!-- Page Content -->
           
            <!-- <main>
                 <h1>dssdf</h1>
            </main> -->
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetApplicationMark from '@/Jetstream/ApplicationMark.vue'
    import JetBanner from '@/Jetstream/Banner.vue'
    import JetDropdown from '@/Jetstream/Dropdown.vue'
    import JetDropdownLink from '@/Jetstream/DropdownLink.vue'
    import JetNavLink from '@/Jetstream/NavLink.vue'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    import SideNav from './SideNav.vue'

       



    export default defineComponent({
        props: {
            title: String,
        },
        beforeCreate: function() {
        document.body.className = 'home';
    },

        components: {
            Head,
            JetApplicationMark,
            JetBanner,
            JetDropdown,
            JetDropdownLink,
            JetNavLink,
            JetResponsiveNavLink,
            Link,
   
               SideNav     },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },

        methods: {
            switchToTeam(team) {
                this.$inertia.put(route('current-team.update'), {
                    'team_id': team.id
                }, {
                    preserveState: false
                })
            },

            logout() {
                this.$inertia.post(route('logout'));
            },
        }
    })
</script>
