<?php

namespace App\Livewire\Dashboard\Branches;

use App\Models\Branch;
use Livewire\Component;
use App\Models\Governorate;
use App\Http\Requests\Dashboard\BranchRequest;

class EditBranch extends Component
{

    public $name, $phone, $address, $governorate_id, $editData;


    protected $listeners = ['BranchEdit'];





    public function BranchEdit($id)
    {
        $this->editData = Branch::findOrFail($id);

        $this->name = $this->editData->name;
        $this->phone = $this->editData->phone;
        $this->address = $this->editData->address;
        $this->governorate_id = $this->editData->governorate_id;
        $this->resetValidation();
        $this->dispatch('editModalToggle');
    }


    public function rules()
    {
        return (new BranchRequest())->rules();
    }


    public function  messages()
    {
        return (new BranchRequest())->messages();
    }


    public function submit()
    {
        $data =  $this->validate();
        $this->editData->update($data);
        $this->dispatch('editModalToggle');
        $this->dispatch('refreshTableBranch')->to(TableBranch::class);
    }


    public function render()
    {
        $other['governorates'] = Governorate::get();
        return view(
            'dashboard.branches.edit-branch',
            ['other' => $other]
        );
    }
}