<!-- Temporary -->
{{--{!! Form::hidden('user_id', 1) !!}--}}

<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'foo' => 'bar']) !!}
</div>
<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control', 'foo' => 'bar']) !!}
</div>
<div class="form-group">
    {!! Form::label('published_at', 'Published at:') !!}
    {!! Form::input('date', 'published_at', $article->published_at->format('Y-m-d'), ['class' => 'form-control', 'foo' => 'bar']) !!}
</div>
<div class="form-group">
    {!! Form::label('tag_list', 'Tags:') !!}
    {!! Form::select('tag_list[]', $tags/*array*/, (!isset($article) || $article == null ? null : $article->tags()->lists('id')->toArray())/*selected*/, [ 'id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => '']) !!}
</div>

@section('footer')
    <script>
        $('#tag_list').select2({
            placeholder: 'Choose a tag',
            tags: true,
        });
    </script>
@endsection