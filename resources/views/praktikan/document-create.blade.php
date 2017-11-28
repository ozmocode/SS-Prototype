@extends('praktikan.master')
@section('content')

{{Form::open(['route' => 'praktikan.documents.store', 'files' => true])}}

{{Form::label('Category')}}

<select class="form-group" name="category">
  @foreach ($categories as $category)
    <option value="{{$category->id}}">{{$category->category_name}}</option>
  @endforeach
</select>
<hr>

{{Form::label('Related Report')}}
<select class="form-group" name="report">
  @foreach ($reports as $report)
    <option value="{{$report->id}}">{{$report->title}}</option>
  @endforeach
</select>
<hr>
{{Form::label('upload_file', 'Upload File',['class' => 'control-label'])}}
{{Form::file('user_file')}}
<hr>
{{Form::submit('Save', ['class' => 'btn btn-info'])}}
{{Form::close()}}
@endsection
