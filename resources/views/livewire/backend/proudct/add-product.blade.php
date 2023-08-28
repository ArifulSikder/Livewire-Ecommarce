<div>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @php
            $data = [
                'name' => 'Add Product',
            ];
        @endphp

        <livewire:backend.includes.breadcrumb :data=$data>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between mb-2">
                        <button class="btn btn-success" wire:click.prevent='addData'><i class="fas fa-plus"></i> Add
                            Product</button>
                        <div class="d-flex justify-content-center align-items-center  border bg-white pr-2">
                            <input type="search" class="form-control border-0" name="name" id=""
                                placeholder="Search">
                        </div>
                    </div>
                    <div class="card" wire:ignore.self>
                        <div class="card-header">Add Product Form</div>
                        <div class="card-body">
                            <form action="" wire:submit.prevent='create' id="addForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" wire:ignore>
                                            <label>Select Category</label>
                                            <select class="form-control select2 prefix-picture" id="category_id"
                                                style="width: 100%;" data-placeholder="Select Category">
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
                                            <label for="name">Product Name</label>
                                            <input type="text" class="form-control" id="name"
                                                wire:model.defer="state.name" placeholder="Enter Product Name">
                                            @error('name')
                                                <span class="invalid-feedback d-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Product Slug</label>
                                            <input type="text" class="form-control" id="slug"
                                                wire:model.defer="state.slug" placeholder="Enter Product Slug">
                                            @error('slug')
                                                <span class="invalid-feedback d-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="long_description">Long Description</label>
                                            <textarea type="text" class="form-control" id="long_description" wire:model.defer="state.long_description"
                                                placeholder="Enter Long Description"></textarea>
                                            @error('long_description')
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
                                                    <input type="file" class="custom-file-input"
                                                        wire:model="thumbnail" id="thumbnail">
                                                    <div x-show="isUploading" x-transition
                                                        class="progress progress-sm mt-2 rounded">
                                                        <div class="progress-bar bg-primary progress-bar-striped"
                                                            role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                            aria-valuemax="100" x-bind:style="`width:${progress}%`">
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
                                                <img width="200px" src="{{ $thumbnail->temporaryUrl() }}"
                                                    alt="">
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

                                        <div>
                                            <button type="submit" class="btn btn-success">Save</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" wire:ignore>
                                            <label>Select Color</label>
                                            <select class="form-control select2" id="color_id" style="width: 100%;"
                                                data-placeholder="Select Color">
                                                <option value="">Select Color</option>
                                                <option value="1">Red</option>
                                                <option value="2">Green</option>
                                                <option value="3">Yellow</option>
                                                <option value="4">White</option>
                                            </select>
                                            @error('color_id')
                                                <span class="invalid-feedback d-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group" wire:ignore>
                                            <label>Select Size</label>
                                            <select class="form-control select2" id="size_id" style="width: 100%;"
                                                data-placeholder="Select Size">
                                                <option value="">Select Size</option>
                                                <option value="1">M</option>
                                                <option value="2">L</option>
                                                <option value="3">S</option>
                                                <option value="4">X</option>
                                            </select>
                                            @error('size_id')
                                                <span class="invalid-feedback d-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="sales_price">Sales Price</label>
                                            <input type="number" class="form-control" id="sales_price"
                                                wire:model.defer="state.sales_price" placeholder="Enter Sales Price">
                                            @error('sales_price')
                                                <span class="invalid-feedback d-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="short_description">Short Description</label>
                                            <textarea type="text" class="form-control" id="short_description" wire:model.defer="state.short_description"
                                                placeholder="Enter Short Description"></textarea>
                                            @error('short_description')
                                                <span class="invalid-feedback d-block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="multiple_image">Multiple Image</label>
                                            <div x-data="{ isUploading: false, progress: 5 }"
                                                x-on:livewire-upload-start="isUploading = true"
                                                x-on:livewire-upload-finish="isUploading = false; progress=5"
                                                x-on:livewire-upload-error="isUploading = false"
                                                x-on:livewire-upload-progress="progress = $event.detail.progress">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input"
                                                        wire:model.defer="multiple_image" id="multiple_image"
                                                        multiple>
                                                    <div x-show="isUploading" x-transition
                                                        class="progress progress-sm mt-2 rounded">
                                                        <div class="progress-bar bg-primary progress-bar-striped"
                                                            role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                            aria-valuemax="100" x-bind:style="`width:${progress}%`">
                                                            <span class="sr-only"></span>
                                                        </div>
                                                    </div>
                                                    <label class="custom-file-label" for="multiple_image">
                                                        Choose Multiple Image
                                                    </label>
                                                </div>
                                            </div>
                                            @error('multiple_image')
                                                <span class="invalid-feedback d-block">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        @if ($multiple_image)
                                            Photo Preview:
                                            <div class="row">
                                                @foreach ($multiple_image as $image)
                                                    @if (is_object($image) && method_exists($image, 'temporaryUrl'))
                                                        <div class="col-3 card me-1 mb-1">
                                                            <img src="{{ $image->temporaryUrl() }}">
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
    </div>

    <x-select2></x-select2>
    @push('js')
        <script>
            $(document).ready(function() {
                $('#addForm').on("submit", function(e) {
                    @this.set('state.category_id', $('#category_id').val(), true);
                    @this.set('state.color_id', $('#color_id').val(), true);
                    @this.set('state.size_id', $('#size_id').val(), true);
                });

            });
        </script>
    @endpush

</div>
