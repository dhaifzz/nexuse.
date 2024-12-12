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
    <link rel="stylesheet" href="addAccStyle.css">

   
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
        <a href="../admin_view/addAccount.php">
            <i class="fa-solid fa-users"></i>
            <span class="nav-item">Accounts</span>
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
            <a href="#" class="site-title">Accounts</a>
        </div>
        <div class="navbar-icons">
          <img src="/nexuse/images/pacman.jpg" alt="Profile Icon" class="icon-image">
        </div>
    </nav>

    <div class="user-p-cont">
            <div class="subject-container">
       <a class="subject-title"> Add Account</a>
        <!-- User Request Details -->
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>Name</th>
                    <th>School Email</th>
                    <th>COR</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="font-weight: 600; color: #C70039;">Hudhaifah Abdula Labang</td>
                    <td>dap@wmsu.edu.ph</td>
                    <td class="text-center">
                        <img src="/nexuse/images/COR.png" alt="COR Photo" 
                             class="img-thumbnail" style="width: 70px; height: 70px; cursor: pointer;" 
                             data-src="/nexuse/images/COR.png" data-bs-toggle="modal" data-bs-target="#photoModal">
                    </td>
                    <td class="text-center">
                        <button class="addAcc" data-bs-toggle="modal" data-bs-target="#addAccountModal-1">
                            <i class="fa-solid fa-user-plus"></i>
                        </button>
                    </td>
                    
                </tr>
                <!-- Repeat for other requests -->
            </tbody>
        </table>
        </div>
        </div>

        <!-- Modal Template for Adding Account Details -->
        <div class="modal fade" id="addAccountModal-1" tabindex="-1" aria-labelledby="addAccountModalLabel-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addAccountModalLabel-1">Add Account +</h5>
                        <button type="button" class="fa-regular fa-circle-xmark" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="addAccountForm">
                            <div class="mb-3">
                                <label for="password-1" class="form-label">Password:</label>
                                <input type="password" id="password-1" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="reenterPassword-1" class="form-label">Re-enter Password:</label>
                                <input type="password" id="reenterPassword-1" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="role-1" class="form-label">Role:</label>
                                <select id="role-1" class="form-select" required>
                                    <option value="" disabled selected>Select Role</option>
                                    <option value="Student">Student</option>
                                    <option value="Professor">Professor</option>
                                    <option value="Adviser">Adviser</option>
                                    <option value="Guidance">Guidance</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>

                            <div class="container mt-4">
                                <strong>Select Subject:</strong>
                                <!-- Select All Option -->
                                <div class="form-check-1">
                                    <input class="form-check-input" type="checkbox" id="selectAllSubjects">
                                    <label class="form-check-label" for="selectAllSubjects">
                                        Select All
                                    </label>
                                </div>
                                <!-- Individual Subjects -->
                                <div class="form-check">
                                    <input class="form-check-input subject-checkbox" type="checkbox" value="HCI" id="subjectHCI">
                                    <label class="form-check-label" for="subjectHCI">
                                        HCI
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input subject-checkbox" type="checkbox" value="SIPP" id="subjectSIPP">
                                    <label class="form-check-label" for="subjectSIPP">
                                        SIPP
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input subject-checkbox" type="checkbox" value="CC101" id="subjectCC101">
                                    <label class="form-check-label" for="subjectCC101">
                                        CC101
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input subject-checkbox" type="checkbox" value="NC 127" id="subjectNC">
                                    <label class="form-check-label" for="subjectNC">
                                        NC 127
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input subject-checkbox" type="checkbox" value="DSA 1" id="subjectDSA1">
                                    <label class="form-check-label" for="subjectDSA1">
                                        DSA 1
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input subject-checkbox" type="checkbox" value="WD 2" id="subjectWD2">
                                    <label class="form-check-label" for="subjectWD2">
                                        WD 2
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input subject-checkbox" type="checkbox" value="CC103" id="subjectCC103">
                                    <label class="form-check-label" for="subjectCC103">
                                        CC103
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-plus"></i> Add Account
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- COR Modal -->
        <div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="photoModalLabel">Photo of COR</h5>
                <button type="button" class="fa-regular fa-circle-xmark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <img id="modalPhoto" src="" alt="Full Image" class="img-fluid w-100 h-100" style="object-fit: contain;">
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

     // cor 
    document.addEventListener('click', function (e) {
        if (e.target.matches('[data-bs-toggle="modal"]')) {
            const imgSrc = e.target.getAttribute('data-src');
            const modalPhoto = document.getElementById('modalPhoto');
            modalPhoto.setAttribute('src', imgSrc);
        }
    });



document.addEventListener('DOMContentLoaded', function () {
        const photoModal = document.getElementById('photoModal');
        const modalPhoto = document.getElementById('modalPhoto');

        // Add event listeners to all thumbnails
        document.querySelectorAll('.photo-thumbnail').forEach(thumbnail => {
            thumbnail.addEventListener('click', function () {
                const photoSrc = this.getAttribute('data-photo');
                modalPhoto.setAttribute('src', photoSrc);
            });
        });
    });

document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.addAccountForm').forEach(form => {
                form.addEventListener('submit', function (event) {
                    event.preventDefault();

                    const formId = form.querySelector('input[type=password]').id.split('-')[1];
                    const password = document.getElementById(`password-${formId}`).value;
                    const reenterPassword = document.getElementById(`reenterPassword-${formId}`).value;

                    if (password !== reenterPassword) {
                        alert("Passwords do not match. Please try again.");
                        return;
                    }

                    const role = document.getElementById(`role-${formId}`).value;

                    const subjects = Array.from(document.querySelectorAll(`#addAccountModal-${formId} .form-check-input:checked`))
                        .map(checkbox => checkbox.value);

                    const accountData = {
                        name: "Hudhaifah Abdula Labang", // Replace ng dynamic data
                        schoolEmail: "dap@wmsu.edu.edu", // Replace ng dynamic data
                        password: password,
                        role: role,
                        subjects: subjects
                    };

                    // Simulate saving to backend (replace with AJAX request)
                    console.log("Account data to save:", accountData);
                    alert("Account added successfully!");

                    const modal = bootstrap.Modal.getInstance(document.getElementById(`addAccountModal-${formId}`));
                    modal.hide();
                });
            });
        });
       // Select All functionality
       const selectAllCheckbox = document.getElementById('selectAllSubjects');
          const subjectCheckboxes = document.querySelectorAll('.subject-checkbox');
      
          // When "Select All" is clicked
          selectAllCheckbox.addEventListener('change', function () {
              const isChecked = selectAllCheckbox.checked;
              subjectCheckboxes.forEach(checkbox => {
                  checkbox.checked = isChecked;
              });
          });
      
          // When individual checkboxes are clicked
          subjectCheckboxes.forEach(checkbox => {
              checkbox.addEventListener('change', function () {
                  // Check if all individual checkboxes are selected
                  const allChecked = Array.from(subjectCheckboxes).every(cb => cb.checked);
                  selectAllCheckbox.checked = allChecked;
              });
          });
    </script>
</body>
</html>
