<?php

namespace App\Livewire\Dashboard\Branches;

use App\Models\Branch;
use Livewire\Component;
use App\Models\Governorate;

class DeleteBranch extends Component
{

    public $name, $phone, $address, $governorate_id, $editData;


    protected $listeners = ['BranchDelete'];





    public function BranchDelete($id)
    {
        $this->editData = Branch::findOrFail($id);
        $this->name = $this->editData->name;
        $this->phone = $this->editData->phone;
        $this->address = $this->editData->address;
        $this->governorate_id = $this->editData->governorate_id;
        $this->dispatch('deleteModalToggle');
    }



    public function submit()
    {
        $this->editData->delete();
        $this->dispatch('deleteModalToggle');
        $this->dispatch('refreshTableBranch')->to(TableBranch::class);
    }


    public function render()
    {
        $other['governorates'] = Governorate::get();
        return view(
            'dashboard.branches.delete-branch',
            ['other' => $other]
        );
    }

 
}