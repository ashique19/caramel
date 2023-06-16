@extends('admin.layout')

@section('main')

<div class="column is-12-desktop is-12-mobile padding-top-10 padding-bottom-20 padding-left-0 padding-right-0 columns is-multiline" >
    
    <div class="column is-12-desktop is-12-mobile">
        <h1 class="title is-3">Users ({{ $users->total() }})</h1>
    </div>


    {!! errors($errors) !!}
    
    <section class="column is-12-desktop is-12-mobile">
        <h2 class="subtitle is-4">Search Users</h2>
        {!! Form::open(['method'=> 'POST', 'url'=> action('Users@postSearch'), 'class'=> 'form form-inline' ]) !!}
        
        {!! Form::label('name', 'Name:'  ) !!}
        {!! Form::text('name', null, ['class'=> 'form-control']  ) !!}
        
        {!! Form::label('role', 'Role:'  ) !!}
        {!! Form::select('role', \App\Role::pluck('name', 'id'), null, ['class'=> 'form-control', 'placeholder'=> '-Select-']  ) !!}
        
        {!! Form::label('email', 'Email:'  ) !!}
        {!! Form::text('email', null, ['class'=> 'form-control']  ) !!}
        
        {!! Form::label('phone', 'Phone:'  ) !!}
        {!! Form::text('phone', null, ['class'=> 'form-control']  ) !!}
        
        {!! Form::label('address', 'Address:'  ) !!}
        {!! Form::text('address', null, ['class'=> 'form-control']  ) !!}
        
        {!! Form::submit('Search', ['class'=> 'btn btn-info']) !!}
        
        {!! Form::close() !!}
    </section>


    <section class="column is-12-desktop is-12-mobile scrollable">
    <table class="table is-borderd is-striped is-narrow">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Area</th>
                <th>City</th>
                <th>Phone</th>
                <th>Orders</th>
                <th>View</th>
                <th>Modify</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @if($users)
                @foreach($users as $user)
                    
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->area}}</td>
                        <td>{{$user->city}}</td>
                        <td>{{$user->contact}}</td>
                        <td>
                            <span class="tag is-dark">{{ $user->orders()->count() }}</span>
                        </td>
                        <td><a href="{{action('Users@show', $user->id)}}" class="button is-primary is-small"><i class="fas fa-eye"></i></a></td>
                        <td>
                            <a href="{{action('Users@edit', $user->id)}}" class="button is-warning is-small"><i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                            {!! Form::open(['url'=>action('Users@destroy', $user->id), 'method'=>'DELETE']) !!}
                            {!! Form::hidden('id',$user->id) !!}
                            <button class="button is-small is-danger"> <i class="fas fa-trash"></i> </button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    </section>
    
    {!! $users->render() !!}

@stop