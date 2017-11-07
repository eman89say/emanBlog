@extends('layouts.manage')

@section('content')
    <div class=" flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title">Manage Permissions</h1>
            </div>
            <div class="column">
                <a href="{{route('permissions.create')}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-l-10"></i> &nbsp; Create New Permission</a>
            </div>
        </div>
        <hr>

        <div class="card">
            <div class="card-content">
                <table class="table is-narrow is-striped is-fullwidth">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td>{{$permission->name}}</td>
                            <td>{{$permission->display_name}}</td>
                            <td>{{$permission->description}}</td>
                            <td class="has-text-right">
                                <a class="button is-outlined m-r-10" href="{{route('permissions.show',$permission->id)}}">View</a>
                                <a class="button is-outlined" href="{{route('permissions.edit',$permission->id)}}">Edit</a> </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div> {{--end of the card--}}
    </div>
@endsection