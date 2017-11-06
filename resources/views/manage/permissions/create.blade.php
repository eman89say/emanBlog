@extends('layouts.manage')

@section('content')
    <div class=" flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title">Create New Permission</h1>
            </div>
        </div>
        <hr class="m-t-0">

        <div class="columns">
            <div class="column">
                <form action="{{route('permissions.store')}}" method="post">
                    {{csrf_field()}}

                    <div class="permissionType block m-b-10">
                            <b-radio  native-value="basic" v-model="permissionType">Basic Permission</b-radio>
                            <b-radio  native-value="crud" v-model="permissionType">CRUD Permission </b-radio>
                    </div>

                    <div class="field" v-if="permissionType =='basic'">
                        <label for="display_name" class="label">Name (Display Name) </label>
                        <p class="control">
                            <input type="text" class="input" name="display_name" id="display_name">
                        </p>
                    </div>

                    <div class="field" v-if="permissionType =='basic'">
                        <label for="name" class="label">Slug </label>
                        <p class="control">
                            <input type="text" class="input" name="name" id="name">
                        </p>
                    </div>

                    <div class="field" v-if="permissionType =='basic'">
                        <label for="description" class="label">Description </label>
                        <p class="control">
                            <input type="text" class="input" name="description" id="description" placeholder="Describe what this permission does">
                        </p>
                    </div>

                    <div class="field" v-if="permissionType =='crud'">
                        <label for="resources" class="label">Resource</label>
                        <p class="control">
                            <input type="text" class="input" name="resources" id="resources" v-model="resource" placeholder="The name of the resource">
                        </p>
                    </div>

                    <div class="columns" v-if="permissionType =='crud'">
                        <div class="column">
                            <div class="crudSelected block">
                                <div class="field">
                                    <b-checkbox native-value="create" v-model="crudSelected">Create</b-checkbox>
                                </div>
                                <div class="field">
                                    <b-checkbox native-value="read" v-model="crudSelected">Read</b-checkbox>
                                </div>
                                <div class="field">
                                    <b-checkbox native-value="update" v-model="crudSelected">Update</b-checkbox>
                                </div>
                                <div class="field">
                                    <b-checkbox native-value="delete" v-model="crudSelected">Delete</b-checkbox>
                                </div>
                            </div>
                        </div>  {{--end of column--}}

                        <input type="hidden" name="crud_selected" :value="crudSelected">

                        <div class="column">
                            <table class="table is-hoverable is-bordered is-striped">
                                <thead>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Description</th>
                                </thead>
                                <tbody v-if="resource.length >= 3">
                                <tr v-for="item in crudSelected">
                                    <td v-text="crudName(item)"></td>
                                    <td v-text="crudSlug(item)"></td>
                                    <td v-text="crudDescription(item)"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>  {{--end of column--}}
                    </div>


                    <button class="button is-success" type="submit">Create Permission</button>


                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script type="text/javascript">
        var app= new Vue({
            el:'#app',
            data:{
                permissionType:'basic',
                resource:'',
                crudSelected:['create','read','update','delete']
            },
            methods:{
                crudName: function (item) {
                    return item.substr(0,1).toUpperCase()+item.substr(1)+ " "+app.resource.substr(0,1).toUpperCase()+app.resource.substr(1);
                },
                crudSlug: function (item) {
                    return item.toLowerCase()+ "-"+app.resource.toLowerCase();
                },
                crudDescription: function (item) {
                    return "Allow a User to " +item.toUpperCase()+ " a "+app.resource.substr(0,1).toUpperCase()+app.resource.substr(1);
                },
        }
        });
    </script>
@endsection