@extends('webadmin.master')
@section('content')
<div class="row">
      <div class="col-lg-3 col-sm-6">
        <div class="card">
          <div class="content">
            <div class="row">
              <div class="col-xs-5">
                <div class="icon-big icon-warning text-center">
                  <i class="ti-files"></i>
                </div>
              </div>
              <div class="col-xs-7">
                <div class="numbers">
                  <p>Tickets</p>
                  {{DB::table('tickets')->where('user_id',Auth::user()->id)->count()}}
                </div>
              </div>
            </div>
            <div class="footer">
              <hr />
            </div>
          </div>
        </div>
      </div>
  </div>
    <div class="row">
      <hr>
@endsection
