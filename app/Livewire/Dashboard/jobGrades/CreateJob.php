<?php

namespace App\Livewire\Dashboard\jobGrades;

use App\Models\JobGrade;
use Livewire\Component;
use App\Http\Requests\Dashboard\JobGradeRequest;

class CreateJob extends Component
{
    public $name;

    public function  rules()
    {
        return (new JobGradeRequest())->rules();
    }

    public function  messages()
    {
        return (new JobGradeRequest())->messages();
    }
    public function submit()
    {
        $data = $this->validate();
        JobGrade::create($data);
    
        // إرسال إشعار النجاح إلى TableJob
        $this->dispatch('notify', 'success', 'تمت إضافة السجل بنجاح!')->to(TableJob::class);
    
        // إعادة تعيين الإدخال
        $this->reset(['name']);
    
        // إغلاق المودال
        $this->dispatch('createModalToggle');
    
        // تحديث الجدول
        $this->dispatch('refreshTableJobGrade')->to(TableJob::class);
    }
    

    public function render()
    {
        return view('dashboard.jobGrades.create-job');
    }
}