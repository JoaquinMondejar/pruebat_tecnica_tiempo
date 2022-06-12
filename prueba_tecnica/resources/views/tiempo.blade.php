@include('partials/_header')
<body class="text-center">

<div class="container">
    <header class="header-block">
        <div class="title-home">
            <h1>El tiempo</h1>
        </div>

    </header>


    <div class="main-block">
        <div class="title-description">
            <p>Introduce tu código postal:</p>
            <p class="subtitle">Facilitandonos tu código postal y le facilitaremos el tiempo en su zona</p>

            <form id="cp_submit" action="post">
                @csrf

                <input type="number" min="0" id="cp_input" name="cp_number" class="form-control" placeholder="Introduce su código postal" required="" autofocus="">


                <div class="content-loaded"></div>

                <div class="container-button">
                    <button class="custom-button" type="submit">Comprobar</button>
                </div>
            </form>
        </div>


    </div>

    @include('partials/_footer')

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="{{asset('js/main.js') }}"></script>



</body>
</html>
