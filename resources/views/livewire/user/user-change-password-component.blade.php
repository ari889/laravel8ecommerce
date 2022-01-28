<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Change Password
                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('password_success'))
                    <div class="alert alert-success">{{ Session::get('password_success') }}</div>
                    @endif

                    @if(Session::has('password_error'))
                    <div class="alert alert-danger">{{ Session::get('password_error') }}</div>
                    @endif
                    <form class="form-horizontal" wire:submit.prevent="changePassword">
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Current Password</label>
                            <div class="col-md-4">
                                <input type="password" name="current_password" placeholder="Current Password" class="form-control" wire:model="current_password">
                                @error('current_password')
                                    <p class="text-danger">{{ $message }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">New Password</label>
                            <div class="col-md-4">
                                <input type="password" name="password" placeholder="New Password" class="form-control" wire:model="password">
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-4">
                                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control" wire:model="password_confirmation">
                                @error('password_confirmation')
                                    <p class="text-danger">{{ $message }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4"></label>
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
