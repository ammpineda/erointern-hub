<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Accomplishments</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Clock In At</th>
                <th>Clock Out At</th>
                <th>Attachment</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($accomplishments as $accomplishment)
                <tr>
                    <td>{{ $accomplishment->id }}</td>
                    <td>{{ $accomplishment->title }}</td>
                    <td>{{ $accomplishment->description }}</td>
                    <td>{{ $accomplishment->clock_in_at }}</td>
                    <td>{{ $accomplishment->clock_out_at }}</td>
                    <td>{{ $accomplishment-> attachment_file}}</td>
                    <td>View</td>

            @endforeach
        </tbody>
    </table>
    <body>

</html>


