<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(mوatory for all pages)-->
<script src="{{ asset('global-assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('global-assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('global-assets/js/datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('global-assets/js/datepicker/bootstrap-datepicker.fa.min.js') }}"></script>
<!-- Add the following JavaScript code -->
<script>
    // Function to initialize Select2 with AJAX options

    function initializeSelect2() {
        $('#store-select2').select2({
            ajax: {
                url: "{{ route('admin.stores.ajax-index') }}",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        search: params.term // Search term entered by the user
                    };
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.text,
                                id: item.id
                            }
                        })
                    };
                },
                cache: false
            },
            minimumInputLength: 1 ,
            allowClear: true ,
            width: '250px',
            dir: 'rtl',
            language: 'fa',
        });
        $('#customer-select2').select2({
            ajax: {
                url: "{{ route('admin.customers.ajax-index') }}",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        search: params.term // Search term entered by the user
                    };
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.text,
                                id: item.id
                            }
                        })
                    };
                },
                cache: false
            },
            minimumInputLength: 1 ,
            allowClear: true ,
            width: '250px',
            dir: 'rtl',
            language: 'fa',
        });
    }

    // Call the initializeSelect2 function to set up the select2 element
    initializeSelect2();




    $(".persian-datepicker").datepicker({
        isRTL: true,
        dateFormat: "yy/m/d",
    });

</script>


