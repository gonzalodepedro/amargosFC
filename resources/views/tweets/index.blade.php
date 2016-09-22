@extends('layout')
@section('css')
<link href="{{ asset('css/mytable.css') }}" media="all" rel="stylesheet" type="text/css" />
@stop
@section('bar')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Tweets
            <a class="btn btn-success pull-right" href="{{ route('tweets.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
                

                    <div class="col-md-12 zero-pad-left zero-pad-right"> 


<div class="panel panel-primary filterable">
<div class="panel-heading">
                <h3 class="panel-title">Users</h3>
                <a class="btn btn-success btn-xs pull-right" href="{{ route('tweets.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
<span class="glyphicon glyphicon-filter"></span> filterable
</button>

                </div>
            </div>

            <div class="collapse" id="collapseExample">
<div class="well">
 {!! Form::open(array('action' => array('TweetController@index'), 'class'=>'form width88',  'method' => 'GET')) !!}
                        {{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Title')) }}
                        {{ Form::text('body', null, array('class' => 'form-control', 'placeholder' => 'Body')) }}
                         {{ Form::submit('Search', array('class' => 'btn btn-default')) }}
                         {!! Form::close() !!} 
</div>
</div>
           
    <div class="row">
        <div class="col-md-12">
            @if($tweets->count())
                <!--<table class="table table-condensed table-striped">-->
                <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    
                    
                    <tr class="filtersLIOOOO">
                        <th>#</th>
                        <th>
                        Title
                        </th>
                        <th>
                        Body
                        </th>
                        <th>Options</th>
                    </tr>
                    <div class="pull-right">
                
                   
                </div>
                    
                </thead>
                    <tbody>
                        @foreach($tweets as $tweet)
                            <tr>
                                <td>{{$tweet->id}}</td>
                                <td>{{$tweet->title}}</td>
                    <td>{{$tweet->body}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('tweets.show', $tweet->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('tweets.edit', $tweet->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('tweets.destroy', $tweet->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $tweets->appends(Request::input())->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
    $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });
});
</script>
@stop
