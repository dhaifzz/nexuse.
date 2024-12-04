<?php
include '../fonts/google_fonts.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login_file/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexuse</title>

    <?php 
    includeGoogleFont([
        'Josefin Sans:ital,wght@0,100..700;1,100..700', 
        'Poppins:wght@400;600'
    ]); 
    ?>

    <script src="https://kit.fontawesome.com/3c9d5fece1.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="adminStyle.css">
   
</head>

<body>
     <!-- SIDEBAR AREA -->
     <div class="sidebar">
        <div class="top">
            <div class="logo">
                <img src="/nexuse/images/Nexuse.svg" class="cat">
                <span class="text-cat">Nexuse.</span>
            </div>
            <i class="fa-solid fa-bars" id="sbtn"></i>
        </div>
        <ul class="sidebar-icons">
    <li>
        <a href="../admin_view/admin.php">
            <i class="fa-solid fa-gauge-high"></i>
            <span class="nav-item">Dashboard</span>
        </a>
    </li>
    <li>
        <a href="../admin_view/admin.php">
            <i class="fa-solid fa-users"></i>
            <span class="nav-item">Accounts</span>
        </a>
    </li>
    <li>
        <a href="#">
            <i class="fa-solid fa-layer-group"></i>
            <span class="nav-item">Subjects</span>
        </a>
    </li>
    <li>
        <a href="#">
            <i class="fa-solid fa-gear"></i>
            <span class="nav-item">Settings</span>
        </a>
    </li>
    <li>
        <a href="../login.php">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <span class="nav-item">Logout</span>
        </a>
    </li>
</ul>
</div>
    </div> 
    <!-- NAVBAR TO -->
    <div class="main">
       <nav class="navbar">
        <div class="navbar-brand">
            <a href="#" class="site-title">Admin Page.</a>
        </div>
        <div class="navbar-icons">
          <img src="/nexuse/images/pacman.jpg" alt="Profile Icon" class="icon-image">
        </div>
    </nav>

     <!-- MAIN/LAMAN NG CONTAINER -->
     <!-- <div class="user-p-cont"> 
              <div class="user-profile">
    <img src="/nexuse/images/pacman.jpg" alt="User Image" class="profile-image">
    <div class="profile-info">
        <h4 class="profile-name">Manny Pacquiao</h4>
        <span class="profile-class">CS Student</span>
    </div>
  </div>

  <div class="subject-container">
    <a class="subject-title">Subjects</a>

    <div class="subject-area">
    <i class="fa-solid fa-caret-right"></i>
    <div class="subject-code">MAD |</div>
    <div class="subject-name">Mobile App Development</div>
    <button class="letter-button" type="button" data-subject="MAD">Send a Letter</button>
</div>
<div class="subject-area">
    <i class="fa-solid fa-caret-right"></i>
    <div class="subject-code">HCI |</div>
    <div class="subject-name">Human Computer Interaction</div>
    <button class="letter-button" type="button" data-subject="HCI">Send a Letter</button>
</div>
<div class="subject-area">
    <i class="fa-solid fa-caret-right"></i>
    <div class="subject-code">CC101 |</div>
    <div class="subject-name">Computer Programming 101</div>
    <button class="letter-button" type="button" data-subject="CC101">Send a Letter</button>
</div>

<div class="subject-area">
    <i class="fa-solid fa-caret-right"></i>
    <div class="subject-code">DSA |</div>
    <div class="subject-name">Data Structures and Algorithm</div>
    <button class="letter-button" type="button" data-subject="DSA">Send a Letter</button>
</div>

<div class="subject-area">
    <i class="fa-solid fa-caret-right"></i>
    <div class="subject-code">CC104 |</div>
    <div class="subject-name">Computer Programming 104</div>
    <button class="letter-button" type="button" data-subject="CC104">Send a Letter</button>
</div>
</div>
           </div>
        </div>
    </div> -->
 <!-- Excuse Letter -->
 <div class="modal fade" id="excuseLetterModal" tabindex="-1" aria-labelledby="excuseLetterModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="excuseLetterModalLabel">Subject | Excuse Letter Form</h5>
                <button type="button" class="fa-regular fa-circle-xmark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="excuseLetterForm">
                    <div class="mb-3">
                        <label for="dateOfAbsent" class="form-label">Date of absent:</label>
                        <input type="date" class="form-control scroll-course" id="dateOfAbsent" required> 
                    </div>
                    <div class="mb-3">
                       <label for="course" class="form-label">Course and Year Level:</label>
                       <select class="form-select" id="course" required>
                           <option value="" disabled selected>- - Select - -</option>
                           <option value="BSCS">BSCS-1</option>
                           <option value="BSCS">BSCS-2</option>
                           <option value="BSCS">BSCS-3</option>
                           <option value="BSCS">BSCS-4</option>
                           <option value="BSIT">BSIT-1</option>
                           <option value="BSIT">BSIT-2</option>
                           <option value="BSIT">BSIT-3</option>
                           <option value="BSIT">BSIT-4</option>
                           <option value="ACT">ACT-1</option>
                           <option value="ACT">ACT-2</option>
                       </select>
                     </div>
                 <div class="mb-3">
                     <label for="prof" class="form-label">Professor:</label>
                     <select class="form-select scrollable-dropdown" id="prof" required>
                         <option value="" class="subm" disabled selected>Submit to:</option>
                         <option value="profs">Marjorie Rojas</option>
                         <option value="profs">Salimar Tahil</option>
                         <option value="profs">Sir Jaidee</option>
                         <option value="profs">Sir Jlo</option>
                         <option value="profs">Sir Gadmar</option>
                         <option value="profs">LeBron James</option>
                         <option value="profs">Sir Rham</option>
                         <option value="profs">Hatake Kakashi</option>
                         <option value="profs">Sir Arip</option>
                         <option value="profs">Sir Schlong</option>
                     </select>
                 </div>

                    <div class="mb-3">
                        <label for="comment" class="form-label">Comment:</label>
                        <textarea class="form-control" id="comment" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="proof" class="form-label">Insert photo of any reliable documents/proof:</label>
                        <input type="file" class="form-control" id="proof" accept="image/*">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JS BANDA -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
    // sidebar burger button
     const btn = document.querySelector("#sbtn");
     const sidebar = document.querySelector(".sidebar");
     btn.addEventListener("click", () => {
     sidebar.classList.toggle("active");
    });

    // button sa letter
    document.querySelectorAll('.letter-button').forEach(button => {
    button.addEventListener('click', (event) => {
        const subjectName = event.currentTarget.getAttribute('data-subject');

        const modalTitle = document.getElementById('excuseLetterModalLabel');
        modalTitle.textContent = `${subjectName} | Excuse Letter Form`;

        const excuseLetterModal = new bootstrap.Modal(document.getElementById('excuseLetterModal'));
        excuseLetterModal.show();
    });
});

    </script>
</body>
</html>
