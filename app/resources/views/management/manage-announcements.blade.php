<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EroIntern Hub | Manage Interns</title>
    <a href=""></a>

    <!-- Custom CSS Link -->
    <link href="{{ asset('css/management/manage-interns.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <p>{{ $errors->first() }}</p>

<body bgcolor="red">
@include('navbar')

    <div>
        <form method="POST" action="{{ route('add-announcement') }}">
            @csrf

            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div>
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <button type="submit">Create</button>
        </form>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Description</th>
                <th>Posted By</th>
                <th>created at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($announcements as $announcement)
            <tr bgcolor="roronoazoro">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $announcement->title }}</td>
                <td>{{ $announcement->description }}</td>
                <td>{{ $announcement->user->username }}</td>
                <td>{{ $announcement->created_at }}</td>
                <td>View/Edit/Delete</td>
            </tr>
            @endforeach
            @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const togglePasswordBtns = document.querySelectorAll('.toggle-password-btn');
                    togglePasswordBtns.forEach(btn => {
                        btn.addEventListener('click', function() {
                            const passwordText = this.parentNode.querySelector('.password-text');
                            if (passwordText.style.display === 'none') {
                                passwordText.style.display = 'inline';
                                this.textContent = 'Hide';
                            } else {
                                passwordText.style.display = 'none';
                                this.textContent = 'Show';
                            }
                        });
                    });
                });
            </script>
            @endpush
        </tbody>
    </table>
</body>