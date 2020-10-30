<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$app->appname}}</title>

    <!-- Fonts -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-metro-tile.css')}}">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <!-- Styles -->
    <style type="text/css">
    /* montserrat-regular - latin */
    @font-face {
      font-family: 'Montserrat';
      font-style: normal;
      font-weight: 400;
      src: url('../fonts/montserrat-v10-latin-regular.eot'); /* IE9 Compat Modes */
      src: local('Montserrat Regular'), local('Montserrat-Regular'),
      url('../fonts/montserrat-v10-latin-regular.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
      url('../fonts/montserrat-v10-latin-regular.woff2') format('woff2'), /* Super Modern Browsers */
      url('../fonts/montserrat-v10-latin-regular.woff') format('woff'), /* Modern Browsers */
      url('../fonts/montserrat-v10-latin-regular.ttf') format('truetype'), /* Safari, Android, iOS */
      url('../fonts/montserrat-v10-latin-regular.svg#Montserrat') format('svg'); /* Legacy iOS */
  }
  html, body {
    background-color: #ddd;
    color: #636b6f;
    font-family: 'Montserrat', sans-serif;
    font-weight: 100;
    height: 100vh;
    margin: 0;
}

.full-height {
    height: 100vh;
}

.flex-center {
    align-items: center;
    display: flex;
    justify-content: center;
}

.position-ref {
    position: relative;
}

.top-right {
    position: absolute;
    right: 10px;
    top: 18px;
}

.content {
    text-align: center;
}

.title {
    font-size: 84px;
}

.links > a {
    color: #636b6f;
    padding: 0 25px;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: .1rem;
    text-decoration: none;
    text-transform: uppercase;
}

.m-b-md {
    margin-bottom: 30px;
}
</style>
</head>
<body>
    <div class="flex-center position-ref full-height">

        <div class="content">
            @yield('content')
        </div>
    </div>
    @yield('script')
</body>
</html>