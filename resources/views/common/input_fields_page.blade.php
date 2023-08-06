@foreach($input_fields as $input_field)
@php
if(!empty($entity) ){
    $input_field['value'] = $entity->{$input_field['name']};
}
@endphp
@switch($input_field['type'])
@case('text')

    <x-adminlte-input name="{{$input_field['name']}}"
        label="{{$input_field['label']}}"
         placeholder="{{$input_field['label']}}" 
        fgroup-class="{{ $input_field['input_field_class']??'col-md-6' }}"
        value="{{$input_field['value']??''}}"
        enable-old-support
        />
@break
 @case('textarea')
    <x-adminlte-text-editor
        name="{{ $input_field['name'] }}"
        label="{{ $input_field['label'] }}"
        placeholder="{{ $input_field['label'] }}"
        fgroup-class="{{ $input_field['input_field_class']??'col-md-6' }}"
        enable-old-support
    >
    {{$input_field['value']??''}}
     </x-adminlte-text-editor>
@break 

@endswitch
@endforeach
