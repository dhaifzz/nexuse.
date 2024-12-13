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
        'remarks' => 'Missed due to illness',
        'photo' => 'photo1.jpg' // Assuming photos ay stored in the 'images' folder
    ],
    [
        'course_year' => 'BSIT-3',
        'name' => 'Jane Doe',
        'date_absent' => '2024-11-18',
        'date_submission' => '2024-11-23',
        'remarks' => 'Family emergency',
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
                <img src="/nexuse/images/Nexuse.svg" class="cat">
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
          <img src="/nexuse/images/pacman.jpg" alt="Profile Icon" class="icon-image">
        </div>
</nav>
<div class="user-p-cont"> 
              <div class="user-profile">
    <img src="/nexuse/images/pacman.jpg" alt="User Image" class="profile-image">
    <div class="profile-info">
        <h4 class="profile-name">Manny Pacquiao</h4>
        <span class="profile-class">Student</span>
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
                    <th>Remarks</th>
                    <th>Photo</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
               $submissions = [
                   [
                       'subject' => 'MAD',
                       'course' => 'BSCS-2',
                       'date_absent' => '11-20-2024',
                       'date_submission' => '11-21-2024',
                       'remarks' => 'Was unwell.',
                       'photo' => '/nexuse/images/WMSU-PIC.png'
                   ],
                   [
                       'subject' => 'CC104',
                       'course' => 'BSIT-2',
                       'date_absent' => '11-19-2024',
                       'date_submission' => '11-20-2024',
                       'remarks' => 'Family emergency.',
                       'photo' => '/nexuse/images/lebron.jpg'
                   ]
               ];

                 foreach ($submissions as $submission) {
                     echo "<tr>
                         <td style='font-weight: bold; color: #C70039;'>{$submission['subject']}</td>
                         <td>{$submission['course']}</td>
                         <td>{$submission['date_absent']}</td>
                         <td>{$submission['date_submission']}</td>
                         <td style='max-width: 300px;'>{$submission['remarks']}</td>

                         <td>
                             <img src='{$submission['photo']}'
                                  alt='Photo'
                                  class='img-thumbnail photo-thumbnail'
                                  style='width:60px; cursor:pointer;'
                                  data-bs-toggle='modal'
                                  data-bs-target='#photoModal'
                                  data-photo='{$submission['photo']}'>
                         </td>
                         <td></td>
                         <td>
                            <div class='decision-btn'>
                             <button class='edit-button' 
                                     data-bs-toggle='modal' 
                                     data-bs-target='#excuseLetterModal' 
                                     data-course='{$submission['course']}' 
                                     data-date-absent='{$submission['date_absent']}' 
                                     data-remarks='{$submission['remarks']}'>
                                 <i class='fa-regular fa-pen-to-square'></i>
                             </button>
                             <button class='delete-button' 
                                     data-bs-toggle='modal' 
                                     data-bs-target='#deleteModal' 
                                     data-course='{$submission['course']}' 
                                     data-date-absent='{$submission['date_absent']}' 
                                     data-remarks='{$submission['remarks']}'>
                                 <i class='fa-regular fa-trash-can'></i>
                             </button>
                             </div>
                         </td>
                     </tr>";
                 }
                 ?>
            </tbody>
        </table>
      </div> 
    </div>
  <!-- Edit Modal -->
  <div class="modal fade" id="excuseLetterModal" tabindex="-1" aria-labelledby="excuseLetterModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="excuseLetterModalLabel">Edit Submission ✎</h5>
                <button type="button" class="fa-regular fa-circle-xmark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editSubmissionForm">
                    <!-- Course Select -->
                    <div class="mb-3">
                        <label for="editCourse" class="form-label">Course and Year Level:</label>
                        <select class="form-select" id="editCourse" name="course" required>
                            <option value="" disabled selected>- - Select - -</option>
                            <option value="BSCS-1">BSCS-1</option>
                            <option value="BSCS-2">BSCS-2</option>
                            <option value="BSCS-3">BSCS-3</option>
                            <option value="BSCS-4">BSCS-4</option>
                            <option value="BSIT-1">BSIT-1</option>
                            <option value="BSIT-2">BSIT-2</option>
                            <option value="BSIT-3">BSIT-3</option>
                            <option value="BSIT-4">BSIT-4</option>
                            <option value="ACT-1">ACT-1</option>
                            <option value="ACT-2">ACT-2</option>
                        </select>
                    </div>

                    <!-- Date of Absence -->
                    <div class="mb-3">
                        <label for="editDateOfAbsent" class="form-label">Date of Absent:</label>
                        <input type="date" class="form-control" id="editDateOfAbsent" name="date_of_absent" required>
                    </div>

                    <!-- Remarks Textarea -->
                    <div class="mb-3">
                        <label for="editRemarks" class="form-label">Remarks:</label>
                        <textarea class="form-control" id="editRemarks" name="remarks" rows="3"></textarea>
                    </div>
                    
                    <!-- Photo -->
                    <div class="mb-3">
                        <label for="editPhoto" class="form-label">Photo:</label>
                        <small class="form-text text-muted">Upload a new photo to change (optional).</small>
                        <input type="file" class="form-control" id="editPhoto" name="photo" accept="image/*">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Pop up yung pic -->
<div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="photoModalLabel">Photo of a documents/proof</h5>
                <button type="button" class="fa-regular fa-circle-xmark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <img id="modalPhoto" src="" alt="Full Image" class="img-fluid w-100 h-100" style="object-fit: contain;">
            </div>
        </div>
    </div>
</div>

<!-- Delete modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion 🗑</h5>
                <button type="button" class="fa-regular fa-circle-xmark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this submission?</p>
                <ul>
                    <li><strong>Course and Year Level:</strong> <span id="deleteCourse"></span></li>
                    <li><strong>Date of Absent:</strong> <span id="deleteDateAbsent"></span></li>
                    <li><strong>Remarks:</strong> <span id="deleteRemarks"></span></li>
                    <div class="text-center mt-3">
                    <img id="deletePhoto" src="" alt="Photo Preview" class="img-thumbnail" style="max-width: 150px;">
                    </div>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
            </div>
        </div>
    </div>
</div>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

     <script>
    // sidebar burger button
    const btn = document.querySelector("#sbtn");
     const sidebar = document.querySelector(".sidebar");
     btn.addEventListener("click", () => {
     sidebar.classList.toggle("active");
    });
 
    // modal para sa edit submission (not working properly)
    document.addEventListener('DOMContentLoaded', function () {
        const modal = new bootstrap.Modal(document.getElementById('excuseLetterModal'));

        const editButtons = document.querySelectorAll('.edit-button');

        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                const course = this.getAttribute('data-course');
                const dateAbsent = this.getAttribute('data-date-absent');
                const remarks = this.getAttribute('data-remarks');

                document.getElementById('editCourse').value = course;
                document.getElementById('editDateOfAbsent').value = dateAbsent;
                document.getElementById('editRemarks').value = remarks;
            });
        });

        const form = document.getElementById('editSubmissionForm');
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            // Get updated data from the form
            const updatedCourse = document.getElementById('editCourse').value;
            const updatedDateAbsent = document.getElementById('editDateOfAbsent').value;
            const updatedRemarks = document.getElementById('editRemarks').value;
            const updatedPhoto = document.getElementById('editPhoto').files[0]; // di ko na alam pag iupdate photo 

            console.log('Updated Data:', {
                course: updatedCourse,
                date_absent: updatedDateAbsent,
                comment: updatedRemarks ,

            });

            modal.hide();
        });
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

    // delete confimation 
    document.addEventListener('DOMContentLoaded', function () {
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        const deleteButtons = document.querySelectorAll('.delete-button');

        const deleteCourseElement = document.getElementById('deleteCourse');
        const deleteDateAbsentElement = document.getElementById('deleteDateAbsent');
        const deleteRemarksElement = document.getElementById('deleteRemarks');
        const deletePhotoElement = document.getElementById('deletePhoto');
        const confirmDeleteButton = document.getElementById('confirmDelete');

        let rowToDelete = null;

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const course = this.getAttribute('data-course');
                const dateAbsent = this.getAttribute('data-date-absent');
                const remarks = this.getAttribute('data-remarks');
                
                // Fetch the photo URL from the 'img' element in the same <tr>
                const photo = this.closest('tr').querySelector('.photo-thumbnail').getAttribute('src');

                // Populate the modal with the data
                deleteCourseElement.textContent = course;
                deleteDateAbsentElement.textContent = dateAbsent;
                deleteRemarksElement.textContent = remarks;
                deletePhotoElement.setAttribute('src', photo);

                // Store the row for deletion
                rowToDelete = this.closest('tr');
            });
        });

        confirmDeleteButton.addEventListener('click', function () {
            if (rowToDelete) {
                // Remove the row from the table
                rowToDelete.remove();

                // Hide the modal
                deleteModal.hide();

                // Perform additional actions here (e.g., send a request to the server to delete from the database)
                console.log('Deleted entry with details:', {
                    course: deleteCourseElement.textContent,
                    date_absent: deleteDateAbsentElement.textContent,
                    remarks: deleteElement.textContent,
                    photo: deletePhotoElement.getAttribute('src')
                });
            }
        });
    });


    </script>
</body>
</html>
