<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EroIntern Hub | Manage Daily Reports</title>
    <a href=""></a>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <p>{{ $errors->first() }}</p>

    <style>
        /* manage-interns.css */

        /* Style for the table */table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Add box shadow */
            background-color: #fff; /* White background */
            border-radius: 5px; /* Rounded corners */
            overflow: hidden; /* Prevents shadows from overflowing */
        }

        th, td {
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
            text-transform: uppercase; /* Uppercase headings */
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .viewbutton {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            border-radius: 4px;
            border: none;
            padding: 7px 5px;
            width: 100%
        }
        .modal-form {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #08106b;
            /* Updated background color */
            color: #fff;
            /* Text color */
            margin: 10% auto;
            padding: 20px;
            border-radius: 8px;
            width: 70%;
            /* Adjusted width */
            max-width: 400px;
            /* Adjusted max-width */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            position: relative;
        }
    </style>
</head>

<body>
    @include('navbar')
    <div class="container mt-5">
        <h1 class="mb-4">Recent Daily Accomplishment Reports</h1>
    @if ($accomplishments->isEmpty())
        <p>No unapproved DARs found.</p>
        @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 50px;">ID</th>
                    <th>Date Submitted</th>
                    <th style="width: 250px;">User</th>
                    <th style="width: 300px;">Title</th>
                    <th>Clock In At</th>
                    <th>Clock Out At</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($accomplishments as $accomplishment)
                <tr>
                    <td>{{ $accomplishment->id }}</td>
                    <td> {{ $accomplishment->created_at }} </td>

                    <td>{{ $accomplishment->user->first_name }} {{ $accomplishment->user->last_name }}</td>

                    <td>{{ $accomplishment->title }}</td>
                    <td>{{ $accomplishment->clock_in_at }}</td>
                    <td>{{ $accomplishment->clock_out_at }}</td>
                    <td>
                        @if($accomplishment->is_approved)
                          Approved
                        @else
                        Needs Review
                        @endif
                      </td>                    <td>
                        <button class="viewbutton" onclick="openModal({{ $accomplishment->id }})">REVIEW REPORT</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

              <div id="modal-form" class="modal-form">
                <style>
                    .small-text {
                      font-size: 10px;
                    }
                    h1, h2, h5 {
                      margin: 0;
                      padding: 0;
                    }
                    h1 {
                      font-size: 24px;
                      font-weight: bold;
                    }
                    h2 {
                      font-size: 18px;
                      font-weight: bold;
                      margin-top: 10px;
                    }
                    h5 {
                      font-size: 14px;
                      margin-top: 5px;
                    }
                  </style>
                <div class="modal-content">

                  <h1>Title: {{ $accomplishment->title }}</h1>
                  <span class="small-text">{{ $accomplishment->created_at }}</span>

                  <h2>Submitted by:</h2>
                  <h5>{{ $accomplishment->user->first_name }} {{ $accomplishment->user->last_name }}</h5>

                  <h2>Clock in at:</h2>
                  <h5>{{ $accomplishment->clock_in_at }}</h5>

                  <h2>Clock out at:</h2>
                  <h5>{{ $accomplishment->clock_out_at }}</h5>

                  <h2>Attachments link:</h2>
                  <h5> <a  style ="text-decoration:none; color:#767575;" href="{{ $accomplishment->attachment_file }}" target="_blank"> {{ $accomplishment->attachment_file }}</a></h5>
                  <button  onclick="closePopup()">close</button>
                     <form action="{{ route('approveDAR', ['id' => $accomplishment->id]) }}" method="POST">
      @csrf
      <button type="submit">Approve</button>
    </form>


                </div>
    </div>

              <script>
                function openModal(id) {
                  document.getElementById('modal-form').style.display = 'block';
                }

                function closePopup() {
                  document.getElementById('modal-form').style.display = 'none';
                }

          </script>
@endif
    </div>





</body>

</html>
