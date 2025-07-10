<div>
    <form wire:submit.prevent="submit" class="mb-2">
        <div class="mb-2">
            <textarea wire:model.defer="content" class="form-control" placeholder="Write a comment..." required></textarea>
        </div>
        <button class="btn btn-sm btn-primary">Reply</button>
    </form>
</div>
