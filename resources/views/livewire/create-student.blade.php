<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Add New Student</h5>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show mb-4">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form wire:submit.prevent="save">
                        <!-- Name Field -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                wire:model.live="name" id="name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                wire:model.live="email" id="email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Class Field -->
                        <div class="mb-3">
                            <label for="class" class="form-label">Class</label>
                            <div class="position-relative" wire:click.outside="$set('showClassDropdown', false)">
                                <input type="text"
                                    class="form-control @error('class_id') is-invalid @enderror"
                                    wire:model.live.debounce.500ms="classSearch"
                                    wire:focus="$set('showClassDropdown', true)"
                                    placeholder="{{ $selectedClassName ?: 'Search for class...' }}"
                                    autocomplete="off">

                                @if($showClassDropdown)
                                    <div class="position-absolute w-100 mt-1 rounded-3 shadow-sm bg-white border" style="z-index: 1000;">
                                        <ul class="list-group list-group-flush">
                                            @forelse($classResults as $class)
                                                <li class="list-group-item list-group-item-action cursor-pointer"
                                                    wire:click="selectClass('{{ $class->id }}', '{{ $class->name }}')">
                                                    {{ $class->name }}
                                                </li>
                                            @empty
                                                <li class="list-group-item">No classes found</li>
                                            @endforelse
                                        </ul>
                                    </div>
                                @endif
                                @error('class_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Section Field -->
                        <div class="mb-3">
                            <label for="section" class="form-label">Section</label>
                            <div class="position-relative" wire:click.outside="$set('showSectionDropdown', false)">
                                <input type="text"
                                    class="form-control @error('section_id') is-invalid @enderror"
                                    wire:model.live.debounce.500ms="sectionSearch"
                                    wire:focus="$set('showSectionDropdown', true)"
                                    placeholder="{{ $selectedSectionName ?: 'Select section...' }}"
                                    @if(!$class_id) disabled @endif
                                    autocomplete="off">

                                @if($showSectionDropdown)
                                    <div class="position-absolute w-100 mt-1 rounded-3 shadow-sm bg-white border" style="z-index: 1000;">
                                        <ul class="list-group list-group-flush">
                                            @forelse($sectionResults as $section)
                                                <li class="list-group-item list-group-item-action cursor-pointer"
                                                    wire:click="selectSection('{{ $section->id }}', '{{ $section->name }}')">
                                                    {{ $section->name }}
                                                </li>
                                            @empty
                                                <li class="list-group-item">No sections found</li>
                                            @endforelse
                                        </ul>
                                    </div>
                                @endif
                                @error('section_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Save Student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        .cursor-pointer {
            cursor: pointer;
        }
    </style>
</div>

