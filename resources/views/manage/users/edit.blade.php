@extends('layouts.manage')

@section('content')

    <div class=" flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title">Edit User</h1>
            </div>
        </div>
        <hr class="m-t-0">

        <div class="columns">
            <div class="column">
                <form action="{{route('users.update',$user->id)}}" method="post">
                    {{method_field('put')}}
                    {{csrf_field()}}
                    <div class="field">
                        <label for="name" class="label">Name : </label>
                        <p class="control">
                            <input type="text" class="input" name="name" id="name" value="{{$user->name}}">
                        </p>
                    </div>

                    <div class="field">
                        <label for="email" class="label">Email Address : </label>
                        <p class="control">
                            <input type="text" class="input" name="email" id="email" value="{{$user->email}}">
                        </p>
                    </div>

                    <div class="field">
                        <label for="password" class="label">Password : </label>

                           <div class="password_options m-b-10">
                            <div class="field">
                                <b-radio  native-value="keep" v-model="password_options">Do Not Change Password</b-radio>
                            </div>
                            <div class="field">
                                <b-radio  native-value="auto" v-model="password_options">Generate New Password</b-radio>
                            </div>
                            <div class="field">
                                <b-radio  native-value="manual" v-model="password_options">Manually Set New Password</b-radio>
                            </div>
                           </div>

                        <p class="control">
                            <input type="text" class="input" name="password" id="password" v-if="password_options == 'manual'" placeholder="Manually reset password to this user">
                        </p>
                    </div>

                    <button class="button is-primary" type="submit">Edit User</button>


                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var app= new Vue({
            el:'#app',
            data() {
                return {
                    password_options: ''
                }
            }
        });
    </script>
@endsection