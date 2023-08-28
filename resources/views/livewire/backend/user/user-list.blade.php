<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard v2</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div>
                <div class="row mt-1">
                    <div class="col-md-8">
                        <div class="card p-3">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2> User List</h2>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $sl = 1;
                                        @endphp
                                        @forelse ($userList as $user)
                                            <tr>
                                                <th scope="row">{{ $sl++ }}</th>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>
                                                    <a class="btn btn-danger btn-xs  "
                                                        wire:click.prevent='delete({{ $user }})'
                                                        data-toggle="modal">Delete</a>


                                                    <button wire:click.prevent="editUser({{ $user->id }})"
                                                        type="button" class="btn btn-xs btn-primary">
                                                        Edit
                                                    </button>

                                                </td>
                                            </tr>

                                        @empty
                                        @endforelse
                                    </tbody>

                                </table>
                            </div>
                            {{ $userList->links() }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Create User</h2>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form wire:submit.prevent='store'>
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" wire:model.debounce.500ms="form.name" name="name"
                                            class="form-control" placeholder="Enter user name">
                                        @error('name')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email"wire:model.debounce.500ms="form.email" name="email"
                                            class="form-control" placeholder="Enter user email">
                                        @error('email')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" wire:model.debounce.500ms="form.password" name="password"
                                            class="form-control" placeholder="Enter  password">
                                        @error('password')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" wire:model.debounce.500ms="form.password_confirmation"
                                            name="password_confirmation" class="form-control"
                                            placeholder="Enter confirm password">
                                        @error('password_confirmation')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->

                <div class="modal fade" id="form-modal" wire:ignore.self>
                    <!-- Use wire:ignore.self to prevent Livewire from managing this modal -->
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Edit User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <form wire:submit.prevent="updateUserData">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name"
                                                wire:model.defer="updateForm.name" wire:ignore class="form-control"
                                                placeholder="Enter user name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email"
                                                wire:model.defer="updateForm.email" wire:ignore class="form-control"
                                                placeholder="Enter user email">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password"
                                                wire:model.defer="updateForm.password" wire:ignore
                                                class="form-control" placeholder="Enter password">
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password" name="password_confirmation"
                                                wire:model.defer="updateForm.password_confirmation" wire:ignore
                                                class="form-control" placeholder="Enter confirm password">
                                        </div>
                                        <input type="hidden" id="id" wire:model.defer="updateForm.id">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
