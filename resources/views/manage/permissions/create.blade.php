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
                    <div class="permissionType m-b-10">
                        <div class="field">
                            <b-radio  native-value="basic" v-model="permissionType">Basic Permission</b-radio>
                        </div>
                        <div class="field">
                            <b-radio  native-value="crud" v-model="permissionType">CRUD Permission </b-radio>
                        </div>

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
                auto_password:true


            }
        });
    </script>
@endsection