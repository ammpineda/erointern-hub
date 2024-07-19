<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAR Submission</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5e71518412.js" crossorigin="anonymous"></script>
</head>
<body style="font-family: 'Poppins', sans-serif; background-color: #f4f4f4; padding: 20px;">
@include('navbar')

<h1 id="report-title" style="text-align: center; margin-bottom: 20px;">Daily Accomplishment Report Form</h1>

<div style="background-color: white; border-radius: 10px; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); max-width: 600px; margin: auto; color: black;">
    <form action="{{ route('create-dar') }}" method="post" enctype="multipart/form-data">
        @csrf <!-- CSRF Token for Laravel -->

        <div class="clock-container" style="text-align: center; margin-bottom: 20px;">
            <div id="clock" class="clock" style="font-size: 1.5em;"></div>
        </div>

        <div class="main-container" style="margin-bottom: 20px;">
            <label>Title</label>
            <div class="project-title" style="margin-bottom: 10px;">
                <input type="text" id="title" name="title" placeholder="(WEEK#-DAY#-YYMMDD)" required style="width: 95%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; color: black;">
            </div>
            <div class="data-placeholder" style="display: flex; justify-content: space-between;">
                <div class="data-cell clockin" style="flex: 1; margin-right: 10px;">
                    <label>Clock-in time</label>
                    <input type="time" id="clock-in" name="clock_in_at" required style="width: 90%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; color: black;">
                </div>
                <div class="data-cell clockout" style="flex: 1;">
                <label>Clock-out time</label>
                    <input type="time" id="clock-out" name="clock_out_at" required style="width: 90%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; color: black;">
                </div>
            </div>
        </div>

        <div id="status" class="status" style="margin-bottom: 20px;"></div>

        <hr class="section-divider" style="border: none; border-top: 1px solid #eee; margin: 20px 0;">

        <p class="form-instructions" style="margin-bottom: 20px; font-size:small">
        <strong>NOTE!</strong> Please create a repository to store your proof of accomplishments for today (e.g., Marki photos for clock in and clock out, screenshots of completed tasks or progress). Ensure the clarity of these items to avoid delays in report approval. You may not modify your today's report after the submission.
        </p>

        @include('error')
        
        <div class="form-group" style="margin-bottom: 10px;">
            <label for="attachment_file">Link to repository</label>
            <input type="text" id="attachment_file" placeholder="Google Drive/OneDrive" name="attachment_file" style="width: 95%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; color: black;">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="description">Description:</label>
            <textarea id="description" rows="4" cols="50" placeholder="Summarize your accomplishments for today here..." name="description" style="width: 95%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; color: black;"></textarea>
        </div>

        <div class="form-buttons" style="text-align: center;">
            <span style="display: inline-block;">
                <button type="submit" onClick="return confirm('Are you sure? You cannot modify your submission after this.')" style="width: 130px; font-size: large; height: 40px; padding: 10px; text-align: center; text-decoration: none; background-color: #4CAF50; color: white; border: none; border-radius: 5px; margin-right: 10px;">Submit</button>
                <a href="dashboard" style="width: 100px; font-size: medium; padding: 10px; text-align: center; text-decoration: none; background-color: #f44336; color: white; border: none; border-radius: 5px;">Go Back</a>
            </span>
        </div>
    </form>
</div>

<script>
    function cancelForm() {
        window.location.href = '/dashboard';
    }
    document.addEventListener('DOMContentLoaded', function() {
        var today = new Date().toISOString().split('T')[0];
        document.getElementById('report-title').textContent += ' (' + today + ')';
    });
</script>
</body>
</html>
