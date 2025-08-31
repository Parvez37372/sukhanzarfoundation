
<?php include('includes/header.php');?>
<?php include('includes/sidebar.php');?>

<style>
   
</style>

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
                                        <div class="col-md-12">
                                                <div class="form-group" style="margin-bottom: -5px;">
                                                    <label class="control-label">Images Select Multiple</label>
                                                    <input name="file1" type="file" class="dropify" data-height="100" />
                                                </div>
                                                <span style="font-size: 10px;">Select Only 5 Images</span>

                                        </div>
                                                <div class="col-md-12 mt-3">
                                                <div class="form-group">
                                                    <label class="control-label">Decription</label>
                                                    <textarea class="form-control form-control-sm mb-3" id="editor" rows="3"  placeholder="Decription"></textarea>
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

                                        <h3 class="box-title">Address</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Locality</label>
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
                                                    <label>Lat</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Long</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                    </div>
                                    <div class="form-actions ml-auto pb-5 mx-5">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
               
            </div>


    
            <?php include('includes/footer.php');?>