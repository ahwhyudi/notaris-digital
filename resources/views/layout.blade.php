<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notaris-Digital</title>
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>

</head>
<body>
    <div class="flex">
        <div class="fixed w-64 bg-gray-800 h-full">
            @include('components.sidebar')
        </div>
        <div class="ml-64 w-full">
            @yield('content', 'tidak ada konten')
        </div>
    </div>
    <script>
       // Ambil tombol delete dan checkbox
       document.getElementById('select-all').addEventListener('change', function () {
        const isChecked = this.checked;
        document.querySelectorAll('.row-checkbox').forEach(cb => cb.checked = isChecked);
    });

    const deleteSelector = document.getElementById('deleteSelector');
    const checkboxes = document.querySelectorAll('.row-checkbox');
    const selectAll = document.getElementById('select-all');

    function toggleDeleteButton() {
        const anyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
        deleteSelector.classList.toggle('hidden', !anyChecked);
    }

    checkboxes.forEach(cb => cb.addEventListener('change', toggleDeleteButton));
    selectAll.addEventListener('change', function () {
        checkboxes.forEach(cb => cb.checked = this.checked);
        toggleDeleteButton();
    });
    </script>
    
</body>
</html>