<?php

namespace App\Livewire\Dashboard\jobGrades;

use App\Models\JobGrade;
use Livewire\Component;
use Livewire\WithPagination;

class TableJob extends Component
{


    use WithPagination;
    public $search;

    protected $listeners = ['refreshTableJobGrade' => 'refreshComponent', 'notify' => 'showNotification'];

    public function refreshComponent()
    {
        $this->render(); // إعادة تحميل الجدول
    }
    
    public function showNotification($type, $message)
    {
        session()->flash($type, $message);
    }

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