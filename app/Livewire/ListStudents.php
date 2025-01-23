<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;
use Livewire\WithPagination;
use LivewireUI\Modal\ModalComponent;
class ListStudents extends Component
{
    use WithPagination;

    public function delete($id)
    {
        try {
            $student = Student::findOrFail($id);
            $student->delete();
            session()->flash('message', 'Student deleted successfully!');
        } catch (\Exception $e) {
            session()->flash('error', 'Error deleting student.');
        }
    }
    public function render()
    {
        $students = Student::paginate(3);
        return view('livewire.list-students', [
            'students' => $students
        ]);
    }


}
