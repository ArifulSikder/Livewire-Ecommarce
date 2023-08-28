<div>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @php
            $data = [
                'name' => 'Category',
            ];
        @endphp

        <livewire:backend.includes.breadcrumb :data=$data>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between mb-2">
                        <button class="btn btn-success" wire:click.prevent='addData'><i class="fas fa-plus"></i> Add
                            Category</button>
                        <div class="d-flex justify-content-center align-items-center  border bg-white pr-2">
                            <input type="search" class="form-control border-0" name="name" id=""
                                placeholder="Search">
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">Table for categories</div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Serial</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $serials = ($categories->currentpage() - 1) * $categories->perpage() + 1;
                                    @endphp
                                    @forelse ($categories as $category)
                                        <tr>
                                            <th scope="row">{{ $serials++ }}</th>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>
                                                <a href="" wire:click.prevent="edit({{ $category }})"
                                                    class="btn btn-success">Edit</a>
                                                <a href="" wire:click.prevent="delete({{ $category }})"
                                                    id="delete" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>

                                    @empty
                                    <tr><td class="text-danger">Empty</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                            <div class="px-3">
                                {{ $categories->links() }}
                            </div>
                    </div>
                </div><!--/. container-fluid -->
            </section>
            <!-- /.content -->
    </div>


    {{-- modal for add and edit --}}


    <div class="modal fade" id="form-modal" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ $editEnable ? 'Edit Category' : 'Add New Category' }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form autocomplete="off" wire:submit.prevent="{{ $editEnable ? 'update' : 'create' }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" id="name" wire:model="state.name"
                                placeholder="Enter Category Name">
                            @error('name')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Category Slug</label>
                            <input type="text" class="form-control" id="slug" wire:model="state.slug"
                                placeholder="Enter Category Slug">
                            @error('slug')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>
                      
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit"
                            class="btn btn-primary">{{ $editEnable ? 'Save Changes' : 'Save' }}</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
