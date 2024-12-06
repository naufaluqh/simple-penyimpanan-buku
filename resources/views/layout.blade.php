<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Borrowing Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-blue-800 text-white flex flex-col">
            <div class="p-6 text-2xl font-bold">Dashboard</div>
            <ul class="flex-grow space-y-2 px-4 mt-6">
                <li>
                    <a href="{{ route('books.index') }}" class="block py-2 px-4 hover:bg-blue-600 rounded">
                        Daftar Buku
                    </a>
                </li>
                <li>
                    <a href="{{ route('books.create') }}" class="block py-2 px-4 hover:bg-blue-600 rounded">
                        Tambah Buku
                    </a>
                </li>
                <li>
                    <a href="{{ route('loans.index') }}" class="block py-2 px-4 hover:bg-blue-600 rounded">
                        Peminjaman
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main content -->
        <div class="flex-1 bg-gray-200">
            <!-- Navbar -->
            <div class="bg-white shadow p-4 flex justify-between items-center">
                <h1 class="text-2xl font-semibold text-gray-800">Book Borrowing App</h1>
            </div>

            <!-- Content -->
            <div class="container mx-auto p-6">
                @yield('content')
            </div>
        </div>
    </div>

</body>

</html>