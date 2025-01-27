<?php

namespace App\Livewire;

use App\Models\Student;
use App\Models\Classes;
use App\Models\Section;
use LivewireUI\Modal\ModalComponent;

class EditStudent extends ModalComponent
{

    // Add static method for modal size
    public static function modalMaxWidth(): string
    {
        return 'md'; // or 'sm', 'lg', 'xl', '2xl', etc.
    }

    // Add static method for event listeners
    protected $listeners = ['refreshComponent' => '$refresh'];


    public Student $student;
    public $studentId;
    public $name;
    public $email;
    public $class_id;
    public $section_id;
    public $classes;
    public $sections;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'class_id' => 'required',
        'section_id' => 'required'
    ];

    public function mount($studentId)
    {
        // Load the student
        $this->student = Student::where('id', $studentId)->firstOrFail();

        // Assign the values
        $this->studentId = $this->student->id;
        $this->name = $this->student->name;
        $this->email = $this->student->email;
        $this->class_id = $this->student->class_id;
        $this->section_id = $this->student->section_id;

        // Load all classes and sections as collections
        $this->classes = Classes::select('id', 'name')->get();
        $this->sections = Section::select('id', 'name')->get();
    }

    public function update()
    {
        $this->validate();

        $this->student->update([
            'name' => $this->name,
            'email' => $this->email,
            'class_id' => $this->class_id,
            'section_id' => $this->section_id,
        ]);

        $this->closeModal();
        $this->dispatch('student-updated');
    }

    public function render()
    {
        return view('livewire.edit-student');
    }
}
