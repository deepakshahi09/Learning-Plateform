<!DOCTYPE html>
<html>
<head>
    <title>Admin Messages</title>
    @vite('resources/css/app.css')

    <!-- ✅ SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gradient-to-br from-blue-100 to-purple-100 min-h-screen">

<div class="max-w-6xl mx-auto p-8">

    <!-- Heading -->
    <h1 class="text-4xl font-bold mb-8 text-gray-800 flex items-center gap-2">
        📩 User Feedback
    </h1>

    <!-- ✅ Success Popup -->
    @if(session('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: "{{ session('success') }}",
            icon: 'success',
            timer: 2000,
            showConfirmButton: false
        });
    </script>
    @endif

    @if($contacts->count() == 0)
        <div class="bg-white p-6 rounded-xl shadow text-center text-gray-500">
            No messages found 😔
        </div>
    @else

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

        <table class="w-full text-left">

            <thead class="bg-gradient-to-r from-blue-600 to-purple-600 text-white">
                <tr>
                    <th class="p-4">👤 Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach($contacts as $c)
                <tr class="border-b hover:bg-gray-50 transition duration-200">

                    <td class="p-4 font-semibold text-gray-700">
                        {{ $c->name }}
                    </td>

                    <td class="text-gray-600">
                        {{ $c->email }}
                    </td>

                    <td class="max-w-xs text-gray-700">
                        {{ $c->message }}
                    </td>

                    <td class="text-gray-500">
                        {{ \Carbon\Carbon::parse($c->created_at)->format('d M Y') }}
                    </td>

                    <!-- ✅ DELETE WITH SWEETALERT -->
                    <td>
                        <form id="delete-form-{{ $c->id }}" action="/delete-message/{{ $c->id }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="button"
                                onclick="confirmDelete({{ $c->id }})"
                                class="bg-red-500 text-white px-4 py-1 rounded-lg hover:bg-red-600 transition">
                                Delete
                            </button>
                        </form>
                    </td>

                </tr>
                @endforeach

            </tbody>
        </table>

    </div>

    @endif

</div>

<!-- ✅ SweetAlert Script -->
<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "This message will be deleted permanently!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e3342f',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    });
}
</script>

</body>
</html>