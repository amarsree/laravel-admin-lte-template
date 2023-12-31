<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Traits\CrudTrait;

class StateController extends Controller
{
    use CrudTrait;

    protected $modal;

    protected $modalStructure;

    protected $title;

    protected $resource_path;

    public function __construct()
    {
        $this->modal = new State;
        $this->title = 'state';
        $this->modalStructure = config('form_fields.state');
        $this->resource_path = url('states');
    }
}
