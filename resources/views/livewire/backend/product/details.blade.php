<div>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @php
            $data = [
                'name1' => 'Products',
                'name' => 'Details',
            ];
        @endphp
        <livewire:backend.includes.breadcrumb :data=$data>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between mb-2">
                        <a class="btn btn-success" href="{{ url('products') }}"><i class="fas fa-list"></i> 
                            Product List
                          </a>
                        <div class="d-flex justify-content-center align-items-center  border bg-white pr-2">
                            <input type="search" class="form-control border-0" name="name" id=""
                                placeholder="Search">
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">Table for products</div>
                        <div class="card-body">
                            <p><strong>Short Description: </strong>{{ $product->short_description }}</p>
                            <p><strong>Long Description: </strong>{{ $product->long_description }}</p>
                            <br>

                            <div class="row">
                                @foreach (json_decode($product->multiple_image, true) as $item)
                                    <div class="col-md-3">
                                        <div class="card" style="width: 18rem; height: 18rem">
                                            <div class="card-body">
                                                <img  style="width: 16rem; height: 16rem" class="card-img-top" src="{{ Storage::disk('uploads')->url($item) }}"
                                                alt="Card image cap">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
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
