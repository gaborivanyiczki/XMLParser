<template>
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-12">
                <div class="content" style="margin-bottom: 15px;">
                    <h4>Roles list</h4>
                </div>
                <div class="content" style="margin-bottom: 15px;">
                    <button @click="initCreateRole()" class="btn btn-primary btn-xs">
                        + Add new role
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" v-if="roles.length > 0">
                        <thead>
                        <th>
                            No.
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Created
                        </th>
                        <th></th>
                        </thead>
                        <tbody>
                        <tr v-for="(role, index) in roles">
                            <td>{{ index + 1 }}</td>
                            <td>
                                {{ role.name }}
                            </td>
                            <td>
                                {{ role.display_name }}
                            </td>
                            <td>
                                {{ role.created_at }}
                            </td>
                            <td align="right">
                                <button @click="initUpdateRole(index)" class="btn btn-primary btn-xs"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                <button @click="deleteRole(index)" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="content" style="margin-top: 15px;">
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="add_task_model">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add New Role</h4>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-danger" v-if="errors.length > 0">
                            <ul>
                                <li v-for="error in errors">{{ error }}</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label>Name*:</label>
                            <input type="text" name="name" id="name" placeholder="Role name" class="form-control"
                                   v-model="role.name">
                        </div>
                        <div class="form-group">
                            <label>Display name*:</label>
                            <input type="text" name="display_name" id="display_name" placeholder="Display name" class="form-control"
                                   v-model="role.display_name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" @click="createRole()" class="btn btn-primary">Submit</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade" tabindex="-1" role="dialog" id="update_task_model">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update role</h4>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-danger" v-if="errors.length > 0">
                            <ul>
                                <li v-for="error in errors">{{ error }}</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label>Name*:</label>
                            <input type="text" placeholder="Role name" class="form-control"
                                   v-model="update_role.name">
                        </div>
                        <div class="form-group">
                            <label>Display name*:</label>
                            <input type="text" placeholder="Display name" class="form-control"
                                   v-model="update_role.display_name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" @click="updateRole" class="btn btn-primary">Submit</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>

</template>
<script>
    import axios from 'axios';
    export default {
        data(){
            return {
                role: {
                    name: '',
                    display_name: '',
                    created_at: '',
                },
                errors: [],
                roles: [],
                update_role: {}
            }
        },
        mounted(){
            this.readRoles();
        },
        methods: {
            initCreateRole(){
                this.errors = [];
                $("#add_task_model").modal("show");
            },
            createRole(){
                axios.post('/admin/roles', {
                    name: this.role.name,
                    display_name: this.role.display_name,
                }).then(response => {
                    this.roles.push(response.data.role);
                    this.reset();
                })
                    .catch(error => {
                        this.errors = [];
                        if (error.response.data.errors.name) {
                            this.errors.push(error.response.data.errors.name[0]);
                        }
                        if (error.response.data.errors.display_name) {
                            this.errors.push(error.response.data.errors.display_name[0]);
                        }
                    });
            },
            reset()
            {
                $("#add_task_model").modal("hide");
                this.role.name = '';
                this.role.display_name = '';
            },
            readRoles()
            {
                axios.get('/admin/roles/index')
                    .then(response => {
                        this.roles = response.data.roles;
                    });
            },
            initUpdateRole(index){
                this.errors = [];
                $("#update_task_model").modal("show");
                this.update_role = this.roles[index];
            },
            updateRole()
            {
                axios.patch('/admin/roles/' + this.update_role.id, {
                    name: this.update_role.name,
                    display_name: this.update_role.display_name,
                }).then(response => {
                    $("#update_task_model").modal("hide");
                    this.$toastr.s("Role updated successfully!");
                })
                    .catch(error => {
                        this.errors = [];
                        if (error.response.data.errors.name) {
                            this.errors.push(error.response.data.errors.name[0]);
                        }
                        if (error.response.data.errors.display_name) {
                            this.errors.push(error.response.data.errors.display_name[0]);
                        }
                    });

            },

            deleteRole(index){

                let conf = confirm("Esti sigur ca vrei sa stergi acest rol?");

                if (conf == true){
                    axios.delete('/admin/roles/{id}' + this.role[index].id)
                        .then(response => {
                            this.roles.splice(index, 1);
                            this.$toastr.s("Role deleted successfully!");
                        })
                        .catch(error => {

                        });
                }

            }

        }


    }
</script>

<style scoped>

</style>