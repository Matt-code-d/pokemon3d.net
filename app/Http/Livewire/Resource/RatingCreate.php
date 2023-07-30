<?php

namespace App\Http\Livewire\Resource;

use App\Models\Resource;
use LivewireUI\Modal\ModalComponent;

class RatingCreate extends ModalComponent
{
    public int|Resource $resource;

    public $body;

    public $rating;

    public $user;

    public function mount(int|Resource $resource)
    {
        $this->resource = $resource;
        $this->user = auth()->user();
        if ($this->user == $this->resource->user) {
            $this->closeModal();
        }
    }

    public function save()
    {
        $this->validate([
            'rating' => ['digits_between:1,5'],
            'body' => ['required', 'string', 'min:10', 'max:255'],
        ]);

        $resource = Resource::find($this->resource);

        $resource->review($this->body, $this->user, $this->rating);

        $this->emit('resourceUpdated', $resource->uuid);

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.resource.rating-create');
    }
}
