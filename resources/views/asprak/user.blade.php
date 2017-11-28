@extends('asprak.master')
@section('content')
  <div class="row">
        <div class="class col-md-10">

            <table class="tabel table-striped">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Email</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)

                <tr>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                </tr>
              @endforeach
              </tbody>
            </table>
            </div>
        </div>
      </div>
@endsection
