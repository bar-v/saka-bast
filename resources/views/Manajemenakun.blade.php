<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Akun') }}
        </h2>
        <div class="nenek">

        </div>
        <div class="flex flex-col items-center">

            <img id="profileImage" src="link_foto_awal.jpg" alt="Foto Profil"
                class="w-24 h-24 rounded-full object-cover mb-4">

            <input id="fileInput" type="file" accept="image/*" class="hidden" onchange="previewImage(event)">

            <button onclick="document.getElementById('fileInput').click()" class="px-4 py-2 00 text-white rounded">
                Ganti Foto Profil
            </button>
        </div>
        <script>
            function previewImage(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('profileImage').src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            }
        </script>

    </x-slot> <br>
</x-app-layout>
