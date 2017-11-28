@extends('praktikan.master')
@section('content')
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">
          #{{ $report->report_code }} - {{ $report->title }}
        </div>

        <div class="panel-body">
          @include('includes.flash')

          <div class="ticket-info">
            <p>{{ $report->description }}</p>
            <p>Category: {{ $category->category_name }}</p>
            <p>
              @if ($report->isValidated == true)
                Status: <span class="label label-success">Validated</span>
              @else
                Status: <span class="label label-danger">Not Validated</span>
              @endif
            </p>
            <p>Created on: {{ $report->created_at->diffForHumans() }}</p>
          </div>

          <hr>
          <div class="comments">
              {{-- <div class="panel panel-@if($report->user->id === $document->user_id) {{"default"}}@else{{"success"}}@endif"> --}}
                <div class="panel panel-heading">
                  {{-- {{ $document->user->name }} --}}
                  {{-- <span class="pull-right">{{ $document->created_at->format('Y-m-d') }}</span> --}}
                  @if ($document)
                    <p>File :<a href="{{url($document->filename)}}">{{$document->original_filename}}</a></p>
                  @else
                    <p class="label label-danger">No related file</p>
                  @endif
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
