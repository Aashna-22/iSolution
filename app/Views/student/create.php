<!DOCTYPE html>
<html>
<head>
  <title>ISolution</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .container {
      max-width: 500px;
    }
    .error {
      display: block;
      padding-top: 5px;
      font-size: 14px;
      color: red;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <h1>Student <?php echo @$students ? 'Edit': 'Create' ?></h1>
    <?php if(isset($students)): ?>
        <form method="post" id="add_create" name="add_create" action="<?php echo site_url('/update') ?>">
    <?php else :?>
        <form method="post" id="add_create" name="add_create" action="<?php echo site_url('/store') ?>">
    <?php endif; ?>
            <input type="hidden" name="student_id" value="<?php echo isset($students) ? $students['id'] : ''; ?>">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="<?php echo old('name') ?? @$students['name']; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo old('email') ?? @$students['email']; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Mobile</label>
                <input type="text" name="mobile" value="<?php echo old('mobile') ?? @$students['mobile']; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Course</label>
                <input type="text" name="course" value="<?php echo old('course') ?? @$students['course']; ?>" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
        </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    if ($("#add_create").length > 0) {
      $("#add_create").validate({
        rules: {
          name: {
            required: true,
          },
          email: {
            required: true,
            maxlength: 60,
            email: true,
          },
          mobile: {
            digits :true,
            minlength: 10,
            maxlength: 10,
            required: true,
          }
        },
        messages: {
          name: {
            required: "Name is required.",
          },
          email: {
            required: "Email is required.",
            email: "It does not seem to be a valid email.",
            maxlength: "The email should be or equal to 60 chars.",
          },
          mobile: {
            required:"Please enter your Mobile Number",
            digits :"Only numbers are allowed in this field!",
            maxlength:'Enter only 10 digit number',
            minlength:'Enter at least 10 digit number'
          }
        },
      })
    }
  </script>
</body>
</html>