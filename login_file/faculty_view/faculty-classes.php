<?php
include '../fonts/google_fonts.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login_file/login.php");
    exit();
}

$subject = isset($_GET['subject']) ? $_GET['subject'] : 'N/A'; // Default to 'N/A' if no subject is passed

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
    <link rel="stylesheet" href="fc.css">
</head>

<body>
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
            <a href="../faculty_view/faculty.php">
                <i class="fa-solid fa-house-chimney-user"></i>
                <span class="nav-item">Home</span>
            </a>
        </li>
        <li class="menu-item">
            <a href="../faculty_view/subGuidance.php">
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

<div class="main">
    <nav class="navbar">
        <div class="navbar-brand">
            <a href="#" class="site-title">Year Levels.</a>
        </div>
        <div class="navbar-icons">
            <img src="/nexuse/images/lebron.jpg" alt="Profile Icon" class="icon-image">
        </div>
    </nav>
    <div class="user-p-cont">
    <div class="subject-container">
        <a class="subject-title"><?php echo htmlspecialchars($subject); ?></a>

        <?php if ($subject === "Assistive Computer Tech") : ?>
            <!-- Display 1st and 2nd year only -->
            <div class="subject-area">
                <i class="fa-solid fa-caret-right"></i>
                <div class="year-level">1st Year</div>
                <button class="view-button" type="button" data-subject="<?php echo htmlspecialchars($subject); ?>" data-year="1st Year">View</button>
                <span class="pending-badge">
                    <i class="fa-solid fa-clock-rotate-left" title="Pending"></i>
                    <span class="pending-count">0</span>
                </span>
            </div>

            <div class="subject-area">  
                <i class="fa-solid fa-caret-right"></i>
                <div class="year-level">2nd Year</div>
                <button class="view-button" type="button" data-subject="<?php echo htmlspecialchars($subject); ?>" data-year="2nd Year">View</button>
                <span class="pending-badge">
                    <i class="fa-solid fa-clock-rotate-left" title="Pending"></i>
                    <span class="pending-count">0</span>
                </span>
            </div>
        <?php else : ?>
            <!-- Display all years -->
            <div class="subject-area">
                <i class="fa-solid fa-caret-right"></i>
                <div class="year-level">1st Year</div>
                <button class="view-button" type="button" data-subject="<?php echo htmlspecialchars($subject); ?>" data-year="1st Year">View</button>
                <span class="pending-badge">
                    <i class="fa-solid fa-clock-rotate-left" title="Pending"></i>
                    <span class="pending-count">0</span>
                </span>
            </div>

            <div class="subject-area">
                <i class="fa-solid fa-caret-right"></i>
                <div class="year-level">2nd Year</div>  
                <button class="view-button" type="button" data-subject="<?php echo htmlspecialchars($subject); ?>" data-year="2nd Year">View</button>
                <span class="pending-badge">
                    <i class="fa-solid fa-clock-rotate-left" title="Pending"></i>
                    <span class="pending-count">0</span>
                </span>
            </div>

            <div class="subject-area">
                <i class="fa-solid fa-caret-right"></i>
                <div class="year-level">3rd Year</div>
                <button class="view-button" type="button" data-subject="<?php echo htmlspecialchars($subject); ?>" data-year="3rd Year">View</button>
                <span class="pending-badge">
                    <i class="fa-solid fa-clock-rotate-left" title="Pending"></i>
                    <span class="pending-count">0</span>
                </span>
            </div>

            <div class="subject-area">
                <i class="fa-solid fa-caret-right"></i>
                <div class="year-level">4th Year</div>
                <button class="view-button" type="button" data-subject="<?php echo htmlspecialchars($subject); ?>" data-year="4th Year">View</button>
                <span class="pending-badge">
                    <i class="fa-solid fa-clock-rotate-left" title="Pending"></i>
                    <span class="pending-count">0</span>
                </span>
            </div>
        <?php endif; ?>
    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    const btn = document.querySelector("#sbtn");
    const sidebar = document.querySelector(".sidebar");
    btn.addEventListener("click", () => {
        sidebar.classList.toggle("active");
    });

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
    document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.view-button');

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            const subject = this.getAttribute('data-subject');
            const year = this.getAttribute('data-year');
            // Redirect to yearTable.php with subject and year as query parameters
            window.location.href = `yearTable.php?subject=${encodeURIComponent(subject)}&year=${encodeURIComponent(year)}`;
        });
    });
});

</script>
</body>
</html>
