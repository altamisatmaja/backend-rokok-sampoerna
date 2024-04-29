<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?= BASE_URL . '/public/css/output.css' ?>" rel="stylesheet">
    <link rel="shortcut icon" href="https://seeklogo.com/images/H/hm-sampoerna-logo-64BA2D55A9-seeklogo.com.png"
        type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css" />
    <title>Sampoerna | <?= $title ?></title>
</head>

<body>
    <div>
        <?php include '../views/pages/admin/layouts/navbar.blade.php'; ?>
        <div class="flex overflow-hidden bg-white pt-16">
            <?php include '../views/pages/admin/layouts/sidebar.blade.php'; ?>
            <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
            <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
                <main>
                    <div class="flex flex-wrap items-center pt-8">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-black text-xl">Kategori Hewan</h3>
                        </div>
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                            <a href="<?= BASE_URL . '/rokok/add' ?>">
                                <button
                                    class="tambah-data-categoryproduct bg-red-500 text-white active:bg-primarybase text-xs font-bold px-3 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                    type="button">Tambah data</button>
                            </a>
                        </div>
                    </div>
                    <section class="mt-5 container px-4 mx-auto">
                        <div class="flex flex-col">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                    <div class="overflow-hidden border border-gray-200 md:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50 ">
                                                <tr>
                                                    <th scope="col"
                                                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500">
                                                        <div class="flex items-center gap-x-3">
                                                            <button class="flex items-center gap-x-2">
                                                                <span>No</span>
                                                            </button>
                                                        </div>
                                                    </th>

                                                    <th scope="col"
                                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                                        Nama Rokok
                                                    </th>

                                                    <th scope="col"
                                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                                        Harga
                                                    </th>

                                                    <th scope="col"
                                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                                        Jenis Rokok
                                                    </th>

                                                    <th scope="col"
                                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                                        Aksi
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                <?php $no = 1;
                                                foreach ($rokok as $data): ?>
                                                <tr>
                                                    <td
                                                        class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                        <div class="inline-flex items-center gap-x-3">
                                                            <span><?= $no++ ?></span>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                        <?= $data['nama_rokok'] ?></td>
                                                    <td
                                                        class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                        <div
                                                            class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60 ">
                                                            <svg width="12" height="12" viewBox="0 0 12 12"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10 3L4.5 8.5L2 6" stroke="currentColor"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>

                                                            <h2 class="text-sm font-normal">Rp
                                                                <?= $data['harga_pack'] ?></h2>
                                                        </div>
                                                    </td>

                                                    <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                        <?= $data['type'] ?></td>
                                                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                        <div class="flex items-center gap-x-6">
                                                            <a href="<?= BASE_URL.'/rokok/update/'.$data['id_rokok'] ?>">
                                                                <button
                                                                    class="text-gray-500 transition-colors duration-200 hover:text-indigo-500 focus:outline-none">
                                                                    Edit
                                                                </button>
                                                            </a>

                                                            <button
                                                                class="text-blue-500 transition-colors duration-200 hover:text-indigo-500 focus:outline-none">
                                                                Hapus
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </main>
            </div>
        </div>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
    </div>
</body>

</html>
