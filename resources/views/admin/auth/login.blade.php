<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — MVP Law Firm</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary:   '#242844',
                        secondary: '#B89A72',
                        surface:   '#FDFBFC',
                    }
                }
            }
        }
    </script>
</head>
<body class="h-full bg-gray-50 flex items-center justify-center p-6">
    <div class="w-full max-w-md bg-white rounded-3xl border border-gray-100 shadow-xl p-10">
        <div class="text-center mb-8">
            <p class="font-serif text-3xl font-bold text-primary">MVP Law Firm</p>
            <p class="text-xs text-gray-400 mt-1 uppercase tracking-widest">Admin Authentication</p>
        </div>

        @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-600 rounded-2xl p-4 text-sm mb-6">
            {{ $errors->first() }}
        </div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Alamat Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full border border-gray-200 rounded-2xl px-4 py-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-secondary/40 focus:border-secondary transition-all">
            </div>

            <div>
                <label for="password" class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Password</label>
                <input type="password" id="password" name="password" required
                       class="w-full border border-gray-200 rounded-2xl px-4 py-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-secondary/40 focus:border-secondary transition-all">
            </div>

            <div class="flex items-center">
                <input type="checkbox" id="remember" name="remember" class="rounded border-gray-300 text-secondary focus:ring-secondary">
                <label for="remember" class="ml-2 text-xs text-gray-500">Ingat Saya</label>
            </div>

            <button type="submit"
                    class="w-full bg-primary text-white py-4 rounded-2xl font-bold uppercase tracking-widest text-xs hover:bg-primary/90 transition-colors shadow-lg shadow-primary/15">
                Masuk Ke Dashboard
            </button>
        </form>
    </div>
</body>
</html>
