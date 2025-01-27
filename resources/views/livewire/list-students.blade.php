
<div class="container py-4">


    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm" wire:navigate>
            <i class="bi bi-plus-lg"></i> Add Student
        </a>
    </div>



    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Student List</h5>
        </div>


        <div class="card-body">
            @if($students->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Class</th>
                                <th scope="col">Section</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $index => $student)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->class->name ?? 'N/A' }}</td>
                                    <td>{{ $student->section->name ?? 'N/A' }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-sm btn-info me-2">
                                                <i class="bi bi-eye"></i> View
                                            </button>
                                            <button type="button" class="btn btn-sm btn-warning me-2" wire:click="edit({{ $student->id }})">
                                                <i class="bi bi-pencil"></i> Edit
                                            </button>
                                            



                                            <button type="button" wire:confirm="Are you sure you want to delete?" wire:click="delete({{ $student->id }})" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>



                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $students->links() }}
                </div>
            @else
                <div class="alert alert-info">
                    No students found.
                </div>
            @endif
        </div>
    </div>

<div>
    @if (session()->has('message'))
    <div class="alert alert-danger alert-dismissible fade show mb-4">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
</div>



</div>
