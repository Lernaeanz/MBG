<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Actor&family=Alegreya:ital,wght@0,400..900;1,400..900&family=Aleo:ital,wght@0,100..900;1,100..900&family=Gowun+Batang&family=Gravitas+One&family=Katibeh&family=Marcellus&family=Purple+Purse&family=Quattrocento:wght@400;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sree+Krushnadevaraya&display=swap" rel="stylesheet">
    <title><?= $title; ?></title>
     <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link href="<?= base_url() ?>css/style.css" rel="stylesheet" />
</head>

<body class="antialiased font-gowun-batang leading-default bg-[#F6F6F6] text-black">
    <div class="absolute w-full min-h-75"></div>
    <!-- sidenav  -->
    <aside class="fixed bg-carrot-2 inset-y-0 flex-wrap items-center justify-between block w-full p-0 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full border-0 shadow-2xl  max-w-64 ease-nav-brand z-990  xl:left-0 xl:translate-x-0" aria-expanded="false">
        <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
            <a class="flex justify-center items-center px-8 py-6 m-0 text-sm whitespace-nowrap  text-black" href="#">
                <img src="/img/logo_tf.png" class="h-[80px]" alt="">
            </a>
                <hr class="h-1 mt-0 bg-white" />
            <ul class="flex flex-col pl-0 font-gowun-batang gap-2 mb-0">

                <li class="mt-0.5 w-full">
                    <a class="py-2.7  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap transition-colors hover:bg-white  
                    <?= $menu == 'dashboard' ? 'bg-white' : '' ?> <?= $menu == 'dashboard-admin' ? 'font-bold ' : '' ?> <?= $menu == 'dashboard-admin' ? 'text-black' : '' ?> " href="<?= base_url('dashboard') ?>">
                        <div class="mr-2 flex h-8 w-8 items-center justify-center bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 text-5 pointer-events-none ease">Dashboard</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap transition-colors hover:bg-white
                    <?= $menu == 'manajemen' ? 'bg-white' : '' ?> <?= $menu == 'manajemen' ? 'font-bold' : '' ?> <?= $menu == 'manajemen' ? 'text-black' : '' ?>" href="<?= base_url('manajemen_artikel') ?>">
                        <div class="mr-2 flex h-8 w-8 items-center justify-center bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-calendar-grid-58"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 text-5 pointer-events-none ease">Manajemen Artikel</span>
                    </a>
                </li>

                <li class="absolute bottom-2 mt-0.5 w-full font-gowun-batang bg-carrot-2">
                    <a class="py-2.7  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap  transition-colors hover:bg-white hover" href="<?= base_url('logout') ?>">
                        <div class="flex h-8 w-8 items-center justify-center bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-red-600 ni ni-world-2"></i>
                        </div>
                        <span class=" flex items-center text-5 font-bold duration-300 opacity-100 pointer-events-none ease">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                            </svg>
                            Keluar</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- end sidenav -->

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        <div class="w-full px-10 py-6 mx-auto">
            <?php $this->renderSection('content'); ?>
        </div>
    </main>
</body>
<!-- main script file  -->
<script src="<?= base_url() ?>js/main.js"></script>
<script>

function previewImg(){
    const gambar = document.querySelector('#gambar');
    const gambarLabel = document.querySelector('label[for="gambar"]');
    const imgPreview = document.querySelector('.img-preview');

    gambarLabel.textContent = gambar.files[0].name;

    const fileGambar = new FileReader();
    fileGambar.readAsDataURL(gambar.files[0]);

    fileGambar.onload = function(e){
        imgPreview.src = e.target.result;
    }
}

</script>

</html>