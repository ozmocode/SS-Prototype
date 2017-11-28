@extends('lptsi.master')
@section('content')
  <div class="row">
        <div class="col-lg-3 col-sm-6">
          <div class="card">
            <div class="content">
              <div class="row">
                <div class="col-xs-5">
                  <div class="icon-big icon-warning text-center">
                    <i class="ti-crown"></i>
                  </div>
                </div>
                <div class="col-xs-7">
                  <div class="numbers">
                    <p>{{Auth::user()->find(1)->role->role_name}}</p>
                    {{DB::table('roles')->where('role_name','LPTSI')->count()}}
                  </div>
                </div>
              </div>
              <div class="footer">
                <hr />
                <div class="stats">
                  {{-- <i class="ti-timer"></i>Updated at : --}}
                  {{-- <form action="user/show/1">
                    <button type="submit" class="btn btn-info" >Detail</button>
                  </form> --}}
                  <a href="{{ route('lptsi.users.show', 1) }}" class="btn btn-info" onkeyup="">Detail</a>
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
                  <div class="icon-big icon-danger text-center">
                    <i class="ti-headphone-alt"></i>
                  </div>
                </div>
                <div class="col-xs-7">
                  <div class="numbers">
                    <p>{{Auth::user()->find(2)->role->role_name}}</p>
                    {{DB::table('roles')->where('role_name','LPTSI')->count()}}
                  </div>
                </div>
              </div>
              <div class="footer">
                <hr />
                <div class="stats">
                  <i class="ti-time"></i> Updated at
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
                    <i class="ti-wordpress"></i>
                  </div>
                </div>
                <div class="col-xs-7">
                  <div class="numbers">
                    <p>{{Auth::user()->find(3)->role->role_name}}</p>
                    {{DB::table('roles')->where('role_name','Web Admin')->count()}}
                  </div>
                </div>
              </div>
              <div class="footer">
                <hr />
                <div class="stats">
                  <i class="ti-timer"></i> Updated at
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
                    <i class="ti-user"></i>
                  </div>
                </div>
                <div class="col-xs-7">
                  <div class="numbers">
                    <p>{{Auth::user()->find(4)->role->role_name}}</p>
                    {{DB::table('roles')->where('role_name','Asisten Praktikum')->count()}}
                  </div>
                </div>
              </div>
              <div class="footer">
                <hr />
                <div class="stats">
                  <i class="ti-timer"></i> Updated at
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
                  <div class="icon-big text-center">
                    <i class="ti-user"></i>
                  </div>
                </div>
                <div class="col-xs-7">
                  <div class="numbers">
                    <p>{{Auth::user()->find(5)->role->role_name}}</p>
                    {{DB::table('roles')->where('role_name','Praktikan')->count()}}
                  </div>
                </div>
              </div>
              <div class="footer">
                <hr />
                <div class="stats">
                  <i class="ti-timer"></i> Updated at
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
