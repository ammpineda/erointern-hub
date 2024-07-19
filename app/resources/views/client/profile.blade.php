<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EroIntern Hub | Manage Profile</title>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

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

    .navbar {
        font-family: "Lato", sans-serif;
        font-size: 25px;
        font-weight: bold;
        text-align: center;
        height: 80px;
        width: 100%;
        /* Full width */
        font-weight: normal;
        text-shadow: 1px 1px #000000;
        background-size: 100% auto;
        /* Stretch the image horizontally */
        background-repeat: no-repeat;
        display: flex;
        align-items: center;
        padding: 0 20px;
        /* Add padding to align content */
        margin-top: -10px;
        /* Remove any top margin */
        margin-left: -32px;
        /* Remove left margin */
    }

    .logo {
        width: 150px;
        margin-left: 10px;
    }

    .navbar-text {
        font-size: 25px;
        color: white;
        text-align: center;
        flex: 1;
        font-family: 'Lato', sans-serif;
        font-weight: bold;
        cursor: pointer;
        /* Add cursor pointer for better UX */
        text-decoration: none;
    }

    .navbar-icons {
        margin-left: auto;
        /* Pushes the logout button to the right */
    }

    .icon-btn {
        background: none;
        border: none;
        cursor: pointer;
        color: white;
        /* Set text color */
        font-size: 20px;
        /* Adjust font size */
        margin-left: 15px;
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

        .modal-conten {
            background-color: #08106b;
            /* Updated background color */
            color: #fff;
            /* Text color */
            margin:200px auto;

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


    <style>
        body{
            color:black;
        }
    </style>



    @include('error')
    @if (is_null($user->ojtDetails->required_hours) || is_null($user->jobDetails->department))
    <div id="errorModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="alert alert-warning" role="alert">
                <i class="fa fa-exclamation-triangle"></i> There are some missing details for this user.
            </div>
        </div>
    </div>
@endif
    <div class="container bootstrap snippet" style="background-color: rgb(255, 255, 255); padding-top: 10px; padding-bottom: 10px;border-radius: 1%;">


        <div class="row">
            <div class="col-sm-3"><!--left col-->
                <form id="updatedp" method="post" action="{{ route('user.updatedp', $user->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="text-center">
                        @if ($user->display_picture)
                            <img src="{{ asset('storage/' . $user->display_picture) }}"
                            class="avatar img-circle img-thumbnail" alt="avatar">
                        @else
                            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                                class="avatar img-circle img-thumbnail" alt="avatar">
                        @endif
                        <input type="file" class="text-center center-block file-upload" id="display_picture"
                            name="display_picture">
                        <button type="submit" class="btn btn-primary">Upload Image</button>
                    </div>
                </form>

                <br>
                <li class="list-group-item text-muted" style="color:#000000; font-size: 17px;"><strong>Overview</strong>  <i class="fa fa-dashboard fa-1x"></i></li>
                <ul class="list-group" style="color: black">

                    <li class="list-group-item text-right">
                        <span class="pull-left"><strong>Department</strong></span>
                       <div>{{ $user->JobDetails ? $user->JobDetails->department : 'Fill Missing Details' }}</div>
                    </li>

                    <li class="list-group-item text-right">
                        <span class="pull-left"><strong>Rendered Hours</strong></span>
                        {{ $user->ojtDetails ? $user->ojtDetails->rendered_hours : 'Fill Missing Details' }}
                        <i class="fa fa-dashboard fa-1x"></i>
                    </li>
                    <li class="list-group-item text-right">
                        <span class="pull-left"><strong>Required Hours</strong></span>
                        {{ $user->ojtDetails ? $user->ojtDetails->required_hours : 'Fill Missing Details' }}
                    </li>
                    <li class="list-group-item text-right">
                        <span class="pull-left"><strong>Remaining Hours</strong></span>
                        {{ $user->ojtDetails ? $user->ojtDetails->remaining_hours : 'Fill Missing Details' }}
                    </li>

                </ul>

            </div><!--/col-3-->
            <div class="col-sm-9">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#personal">Personal Information</a></li>
                    <li><a data-toggle="tab" href="#work">Work Information</a></li>
                    <li><a data-toggle="tab" href="#status">Internship Status</a></li>
                </ul>



                <div class="tab-content">
                    <div class="tab-pane active" id="personal">
                        <form method="POST" action="{{ route('user.update', $user->id) }}"
                            enctype="multipart/form-data" id="registrationForm">
                            @csrf
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

                        <form method="POST" action="{{ route('user.update', $user->id) }}" id="form">
                            @csrf
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="department">
                                        <h4>Department:</h4>
                                    </label>
                                    <input type="text" class="form-control" name="department" id="department"
                                        value="{{ old('department',   $user->ojtDetails ? $user->JobDetails->department : '') }}" required>
                                </div>
                            </div>





                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="job_title">
                                        <h4>Job Title:</h4>
                                    </label>
                                    <input type="text" class="form-control" id="job_title" name="job_title"
                                        value="{{ old('job_title', $user->ojtDetails ? $user->JobDetails->job_title : '') }}">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="supervisor">
                                        <h4>Supervisor:</h4>
                                    </label>
                                    <input type="text" class="form-control" id="supervisor" name="supervisor"
                                        value="{{ old('supervisor', $user->ojtDetails ? $user->JobDetails->supervisor : '') }}">
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


                        <form method="POST" action="{{ route('user.update', $user->id) }}" id="form">
                            @csrf

                            <div class="form-group">

                                <!-- Additional Information Section -->
                                <div class="profile-section">
                                    <h2>Internship Status</h2>

                                    <div class="form-group">
                                        <div class="col-xs-6">

                                            <label for="required_hours">
                                                <h4>Required Hours:</h4>
                                            </label>
                                            @if(session('is_intern') == 'true')
                                            <input type="number" class="form-control" id="required_hours" name="required_hours" value="{{ old('required_hours', $user->ojtDetails->required_hours ?? '') }}" readonly disabled>
                                           @else
                                            <input type="number" class="form-control" id="required_hours" name="required_hours" value="{{ old('required_hours', $user->ojtDetails->required_hours ?? '') }}">
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="has_endorsement_letter">
                                                <h4>Has Endorsement Letter:</h4>
                                            </label>
                                            @if(session('is_intern') == 'true')
                                            <input type="checkbox" id="has_endorsement_letter" name="has_endorsement_letter" {{ old('has_endorsement_letter', $user->ojtDetails ? $user->ojtDetails->has_endorsement_letter : false) ? 'checked' : '' }} disabled readonly>
                                          @else
                                            <input type="checkbox" id="has_endorsement_letter" name="has_endorsement_letter" {{ old('has_endorsement_letter', $user->ojtDetails ? $user->ojtDetails->has_endorsement_letter : false) ? 'checked' : '' }}>
                                          @endif
                                            </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="has_acceptance_letter">
                                                <h4>Has Acceptance Letter:</h4>
                                            </label>
                                            @if(session('is_intern') == 'true')
                                                    <input type="checkbox" class="form-check-input" id="has_acceptance_letter" name="has_acceptance_letter"
                                                    {{ old('has_acceptance_letter', $user->ojtDetails ? $user->ojtDetails->has_acceptance_letter : false) ? 'checked' : '' }} disabled readonly>
                                                    @else
                                                    <input type="checkbox" class="form-check-input" id="has_acceptance_letter" name="has_acceptance_letter" {{ old('has_acceptance_letter', $user->ojtDetails ? $user->ojtDetails->has_acceptance_letter : false) ? 'checked' : '' }}>
                                                    @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-6">

                                        <div class="form-group">
                                            <label for="onboard_at">
                                                <h4>Onboard Date:</h4>
                                            </label>
                                            @if(session('is_intern') == 'true')
                                            <input type="date" class="form-control" id="onboard_at" name="onboard_at"
                                                value="{{ old('onboard_at', $user->ojtDetails ? $user->ojtDetails->onboard_at : '') }}" readonly disabled>
                                            @else
                                                <input type="date" class="form-control" id="onboard_at" name="onboard_at"
                                                value="{{ old('onboard_at', $user->ojtDetails ? $user->ojtDetails->onboard_at : '') }}">
                                                @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-6">

                                        <div class="form-group">
                                            <label for="exit_at">
                                                <h4>Exit Date:</h4>
                                            </label>
                                            @if(session('is_intern') == 'true')

                                            <input type="date" class="form-control" id="exit_at" name="exit_at"
                                                value="{{ old('exit_at', $user->ojtDetails ? $user->ojtDetails->exit_at : '') }}" readonly disabled>
                                            @else
                                            <input type="date" class="form-control" id="exit_at" name="exit_at"
                                            value="{{ old('exit_at', $user->ojtDetails ? $user->ojtDetails->exit_at : '') }}">
                                            @endif
                                    </div>


                                    <div class="form-group" style="text-align: left">
                                        <div class="col-xs-12">
                                            <br>
                                            <button type="submit" class="btn btn-primary">Update Additional
                                                Info</button>

                                        </div>
                                    </div>

                                </div>

                        </form>
                    </div>

                </div><!--/tab-pane-->
            </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
    <div>
        <hr><br>
    <div class="container mt-5">
        <h1 class="mb-4"style="margin-top:500px;">All Daily Accomplishment Reports</h1>
    @if ($accomplishments->isEmpty())
        <p>No DARs found for this intern.</p>
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
                        <button class="viewbutton" onclick="openModal({{ $accomplishment->id }})">VIEW REPORT</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $accomplishments->links() }} <!-- Pagination links -->
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
                <div class="modal-conten">

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
                  <button  onclick="closePopup()" style="color: #000000">CLOSE</button>



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
    </div>
</body>

</html>
