<x-app-layout>
    <x-slot name="header">
        
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Arsip') }}
        </h2>
    </x-slot> <br>
<style>
.ibu{
    display: flex;  /* Menggunakan Flexbox */
    height:6vh;  /* Tinggi kontainer 100% dari viewport */
    width: 60vh;
    gap: 20px;
}
.pencari, .tombol1, .tombol2{
flex: 1;  /* Membagi kedua div agar masing-masing mengambil 50% lebar layar */
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction:row;
    padding: 5px;
    border: 1px;
    color: white;
}

.pencari{
    position: absolute;
        right: 10px; /* Menempatkan kolom pencarian 10px dari ujung kanan */
        top: 23%; /* Menggeser ke tengah secara vertikal */
}

    .tombol1{
        color: white;
        background-color: green;
        cursor: pointer; 
        border-radius: 10px;
        padding: 5px;
}
.tombol2{
        color: white;
        background-color: blue;
        cursor: pointer; 
        border-radius: 10px;
        padding: 5px;
}
button:hover{
    background-color:darkgray; /* Warna tombol saat hover */
        border-radius: 10px;
        padding: 6px;
        height:6vh;  /* Tinggi kontainer 100% dari viewport */
        width: 30vh;
        color: black;
}

input[type=text]{
    border-radius: 5px;
}
br{
    width: 20vh;
}
</style>
<div class="ibu">
    <div class="tombol1">
        <button type="button">Import</button>
    </div> 
    <div class="tombol2">
        <button type="button">Edit</button>
    </div>
    <div class="pencari">
        <label for="search">Search:</label>
        <input type="text" id="search" placeholder="Masukkan yang dicari...">
    </div>
</div>
<br>
    <div class="data-arsip">
        
        <H1>Tampilan Table</H1>
    </div>
</x-app-layout>