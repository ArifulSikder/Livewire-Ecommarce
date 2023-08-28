<div>
    @push('style')
        <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    @endpush

    @push('js')
        <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>


        <script>
            $('.select2').select2({
                placeholder: function() {
                    $(this).data('placeholder');
                },
                theme: 'bootstrap4'
            });

            function dataPhoto(icon) {
                return $('<span><img width="20" src="' + $(icon.element).data('picture') + '"> ' + icon.text +
                    '</span>');
            };
            $('.prefix-picture').select2({
                templateSelection: dataPhoto,
                templateResult: dataPhoto
            });
        </script>
    @endpush

</div>
