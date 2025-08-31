
<?php include('includes/header.php');?>
<?php include('includes/sidebar.php');?>

<style>
     .pd{
    padding: 0px 5px;
    }
    .hd h4{
        margin-top: 10px;
    }
    .btn{
        font-size: 13px;
    }

</style>

        <div class="page-wrapper">
<div class="container-fluid">
                <!-- Row -->
                <div class="row bdy">
                    <div class="col-lg-12 bdy">
                        <div class="card card-outline-info">
                            <div class="d-flex bdy" style="background: #1976d2;">
                            <div class="hd">
                                <h4 class="text-white px-2 pb-1">Sponsors</h4>
                            </div>
                            <div class="ml-auto">
                                <div class="bdy mt-2 mx-2 mb-2">
                                <!-- Button trigger modal -->
<button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal">
  Add Sponsor</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Sponsor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="#">
                                    <div class="form-body">
                                       
                                        <div class="row p-t-20">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Title</label>
                                                    <input type="text" id="firstName" class="form-control" placeholder="Title">
                                                     </div>
                                            </div>
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                    <label class="control-label">Image</label>
                                                    <input type="file" id="image" class="form-control" placeholder="Title">
                                                     </div>
                                            </div>
                                        </div>
                                    </div>
                                </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
                            </div>
                            </div>
                           
                               
                            </div>
                        </div>
                    </div>
                </div>
</div>

<div class="container-fluid" style="margin-top: -50px;">
                <div class="card-group">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1.</td>
                                                <td>property</td>
                                                <td>abc@gmail.com</td>
                                                <td>677889889</td>
                                                <td>2011/04/25</td>
                                                <td>
                                                <a href="edit_property.php" class="btn btn-warning pd"><i class="fa fa-edit"></i></a>
                                                  <a href="javascript:void(0)" class="btn btn-danger pd"><i class="fa fa-trash"></i></a>

                                                </td>
                                            </tr>
                                    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
    
            <?php include('includes/footer.php');?>