@extends('admin.layout')

@section('title')Circular - {{ settings()->application_name }} @stop

@section('main')

<section class="hero is-fullheight is-primary is-bold">
    <div class="hero-body">
        <div class="container">
            
            <nav class="level">
                <div class="level-item level-left">
                    <div>
                        <h1 class="title is-1">Circulars @if( $circulars ) : {{ $circulars->total() }} @endif</h1>
                    </div>
                </div>
            </nav>
            
            <section class="columns is-multiline">
                
                <div class="column is-12">
                    {!! errors($errors) !!}
                </div>
                
                <div class="column is-12 has-text-right">
                    <a href="{{action('Circulars@create')}}" class="button is-primary">Add new</a>
                </div>
                
                <div class="column is-12">
                    
                    <table class="table">
                        <thead>
                            <tr>
                				<th>Id</th>
                				<th>Name</th>
                				<th>Deadline date</th>
                				<th>Last Modified</th>
                                <th width="50">More</th>
                                <th width="50"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($circulars)
                                @foreach($circulars as $circular)
                                    <tr>
                						<td>{{$circular->id}}</td>
                						<td>{{$circular->name}}</td>
                						<td>{{$circular->deadline_date->format('Y-M-d')}}</td>
                						<td>{{$circular->updated_at->format('Y-M-d')}}</td>
                                        <td>
                                            <button type="button" 
                                                    class="button is-default" 
                                                    data-container="body" 
                                                    data-toggle="popover" 
                                                    data-html="true"
                                                    data-placement="left"
                                                    data-content='
                                                    <div class="box">
                                                        {!! views("Circulars", $circular->id, "Show", ["class"=>"button is-default"]) !!}
                                                        {!! edits("Circulars", $circular["id"], "Edit", ["class"=>"button is-primary"]) !!}
                                                    </div>
                                                    '>
                                                <i class="fa fa-gear"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <a  tabindex="0" 
                                                class="button is-danger" 
                                                role="button" 
                                                data-toggle="popover" 
                                                data-trigger="focus" 
                                                data-html="true"
                                                title="Delete" 
                                                data-placement="left"
                                                data-content='
                                                <div class="box">
                                                    <h4>Are you sure?</h4>
                                                    {!! deletes("Circulars", $circular["id"], "YES", ["class"=>"button is-danger"]) !!}
                                                    <button class="button is-success">NO</button>
                                                </div>
                                                '>
                                                <i class='fa fa-trash-o fa-2x'></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    {!! $circulars->render() !!}
                    
                </div>
                
            </section>
            
        </div>
    </div>
</section>




<section class="col-sm-10 col-sm-offset-1 col-xs-12">
    
    
</section>
        

@stop