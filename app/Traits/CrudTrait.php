<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait CrudTrait
{
    public function index()
    {
        $entity_data = $this->modal->orderBy('created_at', 'desc')->get();

        $data = [
            'title' => $this->title,
            'resource_path' => $this->resource_path,
            'data' => $entity_data,
            'table_headings' => $this->get_values_as_key_pair(collect($this->modalStructure), 'label', 'name'),
        ];

        return view('common.crud_ui.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => $this->title,
            'resource_path' => $this->resource_path,
            'input_fields' => $this->modalStructure,
        ];

        return view('common.crud_ui.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->get_values_as_key_pair(collect($this->modalStructure), 'name', 'validations'));

        $this->save_modal($this->modal, $validated);

        return redirect($this->resource_path)->with('message-success', $request->name . ' added successfully');
    }

    public function edit($id)
    {
        $entity = $this->modal::findOrFail($id);

        $data = [
            'title' => $this->title,
            'resource_path' => $this->resource_path,
            'entity' => $entity,
            'input_fields' => $this->modalStructure,
        ];

        return view('common.crud_ui.update', $data);
    }

    public function update(Request $request, $id)
    {
        $entity = $this->modal::findOrFail($id);

        $validated = $request->validate($this->get_values_as_key_pair(collect($this->modalStructure), 'name', 'validations'));

        $this->save_modal($entity, $validated);

        return redirect($this->resource_path)->with('message-success', $request->name . ' updated successfully');
    }

    public function destroy($id)
    {
        $entity = $this->modal::findOrFail($id);

        if ($entity->is_active) {
            $entity->update(['is_active' => 0]);
            $status = 'disabled';
        } else {
            $entity->update(['is_active' => 1]);
            $status = 'activated';
        }

        return redirect($this->resource_path)->with('message-success', $this->title . ' is ' . $status . '  successfully');
    }

    private function get_values_as_key_pair($collection, $return_key, $return_value)
    {
        return $collection->mapWithKeys(function (array $item, int $key) use ($return_key, $return_value) {
            return [$item[$return_key] => $item[$return_value]];
        })->toArray();
    }

    private function save_modal($modal, $attributes)
    {
        foreach ($attributes as $key => $value) {
            $modal->$key = $value;
        }

        $modal->save();

        return $modal;
    }
}
