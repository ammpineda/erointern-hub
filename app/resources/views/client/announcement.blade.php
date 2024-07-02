<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/client/announcement.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5e71518412.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const announcements = document.querySelectorAll('.announcement');

            announcements.forEach(announcement => {
                const id = announcement.getAttribute('data-id');
                if (localStorage.getItem(`announcement_${id}_read`)) {
                    announcement.classList.remove('new');
                    announcement.querySelector('.new-indicator').style.display = 'none';
                }

                announcement.addEventListener('click', function () {
                    this.classList.remove('new');
                    this.querySelector('.new-indicator').style.display = 'none';
                    localStorage.setItem(`announcement_${id}_read`, true);
                });
            });
        });
    </script>
</head>
<body>
    <nav class="navbar">
        <img src="logo.png" alt="Logo" class="logo">
        <div class="header-title">ERovoutika Electronics Robotics Automation - InternHub</div>
        <div class="icons">
            <i class="fa-solid fa-gear"></i>
            <i class="fa-regular fa-bell"></i>
            <i class="fa-solid fa-user"></i>
        </div>
    </nav>

    <div class="content-container">
        <h1>Announcements</h1>
        
        <div class="announcement new" data-id="1">
            <h2>Title: Project Launch <span class="new-indicator">NEW</span></h2>
            <p><strong>Description:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac ligula in metus bibendum hendrerit.</p>
            <p><strong>Posted By:</strong> John Doe</p>
            <p><strong>Date Posted:</strong> June 25, 2024</p>
        </div>
        
        <div class="announcement new" data-id="2">
            <h2>Title: Team Meeting <span class="new-indicator">NEW</span></h2>
            <p><strong>Description:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac ligula in metus bibendum hendrerit.</p>
            <p><strong>Posted By:</strong> Jane Smith</p>
            <p><strong>Date Posted:</strong> June 26, 2024</p>
        </div>
        
        <div class="announcement new" data-id="3">
            <h2>Title: New Interns Orientation <span class="new-indicator">NEW</span></h2>
            <p><strong>Description:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac ligula in metus bibendum hendrerit.</p>
            <p><strong>Posted By:</strong> Mark Johnson</p>
            <p><strong>Date Posted:</strong> June 27, 2024</p>
        </div>
    </div>
</body>
</html>
