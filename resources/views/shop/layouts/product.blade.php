@extends('shop.layouts.home')
@section('content')

        <div class="container" style="margin-top: 150px">
            @livewire('shop.search')
           
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

            <script>
                function addToCart(id) {
                    $.ajax({
                        url: 'add-to-cart/' + id,
                        type: 'GET',
                    }).done(function(response) {

                        alertify.success('Successfully added product');
                    });
                }
            </script>

        </div>
    

    @endsection