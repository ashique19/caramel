@extends('public.layouts.layout')
@section('title')Categories - {{ settings()->application_name }} @stop
@section('main')

<div class="column is-12">
    <h1 class="title is-3">
        Categories @if( $categories ) : {{ $categories->total() }} @endif
        <a href="{{action('Categories@create')}}" class="button is-small yellow-bg yellow-border white-text is-pulled-right">Add new</a>
    </h1>
</div>

        
<section class="column is-12">
    
    <table class="table is-bordered">
        <thead>
            <tr>
				<th>Id</th>
				<th>Name</th>
				<th>Name slug</th>
				<th>Last Modified</th>
                <th width="50">More</th>
                <th width="50"><i class="fas fa-trash-o fa-2x"></i></th>
            </tr>
        </thead>
        <tbody>
            @if($categories)
                @foreach($categories as $category)
                    <tr>
						<td>{{$category->id}}</td>
						<td>{{$category->name}}</td>
						<td>{{$category->name_slug}}</td>
						<td>{{$category->updated_at ? $category->updated_at->format('Y-M-d') : "" }}</td>
                        <td>
                            <button type="button" 
                                    class="btn btn-default" 
                                    data-container="body" 
                                    data-toggle="popover" 
                                    data-placement="bottom"
                                    data-html="true"
                                    data-content="
                                        {!! views('Categories', $category->id, '<span class=\'fa fa-expand\'></span>', ['class'=>'btn btn-default btn-rounded btn-block']) !!}
                                        {!! edits('Categories', $category['id'], '<span class=\'fa fa-pencil\'></span>', ['class'=>'btn btn-default btn-rounded btn-block']) !!}
                                    ">
                                <i class="fa fa-gear"></i>
                            </button>
                        </td>
                        <td>
                            <a  tabindex="0" 
                                class="btn btn-lg btn-danger" 
                                role="button" 
                                data-toggle="popover" 
                                data-trigger="focus" 
                                data-html="true"
                                title="Delete" 
                                data-content="
                                <h4>Are you sure?</h4>
                                {!! deletes('Categories', $category['id'], 'YES', ['class'=>'btn btn-default btn-rounded btn-block']) !!}
                                <button class='btn btn-default btn-rounded btn-block'>NO</button>
                                ">
                                <i class='fa fa-trash-o fa-2x'></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {!! $categories->render() !!}
</section>
        

@stop