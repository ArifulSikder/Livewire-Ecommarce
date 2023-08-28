<div>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @php
            $data = [
                'name' => 'Banner',
            ];
        @endphp

        <livewire:backend.includes.breadcrumb :data=$data>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between mb-2">
                        <button class="btn btn-success" wire:click.prevent='addData'><i class="fas fa-plus"></i> Add
                            Banner</button>
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
                                        <th scope="col">Thumbnail</th>
                                        <th scope="col">Photo Alt</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Higtlight</th>
                                        <th scope="col">Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $serials = ($banners->currentpage() - 1) * $banners->perpage() + 1;
                                    @endphp
                                    @forelse ($banners as $banner)
                                        <tr>
                                            <th scope="row">{{ $serials++ }}</th>
                                            <td><img src="{{ $banner->upload_url }}" width="100px" alt="">
                                            </td>
                                            <td>{{ $banner->photo_alt }}</td>
                                            <td>{{ $banner->name }}</td>
                                            <td>{{ $banner->category->name }}</td>
                                            <td>{{ $banner->highlight }}</td>
                                            <td>
                                                <a href="" wire:click.prevent="edit({{ $banner }})"
                                                    class="btn btn-success">Edit</a>
                                                <a href="" wire:click.prevent="delete({{ $banner }})"
                                                    id="delete" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td class="text-danger">Empty</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="px-3">
                            {{ $banners->links() }}
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
                    <h4 class="modal-title">{{ $editEnable ? 'Edit Banner' : 'Add New Banner' }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formData" autocomplete="off" wire:submit.prevent="{{ $editEnable ? 'update' : 'create' }}">
                    <div class="modal-body">
                        <div class="form-group" wire:ignore>
                            <label>Select Category</label>
                            <select class="form-control select2 prefix-picture" id="category_id" style="width: 100%;"
                                data-placeholder="Select Category">
                                <option selected="selected" data-picture="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        data-picture="{{ $category->thumbnail != '' ? asset($category->upload_url) : '' }}">
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Banner Name</label>
                            <input type="text" class="form-control" id="name" wire:model.defer="state.name"
                                placeholder="Enter Banner Name">
                            @error('name')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="highlight">Highlight</label>
                            <input type="text" class="form-control" id="highlight" wire:model.defer="state.highlight"
                                placeholder="Enter Highlight Key">
                            @error('highlight')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="thumbnail">Thumbnail</label>
                            <div x-data="{ isUploading: false, progress: 5 }" x-on:livewire-upload-start="isUploading = true"
                                x-on:livewire-upload-finish="isUploading = false; progress=5"
                                x-on:livewire-upload-error="isUploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" wire:model="thumbnail"
                                        id="thumbnail">
                                    <div x-show="isUploading" x-transition class="progress progress-sm mt-2 rounded">
                                        <div class="progress-bar bg-primary progress-bar-striped" role="progressbar"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                            x-bind:style="`width:${progress}%`">
                                            <span class="sr-only"></span>
                                        </div>
                                    </div>
                                    <label class="custom-file-label" for="thumbnail">
                                        @if ($thumbnail)
                                            {{ $thumbnail->getClientOriginalName() }}
                                        @else
                                            Choose Thumbnail
                                        @endif
                                    </label>
                                </div>
                            </div>
                            @if ($thumbnail)
                                <img width="200px" src="{{ $thumbnail->temporaryUrl() }}" alt="">
                            @endif
                            @if ($oldThumbnail)
                                <img width="200px" style="{{ $thumbnail ? 'display:none' : '' }}"
                                    src="{{ $oldThumbnail }}" alt="">
                            @endif

                            @error('thumbnail')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="photo_alt">Photo Alt</label>
                            <input type="text" class="form-control" id="photo_alt"
                                wire:model.defer="state.photo_alt" placeholder="Enter Photo Alt">
                            @error('photo_alt')
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
    <x-select2></x-select2>
    @push('js')
        <script>
            $(document).ready(function() {
                $('#formData').on("submit", function(e) {
                    @this.set('state.category_id', $('#category_id').val(), true);
                });
            });
        </script>
    @endpush
</div>
