<x-frontend-layout.layouts>
    <section class="my-20">
        <div class="max-w-screen-xl mx-auto px-4">
            <h1 class="text-red-500 text-3xl">Hello From Course Page</h1>
            <p class="text-gray-700">This is the course page of our application.</p>
            <a href="{{ url('/') }}" class="text-blue-500 hover:underline">Go back to Home</a>
        </div>
    </section>
    <hr>
    <section class="my-20">
        <div class="max-w-screen-xl mx-auto px-4">
            <h1 class="text-2xl text-slate-700 font-bold mb-4 border-slate-700 border-b-2 pb-4">Register Course</h1>
            <form action="{{ route('courses.store') }}" class="mt-4" method="POST" enctype="multipart/form-data">
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
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                        <input type="text" name="description" id="description"
                        value="{{ old('description') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('description')
                            <small class="text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900">price</label>
                        <input type="number" name="price" id="price"
                        value="{{ old('price') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('price')
                            <small class="text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <button
                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 w-24">Submit</button>
            </form>
        </div>
    </section>
    <hr>
    <section class="my-20">
        <div class="max-w-screen-xl mx-auto px-4">
            <h1 class="text-2xl text-slate-700 font-bold mb-4 border-slate-700 border-b-2 pb-4">Course</h1>
            <table class="w-full border border-collapse text-center">
                <thead>
                    <tr>
                        <td class="border">S.n</td>
                        <td class="border">Course Name</td>
                        <td class="border">Course Description</td>
                        <td class="border">Course Price</td>
                        <td class="border">Action</td>
                    </tr>
                </thead>
                <tbody class="border">
                    @forelse ($course as $key => $cou)
                        <tr>
                            <td class="border">{{ ++$key }}</td>
                            <td class="border">{{ $cou->name }}</td>
                            <td class="border">{{ $cou->description }}</td>
                            <td class="border">{{ $cou->price }}</td>
                            <td class="border">
                                <form action="{{ route('courses.destroy', $cou->id) }}" method="POST"
                                    onsubmit="return confirmDelete(event, this, 'course');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 w-24">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No Data Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
    <script>
        function confirmDelete(event, form, type = 'item', name = '') {
            event.preventDefault();

            const itemLabel = ${type}${name ? : ${name} : ''};

            Swal.fire({
                title: Are you sure you want to delete ${itemLabel}?,
                text: "This action cannot be undone.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });

            return false;
        }
    </script>
</x-frontend-layout.layouts>
