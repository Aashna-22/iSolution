<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ISolutions</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/create') ?>" class="btn btn-success mb-2">Add User</a>
	</div>
    <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3">
     <table class="table table-bordered" id="users-list">
       <thead>
          <tr>
             <th>Student Id</th>
             <th>Name</th>
             <th>Mobile</th>
             <th>Email</th>
             <th>Course</th>
             <th>Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($students): ?>
          <?php foreach($students as $student): ?>
          <tr>
             <td><?php echo $student['id']; ?></td>
             <td><?php echo $student['name']; ?></td>
             <td><?php echo $student['mobile']; ?></td>
             <td><?php echo $student['email']; ?></td>
             <td><?php echo $student['course']; ?></td>
             <td>
              <a href="<?php echo site_url('/edit/'. $student['id']);?>" class="btn btn-primary btn-sm">Edit</a>
              <a href="<?php echo site_url('/show/'. $student['id']); ?>" class="btn btn-primary btn-sm">View</a>
              <a href="<?php echo site_url('/delete/'. $student['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>
 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
      $('#users-list').DataTable();
  } );
</script>
</body>
</html>