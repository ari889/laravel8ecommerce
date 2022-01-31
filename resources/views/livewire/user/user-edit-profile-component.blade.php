<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="com-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Profile Edit
                    </div>
                    <div class="panel-body">
                        <form wire:submit.prevent="updateProfile">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                            <div class="col-md-4">
                                @if($newimage)
                                    <img src="{{ $newimage->temporaryUrl() }}" width="100%" alt="">
                                @elseif($image)
                                    <img src="{{ asset('assets/images/profile/'.$image) }}" width="100%" alt="">
                                @else
                                    <img src="{{ asset('assets/images/profile/default.png') }}" width="100%" alt="">
                                @endif
                                <input type="file" class="form-control" wire:model="newimage">
                            </div>
                            <div class="col-md-8">
                                <p><b>Name:</b> <input type="text" class="form-control" placeholder="Enter full name" wire:model="name"> @error('name') <span class="d-block">{{ $message }} @enderror</span></p>
                                <p><b>Email:</b> {{ $email }}</p>
                                <p><b>Phone:</b> <input type="text" class="form-control" placeholder="Enter phone" wire:model="mobile"> @error('mobile') <span class="d-block">{{ $message }} @enderror</span></p>
                                <hr>
                                <p><b>Line1:</b> <input type="text" class="form-control" placeholder="Address line 1" wire:model="line1"> @error('line1') <span class="d-block">{{ $message }} @enderror</span></p>
                                <p><b>Line2:</b> <input type="text" class="form-control" placeholder="Address line 2" wire:model="line2"> @error('line2') <span class="d-block">{{ $message }} @enderror</span></p>
                                <p><b>City:</b> <input type="text" class="form-control" placeholder="Enter city" wire:model="city"> @error('city') <span class="d-block">{{ $message }} @enderror</span></p>
                                <p><b>Province:</b> <input type="text" class="form-control" placeholder="Enter province" wire:model="province"> @error('province') <span class="d-block">{{ $message }} @enderror</span></p>
                                <p><b>Country:</b> <input type="text" class="form-control" placeholder="Enter country" wire:model="country"> @error('country') <span class="d-block">{{ $message }} @enderror</span></p>
                                <p><b>Zip Code:</b> <input type="text" class="form-control" placeholder="Enter zip code" wire:model="zipcode"> @error('zipcode') <span class="d-block">{{ $message }} @enderror</span></p>
                                <button type="submit" class="btn btn-info pull-right">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
