
<script src="{{asset('template/shop/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('template/shop/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('template/shop/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('template/shop/plugins/Isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('template/shop/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('template/shop/plugins/easing/easing.js')}}"></script>
<script src="{{asset('template/shop/js/custom.js')}}"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
@livewireScripts
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

<script>
    function addToCart(id){
        $.ajax({
            url: 'add-to-cart/'+id,
            type: 'GET',
        }).done(function (response){
           
            alertify.success('Successfully added product');
        });
    }
    
</script>

