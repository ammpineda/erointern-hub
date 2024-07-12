<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EroIntern Hub | Manage Profile</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<style>
    body {
        font-family: 'Montserrat', sans-serif;
    }
</style>
</head>

<body>
    @include('navbar')


    <!-- Modal Structure -->
    <div class="modal fade" id="incompleteModal" tabindex="-1" role="dialog" aria-labelledby="incompleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="incompleteModalLabel">Incomplete Intern Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Intern details incomplete! Please fill up the missing information.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function validateForm() {
            // Check if first_name, last_name, and email are empty
            var firstName = document.getElementById('first_name').value.trim();
            var lastName = document.getElementById('last_name').value.trim();
            var email = document.getElementById('email').value.trim();

            // Check if required_hours, department, and job_title are empty
            var requiredHours = document.getElementById('required_hours').value.trim();
            var department = document.getElementById('department').value.trim();
            var jobTitle = document.getElementById('job_title').value.trim();

            if (firstName === '' || lastName === '' || email === '' ||
                requiredHours === '' || department === '' || jobTitle === '') {
                // Show the modal
                $('#incompleteModal').modal('show');
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }
    </script>

    <div class="container">
        <h1>{{ $user->first_name }} {{ $user->last_name }}'s Profile</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            <!-- Personal Information Section -->
            <div class="profile-section">
                <h2>Personal Information</h2>
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" id="first_name" name="first_name"
                        value="{{ old('first_name', $user->first_name) }}" required>
                </div>
                <div class="form-group">
                    <label for="middle_name">Middle Name:</label>
                    <input type="text" class="form-control" id="middle_name" name="middle_name"
                        value="{{ old('middle_name', $user->middle_name) }}">
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" id="last_name" name="last_name"
                        value="{{ old('last_name', $user->last_name) }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ old('email', $user->email) }}" required>
                </div>
                <div class="form-group">
                    <label for="password">Password (leave blank to keep current password):</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
                <div class="form-group">
                    <label for="display_picture">Display Picture:</label>
                    <input type="file" class="form-control" id="display_picture" name="display_picture">
                </div>
                <button type="submit" class="btn btn-primary">Update Personal Info</button>
            </div>

            <!-- Work Information Section -->
            <div class="profile-section">
                <h2>Work Information</h2>
                <div class="form-group">
                    <label for="department">Department:</label>
                    <input type="text" class="form-control" id="department" name="department"
                        value="{{ old('department', $user->department) }}">
                </div>
                <div class="form-group">
                    <label for="job_title">Job Title:</label>
                    <input type="text" class="form-control" id="job_title" name="job_title"
                        value="{{ old('job_title', $user->job_title) }}">
                </div>
                <div class="form-group">
                    <label for="supervisor">Supervisor:</label>
                    <input type="text" class="form-control" id="supervisor" name="supervisor"
                        value="{{ old('supervisor', $user->supervisor) }}">
                </div>
                <button type="submit" class="btn btn-primary">Update Work Info</button>
            </div>

            <!-- Additional Information Section -->
            <div class="profile-section">
                <h2>Internship Status</h2>
                <div class="form-group">
                    <label for="required_hours">Required Hours:</label>
                    <input type="number" class="form-control" id="required_hours" name="required_hours"
                        value="{{ old('required_hours', $user->required_hours) }}">
                </div>
                <div class="form-group">
                    <label for="rendered_hours">Rendered Hours:</label>
                    <input type="number" class="form-control" id="rendered_hours" name="rendered_hours"
                        value="{{ old('rendered_hours', $user->rendered_hours) }}">
                </div>
                <div class="form-group">
                    <label for="remaining_hours">Remaining Hours:</label>
                    <input type="number" class="form-control" id="remaining_hours" name="remaining_hours"
                        value="{{ old('remaining_hours', $user->remaining_hours) }}">
                </div>
                <div class="form-group">
                    <label for="has_endorsement_letter">Has Endorsement Letter:</label>
                    <input type="checkbox" id="has_endorsement_letter" name="has_endorsement_letter"
                        {{ old('has_endorsement_letter', $user->has_endorsement_letter) ? 'checked' : '' }}>
                </div>
                <div class="form-group">
                    <label for="has_acceptance_letter">Has Acceptance Letter:</label>
                    <input type="checkbox" id="has_acceptance_letter" name="has_acceptance_letter"
                        {{ old('has_acceptance_letter', $user->has_acceptance_letter) ? 'checked' : '' }}>
                </div>
                <div class="form-group">
                    <label for="onboard_at">Onboard Date:</label>
                    <input type="date" class="form-control" id="onboard_at" name="onboard_at"
                        value="{{ old('onboard_at', $user->onboard_at) }}">
                </div>
                <div class="form-group">
                    <label for="exit_at">Exit Date:</label>
                    <input type="date" class="form-control" id="exit_at" name="exit_at"
                        value="{{ old('exit_at', $user->exit_at) }}">
                </div>
                <button type="submit" class="btn btn-primary">Update Additional Info</button>
            </div>

        </form>
    </div>


    {{-- start of refrennce --}}

    <hr>
    <div class="container bootstrap snippet">

        <div class="row">
            <div class="col-sm-3"><!--left col-->


                <div class="text-center">
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                        class="avatar img-circle img-thumbnail" alt="avatar">
                    <input type="file" class="text-center center-block file-upload">
                </div>
                <br>


            </div><!--/col-3-->
            <div class="col-sm-9">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#personal">Personal Information</a></li>
                    <li><a data-toggle="tab" href="#work">Work Information</a></li>
                    <li><a data-toggle="tab" href="#status">Internship Status</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="personal">
                        <method="POST" action="{{ route('user.update', $user->id) }}"
                        enctype="multipart/form-data"id="registrationForm">
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name">
                                    <h4>First Name:</h4>
                                </label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    value="{{ old('first_name', $user->first_name) }}" required>
                            </div>
                        </div>



                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="middle_name">
                                    <h4>Middle Name:</h4>
                                </label>
                                <input type="text" class="form-control" id="middle_name" name="middle_name"
                                    value="{{ old('middle_name', $user->middle_name) }}">
                            </div>
                        </div>








                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="last_name">
                                    <h4>Last name:</h4>
                                </label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    value="{{ old('last_name', $user->last_name) }}" required>
                            </div>
                        </div>



                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Email:</h4>
                                </label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', $user->email) }}" required>
                            </div>
                        </div>


                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password">
                                    <h4>Password </h4>
                                </label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="(leave blank to keep current password):"
                                    title="enter your password.">
                            </div>
                        </div>


                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password_confirmation">
                                    <h4>Confirm Password:</h4>
                                </label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="password_confirmation">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button type="submit" class="btn btn-primary">Update Personal Info</button>

                            </div>
                        </div>
                        </form>


                    </div><!--/tab-pane-->
                    <div class="tab-pane" id="work">
                        <h2></h2>

                        <form class="form" action="##" method="post" id="registrationForm">





                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="department">
                                        <h4>Department:</h4>
                                    </label>
                                    <input type="text" class="form-control" name="department" id="department">
                                </div>
                            </div>

                        </form>





                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="job_title">
                                    <h4>Job Title:</h4>
                                </label>
                                <input type="text" class="form-control" id="job_title" name="job_title"
                                    value="{{ old('job_title', $user->job_title) }}">
                            </div>
                        </div>




                    </form>
                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="supervisor">
                                <h4>Supervisor:</h4>
                            </label>
                            <input type="text" class="form-control" id="supervisor" name="supervisor"
                            value="{{ old('supervisor', $user->supervisor) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <br>
                            <button type="submit" class="btn btn-primary">Update Work Info</button>

                        </div>
                    </div>
                </form>

                    </div><!--/tab-pane-->
                    <div class="tab-pane" id="status">









                        <form class="form" action="##" method="post" id="registrationForm">
                            <div class="form-group">

   <!-- Additional Information Section -->
<div class="profile-section">
    <h2>Internship Status</h2>

    <div class="form-group">
        <div class="col-xs-6">

        <label for="required_hours">
            <h4>Required Hours:</h4>
        </label>
        <input type="number" class="form-control" id="required_hours" name="required_hours" value="{{ old('required_hours', $user->required_hours) }}">
    </div>
    </div>

    <div class="col-xs-6">

    <div class="form-group">
        <label for="rendered_hours">
            <h4>Rendered Hours:</h4>
        </label>
        <input type="number" class="form-control" id="rendered_hours" name="rendered_hours" value="{{ old('rendered_hours', $user->rendered_hours) }}">
    </div>
    </div>

    <div class="col-xs-6">

    <div class="form-group">
        <label for="remaining_hours">
            <h4>Remaining Hours:</h4>
        </label>
        <input type="number" class="form-control" id="remaining_hours" name="remaining_hours" value="{{ old('remaining_hours', $user->remaining_hours) }}">
    </div>
    </div>

    <div class="col-xs-6">

    <div class="form-group">
        <label for="has_endorsement_letter">
            <h4>Has Endorsement Letter:</h4>
        </label>
        <input type="checkbox" id="has_endorsement_letter" name="has_endorsement_letter" {{ old('has_endorsement_letter', $user->has_endorsement_letter) ? 'checked' : '' }}>
    </div>
    </div>

    <div class="col-xs-6">

    <div class="form-group">
        <label for="has_acceptance_letter">
            <h4>Has Acceptance Letter:</h4>
        </label>
        <input type="checkbox" id="has_acceptance_letter" name="has_acceptance_letter" {{ old('has_acceptance_letter', $user->has_acceptance_letter) ? 'checked' : '' }}>
    </div>
    </div>

    <div class="col-xs-6">

    <div class="form-group">
        <label for="onboard_at">
            <h4>Onboard Date:</h4>
        </label>
        <input type="date" class="form-control" id="onboard_at" name="onboard_at" value="{{ old('onboard_at', $user->onboard_at) }}">
    </div>
    </div>

    <div class="col-xs-6">

    <div class="form-group">
        <label for="exit_at">
            <h4>Exit Date:</h4>
        </label>
        <input type="date" class="form-control" id="exit_at" name="exit_at" value="{{ old('exit_at', $user->exit_at) }}">
    </div>
    </div>
    <div class="form-group" style="text-align: left">
        <div class="col-xs-12">
            <br>
            <button type="submit" class="btn btn-primary">Update Additional Info</button>

        </div>
    </div>

                            </div>

                        </form>
                    </div>

                </div><!--/tab-pane-->
            </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->

</body>

</html>
