<!DOCTYPE html>
<html lang="en">
<head>
    <style>
.modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 350px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #08106b;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            text-align: center;
            color:white;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
</style>

@if ($errors->any() || session('error'))
        <div id="errorModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h4>Error occurred!</h4>
                <p>
                    @if ($errors->any())
                        {{ $errors->first() }}
                    @elseif (session('error'))
                        {{ session('error') }}
                    @endif
                </p>
            </div>

        </div>

    @endif





<script>// Display the error modal on page load
window.addEventListener('DOMContentLoaded', (event) => {
    const modal = document.getElementById('errorModal');
    modal.style.display = 'block';
});

// Close the error modal when close button is clicked
document.querySelector('.close').addEventListener('click', function() {
    const modal = document.getElementById('errorModal');
    modal.style.display = 'none';
});
</script>
@yield('content')
