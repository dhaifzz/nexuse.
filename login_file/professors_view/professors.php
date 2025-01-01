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
    <link rel="stylesheet" href="profStyle.css">
   
</head>

<body>
     <!-- SIDEBAR AREA -->
     <div class="sidebar" class="menu">
        <div class="top">
            <div class="logo">
                <img src="/nexuse/images/Nexuse.svg" class="cat">
                <span class="text-cat">Nexuse.</span>
            </div>
            <i class="fa-solid fa-bars" id="sbtn"></i>
        </div>
        <ul class="sidebar-icons">
    <li class="menu-item">
        <a href="../professors_view/professors.php">
            <i class="fa-solid fa-house-chimney-user"></i>
            <span class="nav-item">Home</span>
        </a>
    </li>
    <li class="menu-item">
        <a href="../professors_view/subProfs.php">
            <i class="fa-solid fa-inbox"></i>
            <span class="nav-item">Submissions</span>
        </a>
    </li>
    <li class="menu-item">
        <a href="#">
            <i class="fa-solid fa-gear"></i>
            <span class="nav-item">Settings</span>
        </a>
    </li>
    <li class="menu-item">
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
            <a href="#" class="site-title">Home Page.</a>
        </div>
        <div class="navbar-icons">
          <img src="/nexuse/images/therock.png" alt="Profile Icon" class="icon-image">
        </div>
    </nav>

     <!-- MAIN/LAMAN NG CONTAINER -->
     <div class="user-p-cont"> 
              <div class="user-profile">
    <img src="/nexuse/images/therock.png" alt="User Image" class="profile-image">
    <div class="profile-info">
        <h4 class="profile-name">Dwayne Johnson</h4>
        <span class="profile-class">Professor</span>
    </div>
  </div>

  <div class="subject-container">
    <a class="subject-title">Classes</a>

    <div class="subject-area">
    <i class="fa-solid fa-caret-right"></i>
    <div class="subject-code">MAD |</div>
    <div class="subject-name">Mobile App Development</div>
    <button class="letter-button" type="button" onclick="navigateToClass(this)" data-subject="Mobile App Development">View Letters</button>
    <span class="pending-badge">
                    <i class="fa-solid fa-clock-rotate-left" title="Pending"></i>
                    <span class="pending-count">3</span>
                </span>
</div>
<div class="subject-area">
    <i class="fa-solid fa-caret-right"></i>
    <div class="subject-code">HCI |</div>
    <div class="subject-name">Human Computer Interaction</div>
    <button class="letter-button" type="button" onclick="navigateToClass(this)" data-subject="Human Computer Interaction">View Letters</button>
    <span class="pending-badge">
                    <i class="fa-solid fa-clock-rotate-left" title="Pending"></i>
                    <span class="pending-count">0</span>
                </span>
</div>
<div class="subject-area">
    <i class="fa-solid fa-caret-right"></i>
    <div class="subject-code">CC101 |</div>
    <div class="subject-name">Computer Programming 101</div>
    <button class="letter-button" type="button" onclick="navigateToClass(this)" data-subject="Computer Programming 101">View Letters</button>
    <span class="pending-badge">
                    <i class="fa-solid fa-clock-rotate-left" title="Pending"></i>
                    <span class="pending-count">5</span>
                </span>
</div>

<div class="subject-area">
    <i class="fa-solid fa-caret-right"></i>
    <div class="subject-code">DSA |</div>
    <div class="subject-name">Data Structures and Algorithm</div>
    <button class="letter-button" type="button" onclick="navigateToClass(this)" data-subject="Data Structures and Algorithm">View Letters</button>
    <span class="pending-badge">
                    <i class="fa-solid fa-clock-rotate-left" title="Pending"></i>
                    <span class="pending-count">6</span>
                </span>
</div>

<div class="subject-area">
    <i class="fa-solid fa-caret-right"></i>
    <div class="subject-code">WebDev 101 |</div>
    <div class="subject-name">Web Development 101</div>
    <button class="letter-button" type="button" onclick="navigateToClass(this)" data-subject="Web Development 101">View Letters</button>
    <span class="pending-badge">
                    <i class="fa-solid fa-clock-rotate-left" title="Pending"></i>
                    <span class="pending-count">0</span>
                </span>
</div>

<div class="subject-area">
    <i class="fa-solid fa-caret-right"></i>
    <div class="subject-code">CC104 |</div>
    <div class="subject-name">Computer Programming 104</div>
    <button class="letter-button" type="button" onclick="navigateToClass(this)" data-subject="Computer Programming 104">View Letters</button>
    <span class="pending-badge">
                    <i class="fa-solid fa-clock-rotate-left" title="Pending"></i>
                    <span class="pending-count">19</span>
                </span>
</div>
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

    // count ng pending
    document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.pending-count').forEach(function (pendingCountElement) {
        const pendingCount = parseInt(pendingCountElement.textContent);
        const subjectArea = pendingCountElement.closest('.subject-area');
        if (!subjectArea) return;

        const caretIcon = subjectArea.querySelector('.fa-caret-right');
        if (!caretIcon) return;

        if (pendingCount === 0) {
            pendingCountElement.classList.add('pending-black');
            pendingCountElement.classList.remove('pending-red');
            caretIcon.classList.add('arrow-black');
            caretIcon.classList.remove('arrow-red');
        } else if (pendingCount > 1) {
            pendingCountElement.classList.add('pending-red');
            pendingCountElement.classList.remove('pending-black');
            caretIcon.classList.add('arrow-red');
            caretIcon.classList.remove('arrow-black');
        }
    });
}); 

function navigateToClass(button) {
        const subject = button.getAttribute('data-subject');
        window.location.href = `viewSubmissions.php?subject=${subject}`;
    }

     document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.letter-button');

        buttons.forEach(button => {
            button.addEventListener('click', function() {
                const subjectName = this.getAttribute('data-subject');
                // Redirect to faculty-classes.php with the subject name as a query parameter
                window.location.href = `viewSubmissions.php?subject=${encodeURIComponent(subjectName)}`;
            });
        });
    });

//     // button sa letter
//     document.querySelectorAll('.letter-button').forEach(button => {
//     button.addEventListener('click', (event) => {
//         const subjectName = event.currentTarget.getAttribute('data-subject');

//         const modalTitle = document.getElementById('excuseLetterModalLabel');
//         modalTitle.textContent = `${subjectName} | Excuse Letter Form`;

//         const excuseLetterModal = new bootstrap.Modal(document.getElementById('excuseLetterModal'));
//         excuseLetterModal.show();
//     });
// });

    </script>
</body>
</html>
