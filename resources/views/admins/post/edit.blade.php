@extends('layouts.admin.master')
@push('js-head')
<script language="javascript" src="{{ asset('plugins/ckeditor/ckeditor.js') }}" type="text/javascript">
</script>
@endpush
@section('content')
<div class="content-wrapper" style="min-height: 901px;">
    <div style="padding: 0px; background: white; z-index: 999999; font-size: 16px; font-weight: 600;">
    </div>
    <section class="content">
        <form action="{{ route('post.update', $post->slug) }}" method="POST">
            {!! method_field('PUT')!!}
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="title">
                    Title
                </label>
                <input class="form-control" name="title" required="" type="text" value="{{ $post->title }}">
                </input>
            </div>
            <div class="form-group">
                <label for="content">
                    Content
                </label>
                <textarea cols="80" id="content" name="content" rows="10">
                    {{ $post->content }}
                </textarea>
                @push('script')
                <script>
                    CKEDITOR.replace( 'content' );
                </script>
                @endpush
                <button class="btn btn-primary" type="submit">
                    Submit
                </button>
            </div>
        </form>
    </section>
</div>
@stop
