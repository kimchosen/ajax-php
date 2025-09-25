<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.rtl.min.css"/>
  </head>
  <body>
    <!-- Add Student -->
<div class="modal fade" id="studentAddModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Student</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="saveStudent">
      <div class="modal-body">
        <div id="errorMessage" class="alert alert-warning d-none"></div>
        <div class="mb-3">
          <label for="">Name</label>
          <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
          <label for="">Email</label>
          <input type="text" name="email" class="form-control">
        </div>
        <div class="mb-3">
          <label for="">Phone</label>
          <input type="text" name="phone" class="form-control">
        </div>
        <div class="mb-3">
          <label for="">Course</label>
          <input type="text" name="course" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Student</button>
        </form>
      </div>
    </div>
  </div>
</div>

 <!-- Edit Student -->
<div class="modal fade" id="studentEditModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Student</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="updateStudent">
      <div class="modal-body">
        <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>
        <input type="hidden" name ="student_id" id="student_id">
        <div class="mb-3">
          <label for="">Name</label>
          <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="mb-3">
          <label for="">Email</label>
          <input type="text" name="email" id="email" class="form-control">
        </div>
        <div class="mb-3">
          <label for="">Phone</label>
          <input type="text" name="phone" id="phone" class="form-control">
        </div>
        <div class="mb-3">
          <label for="">Course</label>
          <input type="text" name="course" id="course" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Student</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- View Student -->
<div class="modal fade" id="studentViewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">View Student</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name ="student_id" id="student_id">
        <div class="mb-3">
          <label for="">Name</label>
          <p id="view_name" class="form-control"></p>
        </div>
        <div class="mb-3">
          <label for="">Email</label>
          <p id="view_email" class="form-control"></p>
        </div>
        <div class="mb-3">
          <label for="">Phone</label>
          <p id="view_phone" class="form-control"></p>
        </div>
        <div class="mb-3">
          <label for="">Course</label>
          <p id="view_course" class="form-control"></p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>PHP Ajax CRUD without the page reload using BOOTSTRAP MODEL         
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#studentAddModal">
                Add Student
              </button>
              </h4> 
            </div>
            <div class="card-body">
              <table id="myTable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Course</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  require 'dbcon.php';
                    $query = "SELECT * FROM students";
                    $query_run = mysqli_query($con, $query);
                    if(mysqli_num_rows($query_run) > 0){
                      foreach($query_run as $student){
                        ?>
                        <tr>
                          <td><?=$student['id']?></td>
                          <td><?=$student['name']?></td>
                          <td><?=$student['email']?></td>
                          <td><?=$student['phone']?></td>
                          <td><?=$student['course']?></td>
                          <td>
                          <button type="button" value="<?=$student['id'];?>" class="viewStudentBtn btn btn-success">View</button>
                            <button type="button" value="<?=$student['id'];?>" class="editStudentBtn btn btn-success">Edit</button>
                            <button type="button" value="<?=$student['id'];?>" class="deleteStudentBtn btn btn-success">Delete</button>

                        

                          </td>
                        </tr>
                        <?php

                      }

                    }
                  ?>
                  <tr></tr>
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <script>
      
      $(document).on('submit','#saveStudent', function (e) {
      e.preventDefault();
      var formData = new FormData(this);
      formData.append("save_student", true);

      $.ajax({
        type : "POST",
        url : "code.php",
        data : formData,
        processData: false,
        contentType: false,
        success: function (response){
          var res = jQuery.parseJSON(response);
          if(res.status == 422){
            $('#errorMessage').removeClass('d-none');
            $('#errorMessage').text(res.message);
           
          }
          else if(res.status == 200){
            alertify.success(res.message);
            $('#errorMessage').addClass('d-none');
            $('#studentAddModal').modal('hide');
            $('#saveStudent')[0].reset();
            $('#myTable').load(location.href + " #myTable");
          }

        }
      });

      });
      $(document).on('click', '.editStudentBtn', function(){
        var student_id = $(this).val();
        //alert(student_id);
        $.ajax({
          type :"GET",
          url : "code.php?student_id=" + student_id,
          success : function (response){

            var res = jQuery.parseJSON(response);
            if(res.status == 422){
              alert(res.message);
           }
            else if(res.status == 200){
              
            $('#student_id').val(res.data.id);
            $('#name').val(res.data.name);
            $('#email').val(res.data.email);
            $('#phone').val(res.data.phone);
            $('#course').val(res.data.course);
            $('#studentEditModal').modal('show');

            }
          }
        });
      });
      $(document).on('submit','#updateStudent', function (e) {
      e.preventDefault();
      
      var formData = new FormData(this);
      formData.append("update_student", true);

      $.ajax({
        type : "POST",
        url : "code.php",
        data : formData,
        processData: false,
        contentType: false,
        success: function (response){
           var res = jQuery.parseJSON(response);
           if(res.status == 422){
             $('#errorMessageUpdate').removeClass('d-none');
             $('#errorMessageUpdate').text(res.message);
           }
           else if(res.status == 200){
            alertify.success(res.message);
             $('#errorMessageUpdate').addClass('d-none');

             $('#studentEditModal').modal('hide');
             $('#updateStudent')[0].reset();

             $('#myTable').load(location.href + " #myTable");
           }

        }
      });

      });
      $(document).on('click', '.viewStudentBtn', function(){
        var student_id = $(this).val();
        //alert(student_id);
        $.ajax({
              type :"GET",
              url : "code.php?student_id=" + student_id,
              success : function (response){

                var res = jQuery.parseJSON(response);
                if(res.status == 422){
                  alert(res.message);
              }
                else if(res.status == 200){
                  
            
                $('#view_name').text(res.data.name);
                $('#view_email').text(res.data.email);
                $('#view_phone').text(res.data.phone);
                $('#view_course').text(res.data.course);

                $('#studentViewModal').modal('show');

            }
          }
        });
      });
      $(document).on('click','.deleteStudentBtn', function (e) {
        e.preventDefault();
        if(confirm('Are you sure you want to delete this data?')){
          var student_id = $(this).val();
          $.ajax({
        type : "POST",
        url : "code.php",
        data : {
          'delete_student': true,
          'student_id' : student_id

        },

        success: function (response){
          var res = jQuery.parseJSON(response);
          if(res.status == 500){
            alert(res.message);
          }else{ 
            alertify.error(res.message); 
            $('#myTable').load(location.href + " #myTable");}   
          }       
        });

      }

  });
    </script>

  </body>
</html>