<template>
    <app-layout>
        <template #content>
            <div class="main-wrapper">
                <div class="page-header">
                    Usergroup list
                </div>

                <div class="main-box box-default">
                    <div class="body">
                        <div class="buttons">
                            <button type="button" class="btn btn-outline-primary">Primary</button>
                            <button type="button" class="btn btn-outline-secondary">Secondary</button>
                            <button type="button" class="btn btn-outline-success">Success</button>
                            <button type="button" class="btn btn-outline-danger">Danger</button>
                            <button type="button" class="btn btn-outline-warning">Warning</button>
                            <button type="button" class="btn btn-outline-info">Info</button>
                        </div>
                        <table id="example"  class="table table-striped table-bordered">
						<thead>
							<tr>
                                <th>#</th>
                                <th>Name</th>

                                <th>Status</th>
                                <th>Edit</th>
                                <th>Permission</th>
                                <th>Delete</th>
                            </tr>
						</thead>
						<tbody>
						</tbody>
					</table>
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
        created() {
            $(document).ready( function () {
            $('#example').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "/admin/usergroup/load",
                "columns": [
                    { "data": "id" },
                    { "data": "name" },
                    {
                        render:function(data, type, row)
                        {
                        return '<Link :href=route(status,'+row.id+')><i class="fa fa-check iconactive" aria-hidden="true"></i></Link>';
                        },
                    },
                    {
                        render:function(data, type, row)
                        {
                        return '<a href="create/'+row.id+'" data-toggle="tooltip" title="" data-original-title="Click here to edit"><i class="fa fa-edit fa-2x"></i></a>';
                        },
                    },
                    {
                        render:function(data, type, row)
                        {
                        return '<a href="permission/'+row.id+'" data-toggle="tooltip" title="" data-original-title="Click here to set permission"><i class="fa fa-lock fa-2x"></i></a>';
                        },
                    },
                    {
                        render:function(data, type, row)
                        {
                        return '<a href="delete/'+row.id+'" data-toggle="tooltip" title="" data-original-title="Click here to Delete"><i class="fa fa-trash fa-2x"></i></a>';
                        },
                    },

                ],
                
            });
});

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
