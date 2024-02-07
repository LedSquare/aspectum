<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body>

        @include('includes.header')
    
        
        <main>
            <section>
                <div class="wrapper">

                    @yield('content')

                    
                </div>
            </section>
        </main>
                    
        
    
        @include('includes.footer')
    
</body>
</html>