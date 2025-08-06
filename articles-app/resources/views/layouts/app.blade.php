<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Laravel App')</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  @yield('styles')

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
  
    body, html {
      height: 100%;
      margin: 0;
      background: linear-gradient(270deg, #0f2027, #203a43, #2c5364);
      background-size: 600% 600%;
      animation: gradientDark 20s ease infinite;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #e0e0e0;
    }

    @keyframes gradientDark {
      0% {background-position:0% 50%;}
      50% {background-position:100% 50%;}
      100% {background-position:0% 50%;}
    }


    .glass-card {
      background: rgba(255, 255, 255, 0.07);
      border-radius: 15px;
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
      backdrop-filter: blur(8px);
      -webkit-backdrop-filter: blur(8px);
      border: 1px solid rgba(255, 255, 255, 0.18);
      color: #e0e0e0;
    }

    a, a:hover, a:focus {
      color: #8ab4f8;
      text-decoration: none;
      transition: color 0.3s ease;
    }
    a:hover, a:focus {
      color: #c0d4ff;
      text-decoration: underline;
    }

    .btn-primary {
      background: linear-gradient(45deg, #536976, #292e49);
      border: none;
      transition: background 0.3s ease, box-shadow 0.3s ease;
      color: #e0e0e0;
    }
    .btn-primary:hover, .btn-primary:focus {
      background: linear-gradient(45deg, #3a445e, #1e2340);
      box-shadow: 0 4px 15px rgba(58, 68, 94, 0.6);
      color: #fff;
    }

    main.py-4.container {
      min-height: 80vh;
    }
  </style>
</head>
<body>

  @include('layouts.navbar')

  <main class="py-4 container">
    @yield('content')
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
