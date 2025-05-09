<x-frontend-layout.layouts>
    <section class="my-20">
        <div class="max-w-screen-xl mx-auto px-4">
            <h1 class="text-red-500 text-3xl">Hello From About Page</h1>
            <p class="text-gray-700">This is the about page of our application.</p>
            <a href="{{ url('/') }}" class="text-blue-500 hover:underline">Go back to Home</a>
        </div>
    </section>
    <hr>
    <section class="my-20">
        <div class="mx-w-screen-xl mx-auto px-4">
            <table class="w-full border border-collapse text-center">
                <thead>
                    <tr>
                        <td class="border">S.n</td>
                        <td class="border">Company Name</td>
                        <td class="border">Company Email</td>
                        <td class="border">Company Phone</td>
                        <td class="border">Company Address</td>
                        <td class="border">Company Logo</td>
                        <td class="border">Action</td>
                    </tr>
                </thead>
                <tbody class="border">
                    @forelse ($company as $key => $com)
                        <tr>
                            <td class="border">{{ ++$key }}</td>
                            <td class="border">{{ $com->name }}</td>
                            <td class="border">{{ $com->email }}</td>
                            <td class="border">{{ $com->phone }}</td>
                            <td class="border">{{ $com->address }}</td>
                            <td class="border">
                                @if ($com->logo)
                                    <img src="{{ asset($com->logo) }}" width="40px" height="40px"
                                        alt="{{ $com->name }}">
                                @else
                                    <p>No Company Logo</p>
                                @endif
                            </td>
                            <td class="border">
                                <form action="{{ route('delete', $com->id) }}" method="POST"
                                    onsubmit="return confirmDelete(this);">
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
        function confirmDelete(form) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
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
