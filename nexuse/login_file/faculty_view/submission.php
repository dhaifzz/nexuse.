<?php
// Simulating data from a database query
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Submission</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Course and Year Level</th>
                    <th>Name</th>
                    <th>Date of Absent</th>
                    <th>Date of Submission</th>
                    <th>Comment</th>
                    <th>Document/Proof</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['course_year']); ?></td>
                        <td><?= htmlspecialchars($row['name']); ?></td>
                        <td><?= htmlspecialchars($row['date_absent']); ?></td>
                        <td><?= htmlspecialchars($row['date_submission']); ?></td>
                        <td><?= htmlspecialchars($row['comment']); ?></td>
                        <td>
                            <img src="/nexuse/images/<?= htmlspecialchars($row['photo']); ?>" 
                                 alt="Photo of <?= htmlspecialchars($row['name']); ?>" 
                                 style="width: 50px; height: 50px; object-fit: cover;">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
  </body>
</html>
