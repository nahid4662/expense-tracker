<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Expense Tracker')</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
      @theme {
        --color-clifford: #da373d;
      }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">
  @auth
  <nav class="bg-white p-4 shadow flex justify-between items-center">
    <div class="space-x-4">
      <a href="{{ route('categories.index') }}"
         class="font-semibold px-2 py-1 rounded {{ request()->routeIs('categories.*') ? 'bg-blue-600 text-white' : 'text-gray-700 hover:text-blue-600' }}">
        Categories
      </a>
      <a href="{{ route('expenses.index') }}"
         class="font-semibold px-2 py-1 rounded {{ request()->routeIs('expenses.*') ? 'bg-blue-600 text-white' : 'text-gray-700 hover:text-blue-600' }}">
        Expenses
      </a>
    </div>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition cursor-pointer">Logout</button>
    </form>
  </nav>
  @endauth
  <div class="container mx-auto">
    @yield('content')
  </div>
</body>
</html>
