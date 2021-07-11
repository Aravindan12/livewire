<div>
    @if($updateMode)
        @include('livewire.update')
    @else
    <div class="col-md-6">
        <form wire:submit.prevent="store">
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
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
    @endif
    <div class="col-md-12">
        <table class="table table-striped" style="margin-top:20px;">
            <tr>
                <td>NO</td>
                <td>NAME</td>
                <td>EMAIL</td>
                <td>MESSAGE</td>
                <td>ACTION</td>
            </tr>
            @foreach($data as $row)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->email}}</td>
                    <td>{{$row->body}}</td>
                    <td>
                        <button wire:click.prevent="edit({{$row->id}})" class="btn btn-sm btn-outline-danger py-0" id="{{$row->id}}" type="button">Edit</button> | 
                        <button wire:click="destroy({{$row->id}})" class="btn btn-sm btn-outline-danger py-0">Delete</button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div> 
</div>
