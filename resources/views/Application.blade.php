<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" href="{{ asset('favicon.ico') }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ __('Welcome') }}</title>
  <link rel="stylesheet/less" type="text/css" href="../ts/style/index.less"/>
</head>

<body>
  <div id="app">
    @vite(['resources/ts/main.ts'])
  </div>
</body>

</html>
