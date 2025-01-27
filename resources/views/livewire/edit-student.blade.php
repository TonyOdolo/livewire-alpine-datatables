<div>
    <div class="modal-header">
        <h5 class="modal-title">Edit Student</h5>
        <button type="button" class="btn-close" wire:click="$dispatch('closeModal')"></button>
    </div>

    <div class="modal-body">
        <form wire:submit.prevent="update">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" wire:model.live="name">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" wire:model.live="email">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Class</label>
                <select class="form-select" wire:model.live="class_id">
                    <option value="">Select Class</option>
                    @if($classes)
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    @endif
                </select>
                @error('class_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Section</label>
                <select class="form-select" wire:model.live="section_id">
                    <option value="">Select Section</option>
                    @if($sections)
                        @foreach($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                    @endif
                </select>
                @error('section_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="$dispatch('closeModal')">Cancel</button>
                <button type="submit" class="btn btn-primary">Update Student</button>
            </div>
        </form>
    </div>
</div>
