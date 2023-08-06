@extends('adminlte::page')

@section('title', config("app.name").'-' )

@section('content_header')
<h1 class="m-0 text-dark">{{ $title??'' }}</h1>
@stop

@section('content')

<x-adminlte-card title="{{ $title??'' }}"   header-class="bg-light"  >
    <x-slot name="toolsSlot">
   
    </x-slot>

        <form id="form" method="post" action="{{$resource_path}}/{{$entity->id}}" >
            @csrf   
            {{ method_field('PUT') }}
            <div class="row">
                @include('common.input_fields_page' ,['input_fields'=> $input_fields] )
            </div>
            <div class="row">
                    <button type="submit" class="btn btn-primary m-b-0">Submit</button>
            </div> 
        </form>



  {{--  --}}
</x-adminlte-card>


@stop

