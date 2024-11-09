<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contact Us') }}
        </h2>
    </x-slot> <br>

    <!-- Containerny -->
    <div class="flex justify-center items-center min-h-screen">
        <!-- kotak putih  -->
        <div class="bg-white w-3/4 h-[700px] rounded-lg shadow-lg p-6 flex">
            <!-- Text -->
            <div class="w-1/2 pr-8">
                <h1 class="text-3xl font-bold mb-2">Hubungi Kami</h1>
                <p class="text-lg mb-4">Apakah anda memiliki kendala? Hubungi kami dibawah!</p>
                
                <!-- kotak input -->
                <input type="text" placeholder="Masukkan Nama Anda!" class="w-full mb-4 p-3 rounded-lg bg-gray-200 placeholder-gray-500 focus:outline-none mt-20">
                <input type="email" placeholder="Masukkan Email Anda!" class="w-full mb-4 p-3 rounded-lg bg-gray-200 placeholder-gray-500 focus:outline-none">
                <textarea placeholder="Masukkan kendala yang anda alami!" class="w-full mb-4 p-3 h-32 rounded-lg bg-gray-200 placeholder-gray-500 focus:outline-none"></textarea>
                
                <!-- tombol sumbit -->
                <button class="w-full bg-blue-800 text-white font-bold py-3 rounded-lg">Kirim</button>
            </div>

            <!-- FOTO SAMPENG  -->
            <div class="w-1/2 flex justify-center items-center">
                <!-- Insert your illustration or image here if you have one -->
                <img src="path/to/illustration.png" alt="FOTO ADMIN NJIR" class="max-w-full h-auto">
            </div>
        </div>
    </div>
</x-app-layout>
