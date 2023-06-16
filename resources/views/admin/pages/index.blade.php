@extends('admin.layout')

@section('title') Page @stop

@section('main')

<section class="hero is-fullheight is-primary is-bold">
    <div class="hero-body">
        <div class="container">
            
            <nav class="level">
                <div class="level-item level-left">
                    <div>
                        <h1 class="title is-1">Pages @if($pages) : {{$pages->total()}} @endif</h1>
                    </div>
                </div>
            </nav>
            
            <section class="columns is-multiline">
                
                <div class="column is-12">
                    
                    {!! errors( $errors ) !!}
                    
                </div>
                
                <div class="column is-12">
                    
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                				<th>Id</th>
                				<th>Name</th>
                				<th>Created at</th>
                				<th>Updated at</th>
                                <th>Show</th>
                                <th>Modify</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($pages)
                                @foreach($pages as $page)
                                    <tr>
                						<td>{{$page->id}}</td>
                						<td>{{$page->name}}</td>
                						<td>{{$page->created_at}}</td>
                						<td>{{$page->updated_at}}</td>
                                        <td>
                                            <a href="{{action('Pages@show', $page->id)}}" class="btn btn-default btn-sm btn-rounded" title="Edit role"><span class="fa fa-expand"></span></a>
                                        </td>
                                        <td>
                                            <a href="{{action('Pages@edit', $page['id'])}}" class="btn btn-default btn-sm btn-rounded" title="Edit role"><span class="fa fa-pencil"></span></a>
                                        </td>
                                        <td>
                                            {!! Form::open(['method'=>'delete', 'url'=> action('Pages@destroy', $page->id) ]) !!}
                                            {!! Form::hidden('id', $page->id ) !!}
                                            <button href="{{action('Pages@edit',[$page->id])}}" class="btn btn-danger btn-sm btn-rounded" title="Delete page ">
                                                <span class="fa fa-times"></span>
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    {!! $pages->render() !!}
                    
                </div>
                
            </section>
            
        </div>
    </div>
</section>


@stop
        