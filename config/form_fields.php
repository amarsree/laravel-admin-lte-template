<?php

return [
    'state' => [
        [
            'type' => 'text',
            'name' => 'name',
            'id' => 'name',
            'label' => 'Name',
            'input_field_class' => 'col-12',
            'required' => true,
            'validations' => 'required|unique:States,name|max:100',
        ],
        [
            'type' => 'textarea',
            'name' => 'description',
            'id' => 'description',
            'label' => 'Description',
            'input_field_class' => 'col-12',
            'required' => true,
            'validations' => 'required',
        ],
    ],
];
