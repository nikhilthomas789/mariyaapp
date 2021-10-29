<template>




    <div class="navigation">

    <div class="navigation-menu-tab">
        <button class="user-img">
            <img src="images/women_avatar1.jpg" alt="">
            <ul class="user-dropdown">
                <li class="active"><a href="#">Profile Information</a></li>
                <li><a href="#">Change Password</a></li>
                <li>
                    <Link :href="route('logout')"> <i class="fa fa-sign-out"></i> Logout</Link>
                </li>
            </ul>
        </button>
        
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
            <div class="dashboard-nav menu-parent style1">
                <ul class="menu">
                    <li>
                        <Link :href="route('dashboard')"> <i class="fa fa-dashboard"></i> Dashboard</Link>
                    </li>
                    <li>
                        <Link :href="route('usergroup')"><i class="fa fa-user-o"></i> Usergroup</Link>
                    </li>
                    <li>
                        <Link :href="route('user')"><i class="fa fa-user-o"></i> User</Link>
                    </li>
                    <li class="menu-child">
						<a href="#"><i class="fa fa-tachometer"></i> User</a>
						<ul>
							<li>
                                <Link :href="route('dashboard')"><i class="fa fa-plus"></i> Dashboard</Link>
                            </li>
							<li>
                                <Link :href="route('usergroup')"><i class="fa fa-file-o"></i> Usergroup</Link>
                            </li>
						</ul>
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

    // Dropdown type side navigation (multiple dropdown) for admin dashboard & themes
// Deigned by Nishant Dogra
// Created: 08/03/2018
// Updated: 26-10-2018
// Twitter: @mrdogra007
// Blog: https://t.co/F6RF2rCHu3
    
    $(document).ready(function() {
        // prevent page from jumping to top from  # href link
        $('.menu-parent li.menu-child > a').click(function(e) {
            e.preventDefault();
        });

        // remove link from menu items that have children
        $(".menu-parent li.menu-child > a").attr("href", "#");

        //  function to open / close menu items
        $(".menu-parent a").click(function() {
            var link = $(this);
            var closest_ul = link.closest("ul");
            var parallel_active_links = closest_ul.find(".active")
            var closest_li = link.closest("li");
            var link_status = closest_li.hasClass("active");
            var count = 0;

            closest_ul.find("ul").slideUp(function() {
                if (++count == closest_ul.find("ul").length)
                parallel_active_links.removeClass("active");
            });

            if (!link_status) {
                closest_li.children("ul").slideDown();
                closest_li.addClass("active");
            }
            return false;
        })
    })
</script>
