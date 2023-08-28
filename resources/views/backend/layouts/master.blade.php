<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard 2</title>

    {{-- <link rel="stylesheet" href="{{ asset('admin/assets/app-3d56b759.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    @stack('style')
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])
    @livewireStyles
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        @include('backend.includes.header')
        <!-- Main Sidebar Container -->

        @include('backend.includes.sidebar')

        {{ $slot }}

        @include('backend.includes.footer')
    </div>
    <!-- ./wrapper -->
    @livewireScripts
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- custom  / --}}
    <script src="{{ asset('plugins/turbolinks/turbolinks.js') }}" data-turbolinks-eval="false"></script>
    <script>
        Livewire.on('delete', () => {
            var link = $(this).attr("href");
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('confirmDelete')
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })
        });
    </script>
    <script>
        Livewire.on('open-modal', formModal => {
            $(`#${formModal}`).modal('show');
        });

        Livewire.on('hide-form', data => {
            console.log(data['message']);  
            $("#form-modal").modal('hide');
            toastr.success(data.message, "Success!");
            toastr.clear();
        });
    </script>

    <script>
        window.addEventListener('open-modal', evnet => {
            $('#form-modal').modal('show');
        }, false);
    </script>

    <script>
        window.addEventListener('hide-form', evnet => {
            $('#form-modal').modal('hide');
            toastr.success(evnet.detail.message, "Success!");
            toastr.clear();
        });
    </script>
   
   <script>
    //for update
    Livewire.on('selectPlease',() => {
            console.log('sdfhodis');
       
    });
</script>
    @stack('js')
</body>

</html>
