<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Akun') }}
        </h2>
        <div class="nenek">
        </div>
    </x-slot> <br>

    <!-- Containerny -->
    <div class="flex justify-center items-center min-h-screen">
        <!-- kotak putih  -->
        <div class="bg-white w-3/4 h-[700px] rounded-lg shadow-lg p-6 flex">
            <div class="w-full">
                <!-- Header Informasi -->
                <div class="border-b pb-2 mb-4">
                    <h3 class="text-lg font-semibold">Info Dasar</h3>
                </div>

                <!-- Informasi Pribadi -->
                <div class="mb-2">
                    <h4 class="text-base font-bold mb-2">PERSONAL INFORMATION <button class="ml-2 text-sm bg-gray-200 px-2 py-1 rounded-lg">Edit</button></h4>
                </div>
                <div>
                    <p class="mb-1"><span class="font-semibold">Nama Depan</span> : RAJA IBLIS</p>
                    <p class="mb-1"><span class="font-semibold">Nama Belakang</span> : HAPID</p>
                    <p class="mb-1"><span class="font-semibold">Email</span> : hapid@gmail.com</p>
                    <p class="mb-1"><span class="font-semibold">Nomor HP</span> : 08223456789</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
