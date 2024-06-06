<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EroIntern Hub | Manage Interns</title>

        <!-- Custom CSS Link -->
<link href="{{ asset('css/management/manage-interns.css') }}" rel="stylesheet">
    <table>
        <thead>
            <tr>
                <th>Intern Name</th>
                <th>Rendered Hours</th>
                <th>Required Hours</th>
                <th>Department</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            {{-- @foreach($interns as $intern)
                <tr>
                    <td>{{ ->onboard_at }}</td>
                    <td> {{-> exit at}}</td>
                    <td>{{ $->name }}</td>
                    <td>{{ $->rendered_hours }}</td>
                    <td>{{ $->required_hours }}</td>
                    <td>{{ $->department }}</td>
                    <td> <a href="">delete</a>edit<a</td>
                </tr>
            @endforeach --}}
        </tbody>
    </table>
</head>
</html>
