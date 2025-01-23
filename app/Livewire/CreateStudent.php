<?php

namespace App\Livewire;

use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use Livewire\Component;

class CreateStudent extends Component
{
    public $name;
    public $email;
    public $section_id;
    public $class_id;

    public $classSearch = '';
    public $sectionSearch = '';
    public $showClassDropdown = false;
    public $showSectionDropdown = false;
    public $selectedClassName = '';
    public $selectedSectionName = '';
    public $classResults = [];
    public $sectionResults = [];

    public function mount()
    {
        // Initial classes load
        $this->loadClasses();
    }

    public function loadClasses()
    {
        $this->classResults = Classes::when($this->classSearch, function ($query) {
            $query->where('name', 'like', '%' . $this->classSearch . '%');
        })->take(5)->get();
    }

    public function updatedClassSearch()
    {
        $this->loadClasses();
        $this->showClassDropdown = true;
    }

    public function selectClass($id, $name)
    {
        $this->class_id = $id;
        $this->selectedClassName = $name;
        $this->classSearch = '';
        $this->showClassDropdown = false;

        // Reset section when class changes
        $this->section_id = null;
        $this->selectedSectionName = '';
        $this->sectionSearch = '';

        // Load sections for selected class
        $this->loadSections();
    }

    public function loadSections()
    {
        if ($this->class_id) {
            $this->sectionResults = Section::where('class_id', $this->class_id)
                ->when($this->sectionSearch, function ($query) {
                    $query->where('name', 'like', '%' . $this->sectionSearch . '%');
                })->get();
        }
    }

    public function updatedSectionSearch()
    {
        $this->loadSections();
        $this->showSectionDropdown = true;
    }

    public function selectSection($id, $name)
    {
        $this->section_id = $id;
        $this->selectedSectionName = $name;
        $this->sectionSearch = '';
        $this->showSectionDropdown = false;
    }

    public function save()
    {
        $validatedData = $this->validate([
            'name' => 'required|min:2',
            'email' => 'required|email|unique:students,email',
            'class_id' => 'required|exists:classes,id',
            'section_id' => 'required|exists:sections,id',
        ]);

        Student::create($validatedData);

        // Reset form fields
        $this->reset([
            'name',
            'email',
            'class_id',
            'section_id',
            'classSearch',
            'sectionSearch',
            'selectedClassName',
            'selectedSectionName'
        ]);

        $this->mount();

        session()->flash('message', 'Student added successfully!');
        return $this->redirect('/students', navigate: true);
    }



    public function render()
    {
        return view('livewire.create-student');
    }
}
