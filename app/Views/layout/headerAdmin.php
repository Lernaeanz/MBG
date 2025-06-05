<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin TraceFood</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">

<!-- Navbar Admin -->
<nav class="bg-[#1E2A32] text-white p-4 flex justify-between items-center shadow-md">
    <a href="/admin" class="font-bold text-xl">TraceFood Admin</a>
    <ul class="flex space-x-6">
        <li><a href="/admin" class="hover:text-yellow-400">Dashboard</a></li>
        <li><a href="/admin/sekolah" class="hover:text-yellow-400">Sekolah</a></li>
        <li><a href="/admin/vendor" class="hover:text-yellow-400">Vendor</a></li>
        <li><a href="/admin/laporan" class="hover:text-yellow-400">Laporan</a></li>
        <li><a href="/admin/pengaduan" class="hover:text-yellow-400">Pengaduan</a></li>
        <li><a href="/logout" class="hover:text-red-500">Logout</a></li>
    </ul>
</nav>

<main class="min-h-screen">
