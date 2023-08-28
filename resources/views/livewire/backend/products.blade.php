<div>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @php
            $data = [
                'name' => 'Products',
            ];
        @endphp
        <livewire:backend.includes.breadcrumb :data=$data>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between mb-2">
                        <a class="btn btn-success" href="{{ url('add-product') }}"><i class="fas fa-plus"></i> 
                          Add Product 
                        </a>
                        <div class="d-flex justify-content-center align-items-center  border bg-white pr-2">
                            <input type="search" class="form-control border-0" name="name" id=""
                                placeholder="Search">
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">Table for products</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Serial</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Thumbnail</th>
                                        <th scope="col">Photo Alt</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Short Description</th>
                                        <th scope="col">Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $serials = ($products->currentpage() - 1) * $products->perpage() + 1;
                                    @endphp
                                    @foreach ($products as $product)
                                        <tr>
                                            <th scope="row">{{ $serials++ }}</th>
                                            <td>{{ $product->category->name }}</td>
                                            <td><img src="{{ $product->upload_url }}" width="100px" alt=""></td>
                                            <td>{{ $product->photo_alt }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->slug }}</td>
                                            <td>{{ $product->short_description }}</td>
                                            <td>
                                                <a href="{{ url('detail/'. $product->id) }}"
                                                    class="btn btn-success">Details</a>
                                                <a href="{{ url('edit-product/'. $product->id) }}"
                                                    class="btn btn-success">Edit</a>
                                                <a href="" wire:click.prevent="delete({{ $product }})"
                                                    id="delete" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!--/. container-fluid -->
            </section>
            <!-- /.content -->
    </div>


    {{-- modal for add and edit --}}


    <div class="modal fade" id="form-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Large Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

</div>
