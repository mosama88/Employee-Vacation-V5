<?php

namespace App\Livewire\Dashboard\Branches;

use App\Models\Branch;
use Livewire\Component;

class TableBranch extends Component
{
    protected $listeners = ['refreshTableBranch'];
    
    public function render()
    {
        $data = Branch::orderByDesc('id')->paginate(10);
        return view(
            'dashboard.branches.table-branch',
            compact('data')
        );
    }
}