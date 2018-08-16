<template>
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-12">
                <div class="content" style="margin-bottom: 15px;">
                    <h4>Users list</h4>
                </div>
                <div class="content" style="margin-bottom: 15px;">
                    <button @click="initCreateUser()" class="btn btn-primary btn-xs">
                        + Add new user
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" v-if="users.length > 0">
                        <thead>
                        <th>
                            No.
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Email
                        </th>
                        <th></th>
                        </thead>
                        <tbody>
                        <tr v-for="(user, index) in users">
                            <td>{{ index + 1 }}</td>
                            <td>
                                {{ user.name }}
                            </td>
                            <td>
                                {{ user.email }}
                            </td>
                            <td align="right">
                                <button @click="initUpdateUser(index)" class="btn btn-primary btn-xs"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                <button @click="deleteUser(index)" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
                        <h4 class="modal-title">Add New User</h4>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-danger" v-if="errors.length > 0">
                            <ul>
                                <li v-for="error in errors">{{ error }}</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label>Name*:</label>
                            <input type="text" name="name" id="name" placeholder="User name" class="form-control"
                                   v-model="user.name">
                        </div>
                        <div class="form-group">
                            <label>Email*:</label>
                            <input type="text" name="email" id="email" placeholder="User email" class="form-control"
                                   v-model="user.email">
                        </div>
                        <div class="form-group">
                            <label>Password*:</label>
                            <input type="text" name="password" id="password" placeholder="User password" class="form-control"
                                   v-model="user.password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" @click="createUser()" class="btn btn-primary">Submit</button>
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
                        <h4 class="modal-title">Update user</h4>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-danger" v-if="errors.length > 0">
                            <ul>
                                <li v-for="error in errors">{{ error }}</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label>Name*:</label>
                            <input type="text" placeholder="User name" class="form-control"
                                   v-model="update_user.name">
                        </div>
                        <div class="form-group">
                            <label>Email*:</label>
                            <input type="text" placeholder="User email" class="form-control"
                                   v-model="update_user.email">
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="text" placeholder="User password" class="form-control"
                                   v-model="update_user.password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" @click="updateUser" class="btn btn-primary">Submit</button>
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
                user: {
                    name: '',
                    email: '',
                    password: ''
                },
                errors: [],
                users: [],
                update_user: {}
            }
        },
        mounted(){
            this.readUsers();
        },
        methods: {
            initCreateUser(){
                this.errors = [];
                $("#add_task_model").modal("show");
            },
            createUser(){
                axios.post('/users', {
                    name: this.user.name,
                    email: this.user.email,
                    password: this.user.password,
                }).then(response => {
                        this.reset();
                        this.users.push(response.data.user);
                        $("#add_task_model").modal("hide");
                        this.$toastr.s("User created successfully!");
                    })
                    .catch(error => {
                        this.errors = [];
                        if (error.response.data.errors.name) {
                            this.errors.push(error.response.data.errors.name[0]);
                        }

                        if (error.response.data.errors.email) {
                            this.errors.push(error.response.data.errors.email[0]);
                        }
                        if (error.response.data.errors.password) {
                            this.errors.push(error.response.data.errors.password[0]);
                        }
                    });
            },
            reset()
            {
                this.user.name = '';
                this.user.email ='';
                this.user.password ='';
            },
            readUsers()
            {
                axios.get('/users')
                    .then(response => {
                        this.users = response.data.users;
                    });
            },
            initUpdateUser(index){
                this.errors = [];
                $("#update_task_model").modal("show");
                this.update_user = this.users[index];
            },
            updateUser()
            {
                axios.patch('/users/' + this.update_user.id, {
                    name: this.update_user.name,
                    email: this.update_user.email,
                    password: this.update_user.password,
                }).then(response => {
                        $("#update_task_model").modal("hide");
                        this.$toastr.s("User updated successfully!");
                    })
                    .catch(error => {
                        this.errors = [];
                        if (error.response.data.errors.name) {
                            this.errors.push(error.response.data.errors.name[0]);
                        }

                        if (error.response.data.errors.email) {
                            this.errors.push(error.response.data.errors.email[0]);
                        }
                    });

            },

            deleteUser(index){

                let conf = confirm("Esti sigur ca vrei sa stergi utilizatorul?");

                if (conf == true){
                    axios.delete('/users/' + this.users[index].id)
                        .then(response => {
                            this.users.splice(index, 1);
                            this.$toastr.s("User deleted successfully!");
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