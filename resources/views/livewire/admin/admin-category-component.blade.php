<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
        .sclist{
            list-style: none !important;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Categories
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addcategory') }}" class="btn btn-success pull-right">Add Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Name</th>
                                    <th>Slug</th>
                                    <th>Sub Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            <ul class="sclist">
                                                @foreach($category->subCategories as $scategory)
                                                    <li><i class="fa fa-caret-right"></i> {{ $scategory->name }} <a href="{{ route('admin.editcategory', ['category_slug' => $category->slug, 'scategory_slug' => $scategory->slug]) }}"><i class="fa fa-edit"></i></a></li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('admin.editcategory', ['category_slug' => $category->slug]) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger" onclick="return confirm('Are u sure to delete?') || event.stopImmediatePropagation();" wire:click.prevent="deleteCategory({{ $category->id }})"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
