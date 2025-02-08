<?php

namespace App\Livewire\Dashboard\jobGrades;

use App\Models\JobGrade;
use Livewire\Component;

class DeleteJob extends Component
{

    public $name, $editData;


    protected $listeners = ['JobDelete'];





    public function JobDelete($id)
    {
        $this->editData = JobGrade::findOrFail($id);
        $this->name = $this->editData->name;
        $this->dispatch('deleteModalToggle');
    }



    public function submit()
    {
        $this->editData->delete();
        $this->dispatch('deleteModalToggle');
        $this->dispatch('refreshTableJobGrade')->to(TableJob::class);
    }


    public function render()
    {
        return view('dashboard.jobGrades.delete-job');
    }
}