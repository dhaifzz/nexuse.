<?php
include '../fonts/google_fonts.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login_file/login.php");
    exit();
}

$data = [
    [
        'course_year' => 'BSCS-1',
        'name' => 'Manny Pacquiao',
        'date_absent' => '2024-11-20',
        'date_submission' => '2024-11-25',
        'comment' => 'Missed due to illness',
        'photo' => 'photo1.jpg' // Assuming photos are stored in the 'images' folder
    ],
    [
        'course_year' => 'BSIT-3',
        'name' => 'Jane Doe',
        'date_absent' => '2024-11-18',
        'date_submission' => '2024-11-23',
        'comment' => 'Family emergency',
        'photo' => 'photo2.jpg'
    ]
];

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
    <link rel="stylesheet" href="submissionsStyle.css">

</head>
<body>
       <!-- SIDEBAR AREA -->
     <div class="sidebar">
        <div class="top">
            <div class="logo">
                <img src="/excuse-site/images/Nexuse.svg" class="cat">
                <span class="text-cat">Nexuse.</span>
            </div>
            <i class="fa-solid fa-bars" id="sbtn"></i>
        </div>
        <ul class="sidebar-icons">
    <li>
        <a href="../student_view/homePage.php">
            <i class="fa-solid fa-house-chimney-user"></i>
            <span class="nav-item">Home</span>
        </a>
    </li>
    <li>
        <a href="../student_view/submissions.php">
            <i class="fa-solid fa-inbox"></i>
            <span class="nav-item">Submissions</span>
        </a>
    </li>
    <li>
        <a href="#">
            <i class="fa-solid fa-book"></i>
            <span class="nav-item">Course</span>
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
<!-- NAVBAR TO -->
<div class="main">
       <nav class="navbar">
        <div class="navbar-brand">
            <a href="#" class="site-title">Submissions</a>
        </div>
        <div class="navbar-icons">
          <img src="/excuse-site/images/pacman.jpg" alt="Profile Icon" class="icon-image">
        </div>
</nav>
<div class="user-p-cont"> 
              <div class="user-profile">
    <img src="/excuse-site/images/pacman.jpg" alt="User Image" class="profile-image">
    <div class="profile-info">
        <h4 class="profile-name">Manny Pacquiao</h4>
        <span class="profile-class">CS Student</span>
    </div>
  </div>
<div class="container mt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Subject</th> 
                    <th>Course and Year Level</th>
                    <th>Date of Absent</th>
                    <th>Date of Submission</th>
                    <th>Comment</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
               <?php
                  $submissions = [
                      [
                          'subject' => 'MAD',
                          'course' => 'BSCS-2',
                          'date_absent' => '2024-11-20',
                          'date_submission' => '2024-11-21',
                          'comment' => 'Was unwell.',
                          'photo' => 'lebron.jpg'
                      ],
                      [
                          'subject' => 'CC104',
                          'course' => 'BSIT-2',
                          'date_absent' => '2024-11-19',
                          'date_submission' => '2024-11-20',
                          'comment' => 'Family emergency.',
                          'photo' => 'lebron.jpg'
                      ]
                  ];
              
                  foreach ($submissions as $submission) {
                       echo "<tr>
                           <td>{$submission['subject']}</td>
                           <td>{$submission['course']}</td>
                           <td>{$submission['date_absent']}</td>
                           <td>{$submission['date_submission']}</td>
                           <td>{$submission['comment']}</td>
                           <td>
                               <img src='{$submission['photo']}' alt='Photo' class='img-thumbnail' style='width:50px;'>
                           </td>
                           <td>
                               <button class='edit-button' 
                                       data-bs-toggle='modal' 
                                       data-bs-target='#excuseLetterModal' 
                                       data-course='{$submission['course']}' 
                                       data-date-absent='{$submission['date_absent']}' 
                                       data-comment='{$submission['comment']}'>
                                   <i class='fa-regular fa-pen-to-square'></i>
                               </button>
                             <button class='delete-button' 
                                     data-bs-toggle='modal' 
                                     data-bs-target='#deleteModal' 
                                     data-course='{$submission['course']}' 
                                     data-date-absent='{$submission['date_absent']}' 
                                     data-comment='{$submission['comment']}'>
                                 <i class='fa-regular fa-trash-can'></i>
                              </button>
                           </td>
                       </tr>";
                  }
              ?>
            </tbody>
        </table>
    </div>
  <!-- Edit Modal -->
  <div class="modal fade" id="excuseLetterModal" tabindex="-1" aria-labelledby="excuseLetterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="excuseLetterModalLabel">Edit Submission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editSubmissionForm">
                        <div class="mb-3">
                            <label for="editDateOfAbsent" class="form-label">Date of Absent:</label>
                            <input type="date" class="form-control" id="editDateOfAbsent" name="date_of_absent" required>
                        </div>
                        <div class="mb-3">
                            <label for="editCourse" class="form-label">Course:</label>
                            <select class="form-select" id="editCourse" name="course" required>
                                <option value="" disabled selected>-- Select your course --</option>
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
                            <label for="editComment" class="form-label">Comment:</label>
                            <textarea class="form-control" id="editComment" name="comment" rows="3"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="photoModalLabel">Photo Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalPhoto" src="" alt="Photo" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <!-- Optional Modal for Editing
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="edit.php" method="POST">
                        <input type="hidden" name="id" id="editId">
                           <div class="mb-3">
                            <label for="editName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="editName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="editCourse" class="form-label">Course and Year Level</label>
                            <input type="text" class="form-control" id="editCourse" name="course_year" required>
                        </div>
                        <div class="mb-3">
                            <label for="editComment" class="form-label">Comment</label>
                            <textarea class="form-control" id="editComment" name="comment" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div> 
            </div>
        </div>
    </div> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-7eRF5zK0PrC3F3aLBVsc4mMb8sv/1F9lH40G3WpCkMo9Um7jEEB5LU4rx4SkH7PR" crossorigin="anonymous"></script>
    <script>
       
       //  function editRecord(id) {
       //      // Populate the modal form with data (simulated for now)
       //      document.getElementById('editId').value = id;
       //      document.getElementById('editName').value = "Sample Name"; // Replace with dynamic data
       //      document.getElementById('editCourse').value = "Sample Course"; // Replace with dynamic data
       //      document.getElementById('editComment').value = "Sample Comment"; // Replace with dynamic data

       //      // Show the modal
       //      const editModal = new bootstrap.Modal(document.getElementById('editModal'));
       //      editModal.show(); }
        
       document.querySelectorAll('.photo-thumbnail').forEach(photo => {
            photo.addEventListener('click', function () {
                const photoSrc = this.getAttribute('data-photo');
                const modalPhoto = document.getElementById('modalPhoto');
                modalPhoto.src = photoSrc;
            });
        });

     const btn = document.querySelector("#sbtn");
     const sidebar = document.querySelector(".sidebar");
     btn.addEventListener("click", () => {
     sidebar.classList.toggle("active");
    });

    document.querySelectorAll('.edit-button').forEach(button => {
            button.addEventListener('click', function () {
                const course = this.getAttribute('data-course');
                const dateAbsent = this.getAttribute('data-date-absent');
                const comment = this.getAttribute('data-comment');

                // Populate modal fields
                document.getElementById('editCourse').value = course;
                document.getElementById('editDateOfAbsent').value = dateAbsent;
                document.getElementById('editComment').value = comment;
            });
        });

        // Handle form submission (example, can be updated to send via AJAX)
        document.getElementById('editSubmissionForm').addEventListener('submit', function (e) {
            e.preventDefault();
            alert('Submission saved!');
            const modal = bootstrap.Modal.getInstance(document.getElementById('excuseLetterModal'));
            modal.hide();
        });

    </script>
</body>
</html>
