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
                                <h4 class="card-title">Add Property</h4>
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Name</th>
                                                <th>Listing Type</th>
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1.</td>
                                                <td>property</td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td> <div class="form-group has-success">
                                                    <!-- <label class="control-label">
                                                    Approve</label> -->
                                                    <select class="form-control custom-select">
                                                        <option value="">Approve</option>
                                                        <option value="">Disapprove</option>
                                                    </select>
                                                     </div></td>
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