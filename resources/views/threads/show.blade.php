@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="#">{{ $thread->creator->name }}</a> posted:
                    {{ $thread->title }}</div>
                <div class="panel-body">
                {{ $thread->body }}
                </div>
            </div>
        </div>
    </div>

 <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach ($thread->replies as $reply)
            <div class="panel panel-default">
              <div class="panel-heading">
              <a href="#">
              {{ $reply->owner->name }}</a> said {{ $reply->created_at->diffForHumans() }}
              </div>
                <div class="panel-body">
                {{ $reply->body }}
                </div>
            </div>
            @endforeach
        </div>
 </div>


 @if (auth()->check())
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form method="POST" action="{{ $thread->path(). '/replies'}}">
            {{ csrf_field() }}
                <div class="form-group">
                    <textarea name="body" id="body" class="form-control" placeholder="Laat een reactie achter" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-default">Plaats</button>
            </form>
        </div>
    </div>
 @else
    <p class="text-center"><a href="{{ route('login') }}">Login</a> om te kunnen reageren</p>
 @endif
</div>

@endsection
