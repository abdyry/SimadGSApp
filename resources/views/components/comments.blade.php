<!-- livewire/comment-component.blade.php -->
<div>
    <textarea wire:model="comment.content"></textarea>
    @error('comment.content') <span class="error">{{ $message }}</span> @enderror

    <button wire:click="updateComment">Save</button>
</div>
