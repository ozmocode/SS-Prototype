@extends('asprak.master')
@section('content')
<div class="row">
      <div class="col-lg-3 col-sm-6">
        <div class="card">
          <div class="content">
            <div class="row">
              <div class="col-xs-5">
                <div class="icon-big icon-warning text-center">
                  <i class="ti-user"></i>
                </div>
              </div>
              <div class="col-xs-7">
                <div class="numbers">
                  <p>Praktikan</p>
                  {{DB::table('users')->where('role_id',5)->count()}}
                </div>
              </div>
            </div>
            <div class="footer">
              <hr />
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card">
          <div class="content">
            <div class="row">
              <div class="col-xs-5">
                <div class="icon-big icon-danger text-center">
                  <i class="ti-pulse"></i>
                </div>
              </div>
              <div class="col-xs-7">
                <div class="numbers">
                  <p>Reports</p>
                  {{DB::table('reports')->count()}}

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
      <div class="col-lg-3 col-sm-6">
        <div class="card">
          <div class="content">
            <div class="row">
              <div class="col-xs-5">
                <div class="icon-big icon-info text-center">
                  <i class="ti-files"></i>
                </div>
              </div>
              <div class="col-xs-7">
                <div class="numbers">
                  <p>Documents</p>
                  {{DB::table('documents')->count()}}
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
@endsection
