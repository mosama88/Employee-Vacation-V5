<?php

namespace App\Livewire\Dashboard\jobGrades;

use App\Models\JobGrade;
use Livewire\Component;
use Livewire\WithPagination;

class TableJob extends Component
{


    use WithPagination;
    public $search;


    protected $listeners = ['refreshTableJobGrade'];

    public function render()
    {

        $query = JobGrade::query();

        if ($this->search) {
            $query->whereLike('name', '%' . $this->search .  '%');
        }

        $data = $query->orderByDesc('id')->paginate(10);
        return view(
            'dashboard.jobGrades.table-job',
            compact('data')
        );
    }
}