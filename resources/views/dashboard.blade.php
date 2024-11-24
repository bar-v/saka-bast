<x-app-layout>
    <style>
        .card-container {
            transition: transform 0.2s;
        }
        .card-container:hover {
            transform: scale(1.01);
        }
        .team-card {
            transition: all 0.3s ease;
        }
        .team-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .wave-divider {
            position: relative;
            height: 50px;
            background: linear-gradient(45deg, #3b82f6, #2563eb);
        }
    </style>

    <div class="bg-gray-50 dark:bg-gray-900 min-h-screen w-full">
        <!-- Hero Section with wider max width -->
        <div class="py-12 px-4">
            <div class="max-w-8xl mx-auto"> <!-- Increased from max-w-7xl -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-8"> <!-- Increased padding from p-6 -->
                        <!-- Header -->
                        <div class="text-center mb-12"> <!-- Increased margin bottom -->
                            <h1 class="text-5xl font-extrabold text-gray-900 dark:text-gray-100 mb-3"> <!-- Increased text size -->
                                SAKA ANRI
                            </h1>
                            <p class="text-xl text-blue-600 dark:text-blue-400"> <!-- Increased text size -->
                                Sistem Akses Kelola Arsip
                            </p>
                        </div>
                        
                        <!-- Main Card with increased width -->
                        <div class="card-container bg-white dark:bg-gray-700 rounded-lg shadow-2xl overflow-hidden max-w-full">
                            <div class="h-[600px] overflow-hidden relative"> <!-- Increased height -->
                                <img src="{{ asset('image/rororor.jpg') }}" 
                                     alt="SAKA ANRI Banner" 
                                     class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-60"></div>
                                <div class="absolute bottom-0 left-0 p-12 text-white"> <!-- Increased padding -->
                                    <h2 class="text-4xl font-bold mb-3">Selamat Datang di SAKA ANRI</h2> <!-- Increased text size -->
                                    <p class="text-xl">Solusi Modern untuk Pengelolaan Arsip Digital</p>
                                </div>
                            </div>

                            <div class="p-12"> <!-- Increased padding -->
                                <div class="prose prose-xl max-w-none text-gray-600 dark:text-gray-300"> <!-- Increased prose size -->
                                    <p class="text-2xl leading-relaxed"> <!-- Increased text size -->
                                        Website Sistem Akses Kelola Arsip adalah platform digital yang dirancang untuk mengelola data arsip secara efisien dan terstruktur. Website ini memudahkan pengguna dalam menyimpan, mencari, dan mengakses arsip-arsip penting yang dikelola oleh Balai Arsip Statis dan Tsunami. Sistem ini dirancang dengan mempertimbangkan kebutuhan akan keamanan, kemudahan penggunaan, dan skalabilitas untuk menangani berbagai jenis arsip.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Team Section with wider grid -->
                        <div class="mt-20"> <!-- Increased margin top -->
                            <h2 class="text-4xl font-bold text-center text-gray-900 dark:text-gray-100 mb-16"> <!-- Increased text size and margin -->
                                Tim Kami
                            </h2>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 px-4"> <!-- Increased gap and added padding -->
                                <!-- Team Member 1 -->
                                <div class="team-card bg-white dark:bg-gray-700 rounded-xl overflow-hidden shadow-lg">
                                    <div class="h-72 overflow-hidden"> <!-- Increased height -->
                                        <img src="{{ asset('image/raidenroror.jpg') }}" alt="Team Member 1" 
                                             class="w-full h-full object-cover">
                                    </div>
                                    <div class="p-8 text-center"> <!-- Increased padding -->
                                        <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Muhammad Hafizh Haykal</h3>
                                        <p class="text-lg text-blue-600 dark:text-blue-400 mb-4">Full-stack Developer</p>
                                        <p class="text-gray-600 dark:text-gray-300 text-lg">"Tidak ada kekuatan yang lebih besar daripada kebijaksanaan dalam menunggu. Epictetus berkata, 'Kekuatan sejati bukanlah dalam tindakan gegabah, melainkan dalam ketenangan jiwa dan pemahaman akan waktu yang tepat untuk bertindak.'"</p>
                                    </div>
                                </div>

                                <!-- Team Member 2 -->
                                <div class="team-card bg-white dark:bg-gray-700 rounded-xl overflow-hidden shadow-lg">
                                    <div class="h-72 overflow-hidden">
                                        <img src="{{ asset('image/mewroror.jpg') }}" alt="Team Member 2" 
                                             class="w-full h-full object-cover">
                                    </div>
                                    <div class="p-8 text-center">
                                        <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Akbar Sayyidina</h3>
                                        <p class="text-lg text-blue-600 dark:text-blue-400 mb-4">Back-end & Databases Developer</p>
                                        <p class="text-gray-600 dark:text-gray-300 text-lg">“Let down underrated”</p>
                                    </div>
                                </div>

                                <!-- Team Member 3 -->
                                <div class="team-card bg-white dark:bg-gray-700 rounded-xl overflow-hidden shadow-lg">
                                    <div class="h-72 overflow-hidden">
                                        <img src="{{ asset('image/zariror.jpg') }}" alt="Team Member 3" 
                                             class="w-full h-full object-cover">
                                    </div>
                                    <div class="p-8 text-center">
                                        <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">T.R.Zarir Rizqullah</h3>
                                        <p class="text-lg text-blue-600 dark:text-blue-400 mb-4">UI/UX Designed</p>
                                        <p class="text-gray-600 dark:text-gray-300 text-lg">"If you want to make changes in your life. Start slowly, because direction is more important than speed."</p>
                                    </div>
                                </div>

                                <!-- Team Member 4 -->
                                <div class="team-card bg-white dark:bg-gray-700 rounded-xl overflow-hidden shadow-lg">
                                    <div class="h-72 overflow-hidden">
                                        <img src="{{ asset('image/raroror.jpg') }}" alt="Team Member 4" 
                                             class="w-full h-full object-cover">
                                    </div>
                                    <div class="p-8 text-center">
                                        <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">M Radit Febriansyah</h3>
                                        <p class="text-lg text-blue-600 dark:text-blue-400 mb-4">Front-End</p>
                                        <p class="text-gray-600 dark:text-gray-300 text-lg">Belajar dari masa lalu, persiapkan masa sekarang, demi menyiapkan masa depan yang cerah.</p>
                                    </div>
                                </div>

                                <!-- Team Member 5 -->
                                <div class="team-card bg-white dark:bg-gray-700 rounded-xl overflow-hidden shadow-lg">
                                    <div class="h-72 overflow-hidden">
                                        <img src="{{ asset('image/hitam.jpg') }}" alt="Team Member 5" 
                                             class="w-full h-full object-cover">
                                    </div>
                                    <div class="p-8 text-center">
                                        <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Octa Ramadhana A</h3>
                                        <p class="text-lg text-blue-600 dark:text-blue-400 mb-4">Jabatan</p>
                                        <p class="text-gray-600 dark:text-gray-300 text-lg">"Life is Fractal"</p>
                                    </div>
                                </div>

                                <!-- Team Member 6 -->
                                <div class="team-card bg-white dark:bg-gray-700 rounded-xl overflow-hidden shadow-lg">
                                    <div class="h-72 overflow-hidden">
                                        <img src="{{ asset('image/default-avatar.jpg') }}" alt="Team Member 6" 
                                             class="w-full h-full object-cover">
                                    </div>
                                    <div class="p-8 text-center">
                                        <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Annisa</h3>
                                        <p class="text-lg text-blue-600 dark:text-blue-400 mb-4">Jabatan</p>
                                        <p class="text-gray-600 dark:text-gray-300 text-lg">Deskripsi singkat tentang peran dan tanggung jawab.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>