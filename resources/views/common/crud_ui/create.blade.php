@extends('adminlte::page')

@section('title', config("app.name").'-' )

@section('content_header')
<h1 class="m-0 text-dark">{{ $title??'' }}</h1>
@stop

@section('content')

<x-adminlte-card title="{{ $title??'' }}"   header-class="bg-light"  >
    <x-slot name="toolsSlot">
       {{--  <x-adminlte-button theme="info" icon="fab fa-fw fa-lg fa-plus"/> --}}
     {{--   @if(!empty($add_url))
        <a href="{{ $add_url }}" >
            <x-adminlte-button theme="info" icon="fa fa-twitter"/>
        </a>
       @endif --}}
    </x-slot>

        <form id="form" method="post" action="{{$resource_path}}" >
            @csrf
            <div class="row">
                @include('common.input_fields_page' ,['input_fields'=> $input_fields] )
            </div>
            <div class="row">
                    <button type="submit" class="btn btn-primary m-b-0">Submit</button>
            </div>
            {{-- <x-slot name="footerSlot">
                 <x-adminlte-button class="d-flex ml-auto" theme="light" label="submit" icon="fas fa-sign-in" />
            </x-slot>  --}}
        </form>



  {{--  --}}
</x-adminlte-card>


@stop
