<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">


    {{-- Scripts --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-zinc-100">
    <div class="md:flex flex-row bg-gray-100">


        <x-navbar></x-navbar>
    
        <!-- Main Content Area -->
        <div class="flex-1 p-8 md:ml-56 ml-0">
            {{ $slot }}
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        // ckeditor
        if (document.getElementById('description') !== null) {
            CKEDITOR.replace('description', {
                height: 400
            });
        }

        //  preview image sebelum diubah
        if (document.getElementById('image') !== null) {
            document.getElementById('image').onchange = function () {
                var reader = new FileReader();

                reader.onload = function (e) {
                    // preview image
                    document.getElementById('imagePreview').src = e.target.result;
                };

                reader.readAsDataURL(this.files[0]);
            };
        }

        // sweetalert
        @if (session('success'))
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif (session('error'))
            Swal.fire({
                icon: "error",
                title: "Failed!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif


        // convert title to slug 
        document.getElementById('title').addEventListener('input', 
        function () {
            const titleInput = document.getElementById('title').value;
            const slugInput = document.getElementById('slug');
            
            // replace pertama menghilangkan space pada titleinput menjadi '-'
            // replace kedua menghilangkan non-alpanumerik
            const slug = titleInput
                        .toLowerCase()
                        .replace(/\s+/g, '-')
                        .replace(/[^\w-]+/g, '');

            slugInput.value = slug;
        });

    </script>
</body>
</html>