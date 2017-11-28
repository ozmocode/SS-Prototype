@extends('asprak.master')
@section('content')
  <div class="row">
  </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="card">
              @foreach ($documents as $document)
                <ul>
                  <p>File :<a href="{{url($document->filename)}}">{{$document->original_filename}}</a></p>
                  <p>Related Report: <a href="reports/{{($document->report->report_code)}}">{{$document->report->title}}</a></p>
                  <hr>
                </ul>
              @endforeach

            </div>
        </div>
    </div>
@endsection
