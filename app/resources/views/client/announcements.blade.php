<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Announcements</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5e71518412.js" crossorigin="anonymous"></script>

    <style>
        .announcement {
                margin-bottom: 20px;
                padding: 15px;
                background-color: #ffffff;
                /* White background */
                border: 1px solid #ced4da;
                /* Light gray border */
                border-radius: 8px;
                /* Rounded corners */
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                /* Soft shadow */
            }

            .announcement h3 {
                margin: 0;
                color: #007bff;
                /* Blue title color */
                font-size: 1.5rem;
                /* Larger title font size */
            }

            .announcement .date {
                font-size: 0.9rem;
                color: #6c757d;
                /* Gray date color */
                margin-bottom: 10px;
                /* Space below the date */
            }

            .announcement p {
                margin-bottom: 0;
                font-size: 1rem;
                color: #495057;
                /* Dark gray text */
            }

            .announcement a {
                color: #007bff;
                /* Blue link color */
                text-decoration: none;
                font-weight: bold;
            }

            .announcement a:hover {
                text-decoration: underline;
            }</style>
    <script>
        function openPopup() {
            document.getElementById('popup-form').style.display = 'block';
        }

        function closePopup() {
            document.getElementById('popup-form').style.display = 'none';
        }
    </script>
</head>
@include('navbar')

<body>


    <div class="content-container">
        <h2>Announcements</h2>
        @php $count = 0; @endphp
        @foreach ($announcements as $announcement)
        @if ($count < 3)
        <div class="announcement">
            <h3>{{ $announcement->title }}</h3>
            <div class="date">{{ $announcement->created_at }}</div>
            <p>{{ $announcement->description }}</p>
        </div>
        @php $count++; @endphp
        @else
        @break
        @endif
        @endforeach
            @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const togglePasswordBtns = document.querySelectorAll('.toggle-password-btn');
                    togglePasswordBtns.forEach(btn => {
                        btn.addEventListener('click', function () {
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

