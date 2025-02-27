<?php

namespace App\Livewire\Dashboard\Branches;

use App\Models\Branch;
use Livewire\Component;
use Livewire\WithPagination;

class TableBranch extends Component
{


    use WithPagination;
    public $search;


    protected $listeners = ['refreshTableBranch'];

    public function render()
    {

        $query = Branch::query();

        if ($this->search) {
            $query->whereLike('name', '%' . $this->search .  '%')->orWhereLike('phone', '%' . $this->search .  '%');
        }

        $data = $query->orderByDesc('id')->paginate(10);
        return view(
            'dashboard.branches.table-branch',
            compact('data')
        );
    }
}