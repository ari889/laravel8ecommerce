<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Setting
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                        @endif
                        <form wire:submit.prevent="saveSettings" class="form-horizontal">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Email</label>
                                <div class="col-md-4">
                                    <input type="email" class="form-control input-md" placeholder="Enter email" wire:model="email">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Phone 1</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Enter phone number 1" wire:model="phone1">
                                    @error('phone1')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Phone 2</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Enter phone number 2" wire:model="phone2">
                                    @error('phone2')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Address</label>
                                <div class="col-md-4">
                                    <textarea class="form-control input-md" placeholder="Full address" col="10" row="10" wire:model="address"></textarea>
                                    @error('address')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Map</label>
                                <div class="col-md-4">
                                    <textarea class="form-control input-md" placeholder="Map link" col="10" row="10" wire:model="map"></textarea>
                                    @error('map')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Twitter</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Enter twitter link" wire:model="twitter">
                                    @error('twitter')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Facebook</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Enter facebook link" wire:model="facebook">
                                    @error('facebook')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Instagram</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Enter instagram link" wire:model="instagram">
                                    @error('instagram')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Pinterest</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Enter Pinterest link" wire:model="pinterest">
                                    @error('pinterest')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Youtube</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" placeholder="Enter youtube link" wire:model="youtube">
                                    @error('youtube')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
