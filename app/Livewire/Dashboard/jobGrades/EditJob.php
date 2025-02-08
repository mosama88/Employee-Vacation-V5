<?php

namespace App\Livewire\Dashboard\jobGrades;

use Livewire\Component;
use App\Models\JobGrade;
use App\Http\Requests\Dashboard\JobGradeRequest;

class EditJob extends Component
{

    public $name, $editData;


    protected $listeners = ['JobEdit'];





    public function JobEdit($id)
    {
        $this->editData = JobGrade::findOrFail($id);

        $this->name = $this->editData->name;
        $this->resetValidation();
        $this->dispatch('editModalToggle');
    }


    public function rules()
    {
        return (new JobGradeRequest())->rules();
    }


    public function  messages()
    {
        return (new JobGradeRequest())->messages();
    }


    public function submit()
    {
        $data =  $this->validate();
        $this->editData->update($data);
        $this->dispatch('editModalToggle');
        $this->dispatch('refreshTableJobGrade')->to(TableJob::class);
    }


    public function render()
    {
        return view('dashboard.jobGrades.edit-job');
    }
}