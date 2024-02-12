<!DOCTYPE html>
<html lang="en" class="light">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @vite('resources/css/app.css')
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css"
    />
    <title>Admin Shop - {{ $title }}</title>
  </head>
  <body class="modal-open">
    <link
      rel="stylesheet"
      type="text/css"
      href="https://unpkg.com/trix@2.0.8/dist/trix.css"
    />
    <script
      type="text/javascript"
      src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"
    ></script>
    @include('admin.partial.sidebar')
    <div class="content">@yield('content')</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
      document.addEventListener("trix-file-accept", function (e) {
        e.preventDefault();
      });
    </script>
    <style>
      trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
      }
    </style>
    <script src="{{ asset('js/dashboard-js.js') }}"></script>
    <script src="{{ asset('js/preview-img.js') }}"></script>
  </body>
</html>
