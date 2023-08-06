@extends('adminlte::page')

@section('title', config("app.name").'-' )

@section('content_header')
<h1 class="m-0 text-dark">{{ $title??'' }}</h1>
@stop

@section('content')

<x-adminlte-card title="{{ $title??'' }}" header-class="bg-light">
    <x-slot name="toolsSlot">
        <a href="{{ $resource_path.'/create' }}">
            <x-adminlte-button theme="info" icon="fa fa-twitter" />
        </a>
    </x-slot>
    <div class="card-block">
        <div class="dt-responsive table-responsive">
            <table id="scr-vrt-dt" class="table table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th>Sl.No.</th>
                        @foreach($table_headings as $name => $db_column)
                        <th>{{ucfirst($name)}}</th>
                        @endforeach
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $datum)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            @foreach($table_headings as $name => $db_column)
                            <td>{!! $datum->{$db_column} !!}</td>
                            @endforeach
                            <td colspan="2" >
                                 <div data-toggle="tooltip" data-placement="top" title="Edit" >
                                    <a href="{{$resource_path}}/{{$datum->id}}/edit"   > 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-vector-pen" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M10.646.646a.5.5 0 0 1 .708 0l4 4a.5.5 0 0 1 0 .708l-1.902 1.902-.829 3.313a1.5 1.5 0 0 1-1.024 1.073L1.254 14.746 4.358 4.4A1.5 1.5 0 0 1 5.43 3.377l3.313-.828L10.646.646zm-1.8 2.908-3.173.793a.5.5 0 0 0-.358.342l-2.57 8.565 8.567-2.57a.5.5 0 0 0 .34-.357l.794-3.174-3.6-3.6z"/>
                                            <path fill-rule="evenodd" d="M2.832 13.228 8 9a1 1 0 1 0-1-1l-4.228 5.168-.026.086.086-.026z"/>
                                          </svg>
                                    </a>
                                </div> 
                             {{--    <div data-toggle="tooltip" data-placement="top" title="make {{$datum->is_active?'inactive':'active'}}"  >
                                    <form method="POST" action="{{$entity['resource_path']}}/{{$datum->id}}" >
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-icon btn-active-color-primary btn-sm" >
                                            @if($datum->is_active==1)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                              </svg>
                                            @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                                <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                                                <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                                                <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
                                              </svg>

                                            @endif
                                        </button>
                                    </form>
                                </div> --}}
                            </td>
                        </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>
    </div>



    {{-- <x-slot name="footerSlot">
        <x-adminlte-button class="d-flex ml-auto" theme="light" label="submit" icon="fas fa-sign-in" />
    </x-slot> --}}
</x-adminlte-card>


@stop
