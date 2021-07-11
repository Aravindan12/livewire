<div class="col-md-6">
    <form wire:submit.prevent="update">
        <input type="hidden" wire:model="selected_id">
    <div class="form-group">
        <label for="exampleInputPassword1">Enter Name</label>
        <input type="text" wire:model="name" class="form-control input-sm"  placeholder="Name">
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label>Enter Email</label>
        <input type="email" class="form-control input-sm" placeholder="Enter email" wire:model="email">
        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label>Enter Message</label>
        <input type="textarea" class="form-control input-sm" placeholder="Enter message" wire:model="body">
        @error('body') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <button class="btn btn-primary">Update</button>
    </form>
</div> 