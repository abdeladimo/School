<!-- Required vendors -->
<script src="{{asset('admin/vendor/global/global.min.js')}}"></script>
<script src="{{asset('admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('admin/js/custom.min.js')}}"></script>
<script src="{{asset('admin/js/dlabnav-init.js')}}"></script>	

<!-- Chart sparkline plugin files -->
<script src="{{asset('admin/vendor/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('admin/js/plugins-init/sparkline-init.js')}}"></script>

<!-- Chart Morris plugin files -->
<script src="{{asset('admin/vendor/raphael/raphael.min.js')}}"></script>
<script src="{{asset('admin/vendor/morris/morris.min.js')}}"></script> 

<!-- Init file -->
<script src="{{asset('admin/js/plugins-init/widgets-script-init.js')}}"></script>

<!-- Demo scripts -->
<script src="{{asset('admin/js/dashboard/dashboard.js')}}"></script>

<!-- Summernote -->
<script src="{{asset('admin/vendor/summernote/js/summernote.min.js')}}"></script>
<!-- Summernote init -->
<script src="{{asset('admin/js/plugins-init/summernote-init.js')}}"></script>

<!-- Svganimation scripts -->
<script src="{{asset('admin/vendor/svganimation/vivus.min.js')}}"></script>
<script src="{{asset('admin/vendor/svganimation/svg.animation.js')}}"></script>
<script src="{{asset('admin/js/styleSwitcher.js')}}"></script>
<script src="{{asset('admin/vendor/pickadate/picker.date.js')}}"></script>
<script src="{{asset('admin/vendor/pickadate/picker.js')}}"></script>
<script src="{{asset('admin/vendor/pickadate/picker.time.js')}}"></script>
<script src="{{asset('admin/js/plugins-init/pickadate-init.js')}}"></script>

<!-- Datatable -->
<script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/plugins-init/datatables.init.js')}}"></script>

{{-- sweetAlert --}}
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script src="{{asset('admin\js\plugins-init\sweetalert.init.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.6.4.js"
  integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="{{ asset('js/index.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('custom-scripts')
