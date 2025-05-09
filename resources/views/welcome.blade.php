<x-frontend-layout.layouts>
    <section class="my-20">
        <div class="max-w-screen-xl mx-auto px-4">
            <h1 class="text-red-500 text-3xl mb-4">Hello From Home Page</h1>
            <p class="text-gray-700 mb-4">This is the home page of our application.</p>
            <a href="{{ url('/about') }}" class="text-blue-500 hover:underline">Go to About Page</a>
        </div>
    </section>
    <hr>
    <section class="my-20">
        <div class="max-w-screen-xl mx-auto px-4">
            <h1 class="text-2xl text-slate-700 font-bold mb-4 border-slate-700 border-b-2 pb-4">Register Company</h1>
            <form action="{{ route('save') }}" class="mt-4" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-2 gap-5">
                    <div class="mb-3">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                        <input type="text" name="name" id="name"
                        value="{{ old('name') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('name')
                            <small class="text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="text" name="email" id="email"
                        value="{{ old('email') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('email')
                            <small class="text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Phone</label>
                        <input type="text" name="phone" id="phone"
                        value="{{ old('phone') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('phone')
                            <small class="text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Address</label>
                        <input type="text" name="address" id="address"
                        value="{{ old('address') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('address')
                            <small class="text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="logo" class="block mb-2 text-sm font-medium text-gray-900">Logo</label>
                        <input type="file" name="logo" id="logo" class="rounded">
                        @error('logo')
                            <small class="text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <button 
                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 w-24">Submit</button>
            </form>
        </div>
    </section>
</x-frontend-layout.layouts>
