@extends('praktikan.master')
@section('content')
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <a href="{{route('praktikan.reports.create')}}" class="btn btn-danger">Add New Report</a>
    </div>
  </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-ticket"> Reports</i>
                </div>
                <div class="panel-body">
                    @if ($reports->isEmpty())
                        <p>There are currently no reports.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Last Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($reports as $report)
                                <tr>
                                    <td>
                                    @foreach ($categories as $category)
                                        @if ($category->id === $report->category_id)
                                            {{ $category->category_name }}
                                        @endif
                                    @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ url('praktikan/reports/'. $report->report_code) }}">
                                            #{{ $report->report_code }} - {{ $report->title }}
                                        </a>
                                    </td>
                                    <td>
                                    @if ($report->isValidated == true)
                                        <span class="label label-success">Validated</span>
                                    @else
                                        <span class="label label-danger">Not Validated</span>
                                    @endif
                                    </td>
                                    <td>{{ $report->updated_at }}</td>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{-- {{ $reports->render() }} --}}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
