<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DailyAccomplishment;

class ProfileController extends Controller
{
    public function edit($id)
    {
        $user = User::with('jobDetails', 'ojtDetails')->findOrFail($id);
        $accomplishments = DailyAccomplishment::where('user_id', $id)->paginate(5); // Fetch accomplishments for the specific user

        return view('client.profile', compact('user', 'accomplishments'));
            // Handle null values

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'nullable|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'display_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            'department' =>'nullable|string|max:255',
            'supervisor' =>'nullable|string|max:255',
            'job_title' =>'nullable|string|max:255',


        ]);

        $user = User::findOrFail($id);

    // Update fields only if the input is not null
    if ($request->first_name) {
        $user->first_name = $request->first_name;
    }
    if ($request->middle_name) {
        $user->middle_name = $request->middle_name;
    }
    if ($request->last_name) {
        $user->last_name = $request->last_name;
    }
    if ($request->email) {
        $user->email = $request->email;
    }
    if ($request->password) {
        $user->password = bcrypt($request->password);
    }

    // Update job details only if the input is not null
  // Update job details
  $jobDetail = $user->jobDetails;
  if ($jobDetail) {
      if ($request->department) {
          $jobDetail->department = $request->department;
      }
      if ($request->job_title) {
          $jobDetail->job_title = $request->job_title;
      }
      if ($request->supervisor) {
          $jobDetail->supervisor = $request->supervisor;
      }
      $jobDetail->save();
  } else {
      // Create a new JobDetail instance
      $jobDetail = new JobDetail();
      $jobDetail->department = $request->department;
      $jobDetail->job_title = $request->job_title;
      $jobDetail->supervisor = $request->supervisor;
      $user->jobDetails()->save($jobDetail);
  }

  // Update OJT details
  $ojtDetail = $user->ojtDetails;
  if ($ojtDetail) {
      if ($request->required_hours) {
          $ojtDetail->required_hours = $request->required_hours;
      }
        $ojtDetail->has_endorsement_letter = (bool) $request->has_endorsement_letter;
        $ojtDetail->has_acceptance_letter = (bool) $request->has_acceptance_letter;

        if ($request->onboard_at) {
            $ojtDetail->onboard_at = $request-> onboard_at;
        }

        if ($request->exit_at) {
            $ojtDetail->exit_at = $request-> exit_at;
        }
      // Update other OJT details fields
      $ojtDetail->save();
  } else {
      // Create a new OjtDetail instance
      $ojtDetail = new OjtDetail();
      $ojtDetail->required_hours = $request->required_hours;
      // Set other OJT details fields
      $user->ojtDetails()->save($ojtDetail);
  }
    $user->save();



        return redirect()->route('client-profile', $user->id)->with('success', 'User updated successfully.');
    }


        public function updateDP(Request $request, $id)
        {
            $user = User::findOrFail($id);

            // Validate and process the image upload
            $validatedData = $request->validate([
                'display_picture' => 'required|image|max:2048', // Validation rules for the image file
            ]);

            // Process the image upload and associate it with a user
            if ($request->hasFile('display_picture')) {
                $filePath = $request->file('display_picture')->store('display_pictures', 'public');
                 $user->display_picture = $filePath;
                $user->save();
            }

            // Redirect or return a response
            return redirect()->back()->with('success', 'Image uploaded successfully!');
        }

}
