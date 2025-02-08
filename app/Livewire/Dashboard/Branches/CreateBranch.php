<?php

namespace App\Livewire\Dashboard\Branches;

use App\Models\Branch;
use Livewire\Component;
use App\Models\Governorate;
use App\Http\Requests\Dashboard\BranchRequest;

class CreateBranch extends Component
{
    public $name, $phone, $address, $governorate_id;

    public function  rules()
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
        Branch::create($data);
        $this->reset(['name', 'phone', 'address', 'governorate_id']);
        $this->dispatch('createModalToggle');
        $this->dispatch('refreshTableCategory')->to(TableBranch::class);
    }

    public function render()
    {
        $other['governorates'] = Governorate::get();
        return view(
            'dashboard.branches.create-branch',
            ['other' => $other]
        );
    }
}