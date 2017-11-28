{{$data->role_name}}
@foreach ($data->user as $record)
  {{$record->name}}
@endforeach
