<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EroIntern Hub | Manage Announcements</title>

    <!-- Custom CSS Link -->
    <link href="{{ asset('css/management/manage-interns.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        /* Additional styles for the modal */
        .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1000;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black with opacity */
    }

    .modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        /* 5% from the top and centered */
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 80%;
        /* Could be more or less, depending on screen size */
        max-width: 600px;
        /* Limit maximum width */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Box shadow */
    }

    /* Close button */
    .close {
        color: #aaa;
        float: right;
        font-size: 24px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    /* Ensure description textarea stays within modal */
    .modal-content textarea {
        width: calc(100% - 40px);
        /* Account for padding and border */
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
        /* Allow vertical resizing */
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .modal-content {
            margin: 10% auto;
            width: 90%;
        }
    }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Add box shadow */
            background-color: #fff;
            /* White background */
            border-radius: 5px;
            /* Rounded corners */
            overflow: hidden;
            /* Prevents shadows from overflowing */
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            font-size: 14px;
            color: #333;
        }

        th {
            background-color: #f2f2f2;
            color: #000;
            font-weight: bold;
            text-transform: uppercase;
            /* Uppercase headings */
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Button styles */
        .create-btn {
            float: right;
            margin-bottom: 10px;
            padding: 10px 20px;
            background-color: #2828DCFF;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .deletebutton {
            background-color: rgb(203, 47, 47);
            color: white;
            font-weight: bold;
            border-radius: 4px;
            border: none;
            padding: 7px 5px;
            width: 100%
        }

        .content-container {
            max-width: 1200px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body bgcolor="red">

    @include('navbar')
    @include('error')

    <div class="content-container">
        <!-- Button to open the modal -->
        <button id="openModalBtn" class="create-btn">Create Announcement</button>
<br>
<br>


        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>

            @if ($announcements->isEmpty())
            
            <tr>
            <td colspan="5" style="text-align:center;">There are no existing announcements.</td>
        </tr>
            
            @else

                @foreach ($announcements as $announcement)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $announcement->title }}</td>
                    <td>{{ $announcement->description }}</td>
                    <td>{{ $announcement->created_at }}</td>
                    <td>
                        <form action="{{ route('delete-announcement', $announcement->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="deletebutton">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>

    </div>

    <!-- The Modal -->
    <div id="announcementModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <form method="POST" action="{{ route('add-announcement') }}">
                @csrf

                <div style="margin-bottom: 20px;">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" required style="width: 100%; padding: 10px;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" required></textarea>
                </div>
                <button type="submit" style="padding: 10px 20px; background-color: #007bff; color: #fff; border: none; cursor: pointer;">Create</button>
            </form>
        </div>
    </div>




    <!-- JavaScript to handle modal toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the modal
            var modal = document.getElementById('announcementModal');

            // Get the button that opens the modal
            var openModalBtn = document.getElementById('openModalBtn');

            // Get the <span> element that closes the modal
            var closeModalBtn = document.getElementById('closeModal');

            // When the user clicks the button, open the modal
            openModalBtn.onclick = function() {
                modal.style.display = 'block';
            }

            // When the user clicks on <span> (x), close the modal
            closeModalBtn.onclick = function() {
                modal.style.display = 'none';
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            }
        });
    </script>

</body>

</html>
