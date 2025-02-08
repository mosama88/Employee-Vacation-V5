<?php

namespace App\Livewire\Dashboard\Branches;

use App\Models\Branch;
use Livewire\Component;
use App\Models\Governorate;

class ShowBranch extends Component
{


    public $name, $phone, $address, $governorate_id, $editData;


    protected $listeners = ['BranchShow'];





    public function BranchShow($id)
    {
        $this->editData = Branch::findOrFail($id);

        $this->name = $this->editData->name;
        $this->phone = $this->editData->phone;
        $this->address = $this->editData->address;
        $this->governorate_id = $this->editData->governorate_id;
        $this->dispatch('showModalToggle');
    }



    public function render()
    {
        $other['governorates'] = Governorate::get();
        return view(
            'dashboard.branches.show-branch',
            ['other' => $other]
        );
    }
}