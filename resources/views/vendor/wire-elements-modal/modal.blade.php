<div>
    @isset($jsPath)
        <script>{!! file_get_contents($jsPath) !!}</script>
    @endisset
    @isset($cssPath)
        <style>{!! file_get_contents($cssPath) !!}</style>
    @endisset

    <div
        x-data="LivewireUIModal()"
        x-on:close.stop="setShowPropertyTo(false)"
        x-on:keydown.escape.window="show && closeModalOnEscape()"
        x-show="show"
        class="modal fade"
        style="display: none;"
        tabindex="-1"
        :class="{'show d-block': show}"
    >
        <div class="modal-dialog modal-dialog-centered">
            <!-- Backdrop -->
            <div
                x-show="show"
                x-on:click="closeModalOnClickAway()"
                class="modal-backdrop fade"
                :class="{'show': show}"
                style="position: fixed; inset: 0; background-color: rgba(0, 0, 0, 0.5);"
            >
            </div>

            <!-- Modal Content -->
            <div
                x-show="show && showActiveComponent"
                x-bind:class="modalWidth"
                class="modal-content"
                id="modal-container"
                aria-modal="true"
            >
                @forelse($components as $id => $component)
                    <div x-show.immediate="activeComponent == '{{ $id }}'" x-ref="{{ $id }}" wire:key="{{ $id }}">
                        @livewire($component['name'], $component['arguments'], key($id))
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
</div>
