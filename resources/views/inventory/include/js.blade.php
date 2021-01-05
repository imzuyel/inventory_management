<!-- Jquery Core Js -->
<script src="{{ asset('/') }}backend/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="{{ asset('/') }}backend/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="{{ asset('/') }}backend/plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{ asset('/') }}backend/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('/') }}backend/plugins/node-waves/waves.js"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="{{ asset('/') }}backend/plugins/jquery-countto/jquery.countTo.js"></script>

<!-- Morris Plugin Js -->
<script src="{{ asset('/') }}backend/plugins/raphael/raphael.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/morrisjs/morris.js"></script>

<!-- ChartJs -->
<script src="{{ asset('/') }}backend/plugins/chartjs/Chart.bundle.js"></script>

<!-- Flot Charts Plugin Js -->
<script src="{{ asset('/') }}backend/plugins/flot-charts/jquery.flot.js"></script>
<script src="{{ asset('/') }}backend/plugins/flot-charts/jquery.flot.resize.js"></script>
<script src="{{ asset('/') }}backend/plugins/flot-charts/jquery.flot.pie.js"></script>
<script src="{{ asset('/') }}backend/plugins/flot-charts/jquery.flot.categories.js"></script>
<script src="{{ asset('/') }}backend/plugins/flot-charts/jquery.flot.time.js"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="{{ asset('/') }}backend/plugins/jquery-sparkline/jquery.sparkline.js"></script>
<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset('/') }}backend/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="{{ asset('/') }}backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="{{ asset('/') }}backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="{{ asset('/') }}backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="{{ asset('/') }}backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<script src="{{ asset('/') }}backend/js/pages/tables/jquery-datatable.js"></script>
<!-- Select Plugin Js -->
<script src="{{ asset('/') }}backend/plugins/bootstrap-select/js/bootstrap-select.js"></script>



<!-- Custom Js -->
<script src="{{ asset('/') }}backend/js/admin.js"></script>
<script src="{{ asset('/') }}backend/js/pages/index.js"></script>

<!-- Demo Js -->
<script src="{{ asset('/') }}backend/js/demo.js"></script>

{{--  Sweert Alert  --}}
<script src="{{ asset('/') }}backend/js/sweetalert.min.js"></script>
{{--  Delete  --}}
<script>
    $(document).on("click", "#delete", function(e){
                     e.preventDefault();
                     const url = $(this).attr('href');
                     var link = $(this).attr("href");
                          swal({
                            title: "Are you sure?",
                            text: "Once clicked, this will be softdeleted!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                            })
                            .then((willDelete) => {
                            if (willDelete) {
                            swal("Done! category has been softdeleted!", {
                            icon: "success",
                            button: true,
                            });
                             window.location.href = url;
                            } else {
                            swal("Your imaginary file is safe!");
                            }
                            });
                    });
</script>
{{--  Unpublished  --}}
<script>
    $(document).on("click", "#unpublished", function(e){
                     e.preventDefault();
                     const url = $(this).attr('href');
                     var link = $(this).attr("href");
                          swal({
                            title: "Are you sure?",
                            text: "Once clicked, this will be Unpublished!",
                            icon: "warning",
                            buttons: true,
                            })
                            .then((willDelete) => {
                            if (willDelete) {
                            swal("Done! category has been Unpublished!", {
                            icon: "success",
                            button: false,
                            });
                             window.location.href = url;
                            } else {
                            swal("Your imaginary file is As Same!");
                            }
                            });
                    });
</script>

{{--  Published  --}}
<script>
    $(document).on("click", "#published", function(e){
                     e.preventDefault();
                     const url = $(this).attr('href');
                     var link = $(this).attr("href");
                          swal({
                            title: "Are you sure?",
                            text: "Once clicked, this will be be Published!",
                            icon: "warning",
                            buttons: true,
                            })
                            .then((willDelete) => {
                            if (willDelete) {
                            swal("Done! category has been Published!", {
                            icon: "success",
                            button: false,
                            });
                             window.location.href = url;
                            } else {
                            swal("Your imaginary file is safe!");
                            }
                    });
         });
</script>
{{--  End Sweert Alert  --}}
{{--  Toastr  --}}
<script src="{{ asset('/') }}backend/js/toastr.min.js"></script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
{{--  //All Erros  --}}
<script>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>
{{--  End Toastr  --}}

@stack('js')
