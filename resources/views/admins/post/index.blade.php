@extends('layouts.admin.master')
@section('content')
<div class="content-wrapper" style="min-height: 901px;">
    <div style="padding: 0px; background: white; z-index: 999999; font-size: 16px; font-weight: 600;">
    </div>
    <section class="content">
        @foreach ($posts as $post)
        <div class="post">
            <h4>
                <a href="#" target="_blank">
                    {{$post->title}}
                </a>
            </h4>
            <a href=" {{ route('post.show', $post->slug) }}" target="_blank">
                {{ route('post.show', $post->slug) }}
            </a>
            {!! substr($post->content, 0,200)!!}[...]
            <br>
                <div class="actions">
                   <a class="btn btn-danger pull-right" data-toggle="modal" href="#myModal{{$post->id}}">
                        <i class="fa fa-trash">
                        </i>
                    </a>
                    <a class="btn btn-info pull-right" href="{{ route('post.edit', $post->slug) }}">
                        <i class="fa fa-pencil">
                        </i>
                    </a>
                </div>
                <div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="myModal{{$post->id}}" role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                                    ×
                                </button>
                                <h4 class="modal-title">
                                    Warning
                                </h4>
                            </div>
                            <div class="modal-body">
                                Are you sure to delete this post?
                            </div>
                            <div class="modal-footer">
                                 <form accept-charset="utf-8" action="{{route('post.destroy',['slug' => $post->slug])}}" method="POST">
				                     <button class="btn btn-default " data-dismiss="modal" type="button">
				                    Close
				                </button>
				                 <input name="_method" type="hidden" value="DELETE">
				                    {!! csrf_field() !!}
				                    <input class="btn btn-danger" type="submit" value="Ok">
				                    </input>
				            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </br>
        </div>
        @endforeach
    </section>
</div>
@stop
