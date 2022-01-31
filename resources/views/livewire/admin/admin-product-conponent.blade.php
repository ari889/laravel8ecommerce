<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-4">
                                All Products
                            </div>
                            <div class="col-md-4">
                                <form action="">
                                    <input type="text" class="form-control input-md" placeholder="Search...." wire:model="searchTerm">
                                </form>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('admin.product.add') }}" class="btn btn-success pull-right">Add Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>name</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Sale Price</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td><img src="{{ asset('assets/images/products/'.$product->image) }}" width="60" alt=""></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->stock_status }}</td>
                                    <td>{{ $product->regular_price }}</td>
                                    <td>{{ $product->sale_price }}</td>
                                    <td>{{ $product->category->name ?? 'No Category' }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.editproduct', ['product_slug' => $product->slug]) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="#" class="btn btn-danger" onclick="return confirm('Are u sure to delete?') || event.stopImmediatePropagation()" wire:click.prevent="deleteProduct({{ $product->id }})"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
