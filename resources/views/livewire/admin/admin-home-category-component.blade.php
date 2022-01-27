<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Manage home category
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form wire:submit.prevent="updateHomeCategory" class="form-horizontal">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Choose Categories</label>
                                <div class="col-md-4" wire:ignore>
                                    <select class="sel_categories form-control" name="categories[]" multiple="multiple" wire:model="selected_categories">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('selected_categories')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">No of products</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model="noofproducts" />
                                    @error('noofproducts')
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

@push('scripts')
    <script>
        $(document).ready(function(){
            $('.sel_categories').select2();
            $('.sel_categories').on('change', function(){
                var data = $('.sel_categories').select2("val");
                @this.set('selected_categories', data);
            })
        })
    </script>
@endpush
