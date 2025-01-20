<?php

namespace App\Livewire;
use App\Models\Student;
use Livewire\Component;
// use Livewire\Attributes\Layout;

class ListStudent extends Component
{
    // #[Layout("layouts.app")]
    public function render()
    {
        $students = Student::all();
        return view('livewire.list-student', ['students' => $students]);
    }
}
