<?php

namespace App\Livewire\Dashboard\jobGrades;

use Livewire\Component;
use App\Models\JobGrade;
use App\Models\Governorate;

class ShowJob extends Component
{


    public $name,  $editData;


    protected $listeners = ['JobShow'];

    public function JobShow($id)
    {
        $this->editData = JobGrade::findOrFail($id);
        $this->name = $this->editData->name;
        $this->dispatch('showModalToggle');
    }



    public function render()
    {
        return view('dashboard.jobGrades.show-job');
    }
}