@extends('layouts.manage')

@section('content')

    <div class=" flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title">Edit User</h1>
            </div>
        </div>
        <hr class="m-t-0">
        <form action="{{route('users.update',$user->id)}}" method="post">
            {{method_field('put')}}
            {{csrf_field()}}

        <div class="columns">
            <div class="column">

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


            </div> {{--end if 1st column --}}

            <div class="column">
                <label for="roles" class="label">Roles : </label>
                <input type="hidden" class="input" name="roles"  :value="rolesSelected">
                <ul>
                    @foreach($roles as $role)
                        <div class="field">
                            <b-checkbox v-model="rolesSelected" :native-value="{{$role->id}}">
                                {{$role->display_name}}</b-checkbox>
                        </div>
                    @endforeach
                </ul>
            </div>   {{--end if 2nd column --}}

        </div>
        <div class="columns">
            <div class="column">
                <hr>
                <button class="button is-primary is-pulled-right" type="submit">Edit User</button>

            </div>
        </div>
        </form>

    </div>   {{--end if flex container --}}
@endsection

@section('scripts')
    <script>
        var app= new Vue({
            el:'#app',
            data() {
                return {
                    password_options: 'keep',
                    rolesSelected:{!! $user->roles->pluck('id') !!}
                }
            }
        });
    </script>
@endsection