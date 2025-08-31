<?php include('includes/header.php');?>
<?php include('includes/sidebar.php');?>
<style>
    .pd{
    padding: 0px 5px;
    }
</style>
        <div class="page-wrapper">
 
            <div class="container-fluid">
                <div class="card-group">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Company detail</h4>
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Subject</th>
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
                                                <td>subject</td>
                                                <td>2011/04/25</td>
                                                <td>
                                                <a href="javascript:void(0)" class="btn btn-warning pd"><i class="mdi mdi-eye"></i></a>
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