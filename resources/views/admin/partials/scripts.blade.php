<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(mوatory for all pages)-->
<script src="{{ asset('global-assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('global-assets/js/datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('global-assets/js/datepicker/bootstrap-datepicker.fa.min.js') }}"></script>
<script src="{{ asset('global-assets/js/scripts.bundle.js') }}"></script>

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
        $(".persian-datepicker").datepicker({
            isRTL: true,
            dateFormat: "yy/m/d",
        });
    }

    // Call the initializeSelect2 function to set up the select2 element
    initializeSelect2();


</script>

@if(session('success'))
    <script>
        // JavaScript to show the Bootstrap toast
        document.addEventListener('DOMContentLoaded', function () {
            var toastContainer = document.getElementById('kt_docs_toast_stack_container');
            var toast = `
                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true">
                    <div class="toast-header">
                        <i class="ki-duotone ki-abstract-23 fs-2 text-success me-3"><span class="path1"></span><span class="path2"></span></i>
                        <strong class="me-auto">تبریک</strong>
                        <small>هم اکنون</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        {{ session('success') }}
            </div>
        </div>
`;
            toastContainer.innerHTML = toast;
            var bsToast = new bootstrap.Toast(toastContainer.querySelector('.toast'));
            bsToast.show();
        });
    </script>
@endif


