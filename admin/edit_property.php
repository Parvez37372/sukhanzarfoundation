
<?php include('includes/header.php');?>
<?php include('includes/sidebar.php');?>

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> -->


        <div class="page-wrapper">
<div class="container-fluid">
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Add Property</h4>
                            </div>
                            <div class="card-body">
                                <form action="#">
                                    <div class="form-body">
                                       
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Property  Name</label>
                                                    <input type="text" id="firstName" class="form-control" placeholder="Property Name">
                                                     </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Listing Type</label>
                                                    <select class="form-control custom-select">
                                                        <option value="">1</option>
                                                        <option value="">1</option>
                                                    </select>
                                                     </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Category </label>
                                                    <input type="text" id="category" class="form-control" placeholder="Category">
                                                     </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Price</label>
                                                    <input type="number" class="form-control" placeholder="Price">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Bedroom</label>
                                                    <input type="number" class="form-control" placeholder="Bedroom">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Bathroom</label>
                                                    <input type="number" class="form-control" placeholder="Bathroom">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Total Rooms</label>
                                                    <input type="number" class="form-control" placeholder="Total Rooms">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Image</label>
                                                    <input name="file1" type="file" class="dropify" data-height="100" />
                                                </div>
                                        </div>
                                                <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Decription</label>
                                                    <textarea class="form-control form-control-sm mb-3" rows="3"  placeholder="Decription"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <!-- <div class="col-md-6">
                                 <label>Multiple Select2</label>
                            <select id="multiple" class="js-states form-control" multiple>
                                       <option>Java</option>
                                       <option>Javascript</option>
                                       <option>PHP</option>
                                       <option>Visual Basic</option>
                                        </select>
                                       </div>
                                    </div> -->

                                   

                                            <!--  -->

                                        <h3 class="box-title m-t-40">Address</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Street</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>State</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Post Code</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <select class="form-control custom-select">
                                                        <option>--Select your Country--</option>
                                                        <option>India</option>
                                                        <option>Sri Lanka</option>
                                                        <option>USA</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                    </div>
                                    <div class="form-actions mx-auto pb-5">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <button type="button" class="btn btn-inverse">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
               
            </div>

        <!-- jQuery -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
      $("#single").select2({
          placeholder: "Select a programming language",
          allowClear: true
      });
      $("#multiple").select2({
          placeholder: "Select a programming language",
          allowClear: true
      });
    </script> -->
            <?php include('includes/footer.php');?>