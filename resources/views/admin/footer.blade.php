<!-- jQuery -->
<script src="{{asset('template/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('template/admin/dist/js/adminlte.min.js')}}"></script>

<script src="{{asset('template/admin/js/main.js')}}"></script>
<!--<script type="text/javascript">
        const input = document.getElementById('imgInp')
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>-->
    
@yield('footer')

