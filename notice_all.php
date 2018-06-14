<?php include_once 'app/inc/header.php'; ?>

<?php
    if ($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['notice_add'])) {
      $notice_add = $ntc->notice_add($_POST,$_FILES);
    }
?>

<?php
  if (isset($_GET['notice_del'])) {
    $id           = $_GET['notice_del'];
    $notice_del   = $ntc->delete_notice_by_id($id);
  }
?>


<?php include_once 'app/inc/navbar.php';?>



    <!--Main layout-->
    <main>
        <div class="container-fluid">
          <div class="row">

            <!--Grid column-->
            <div class="col-md-4 mb-4 mt-4">

                <!--Form with header-->
                <div class="card">

                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                          <div class="form-header orange accent-2">
                              <h3><i class="fa fa-plus"></i> ADD NEW NOTICE</h3>
                          </div>

                          <div class="text-center">
                            
                          </div>


                          <!--Body-->


                          <div class="form-group">
                            <label for="notice_title"><b>Notice Title</b></label>
                            <input type="text" class="form-control" id="notice_title" name="notice_title" placeholder="Write title">
                          </div>

                          <div class="form-group">
                            <label for="notice_description"><b>Notice Description</b></label>
                            <input type="text" class="form-control" id="notice_description" name="notice_desc" placeholder="Describe hare">
                          </div>

                          <div class="form-group">
                            <label for="notice_image"><b>Notice Image</b></label>
                            <input type="file" class="form-control" id="notice_image" name="notice_image" placeholder="Password">
                          </div>

                          <div class="text-center mt-4">
                              <button type="submit" name="notice_add" class="btn btn-orange btn-lg waves-effect waves-light">Submit</button>
                          </div>
                      </form>
                    </div>

                </div>
                <!--Form with header-->

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-8 mb-4 mt-4">

                <!--Form with header-->
                <div class="card">

                    <div class="card-body">
                        <div class="form-header orange accent-2">
                            <h3><i class="fa fa-list"></i> NOTICE LIST</h3>
                        </div>

                        <div class="text-center">
                      </div>

                        <table class="table">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Image</th>
                              <th>Title</th>
                              <th>Desc</th>
                              <th>Date</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php
                                  $get_all_notice = $ntc->get_all_notice();
                                  if ($get_all_notice) {
                                    $i=0;
                                    while ($result= $get_all_notice->fetch_assoc()) {
                                    $i++;
                              ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td><a href="<?php echo $result['notice_image']; ?>" target="_blank">View Image</a></td>
                              <td><?php echo $result['notice_title'];?></td>
                              <td><?php echo $result['notice_desc'];?></td>
                              <td><?php echo date('d F Y',strtotime($result['notice_date']));?></td>


                              <td>
                                <a href="notice_edit.php?notice_id=<?php echo $result['notice_id']; ?>" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning">
                                  <i class="fa fa-pencil"></i>
                                </a> 
                              </td>

                              <td>
                                <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger" onclick="return confirm('are you sure')" href="?notice_del=<?php echo $result['notice_id'];?>">
                                  <i class="fa fa-trash"></i>
                                </a>
                              </td>
                            </tr>
                              <?php } } ?>
                          </tbody>
                        </table>  

                    </div>

                </div>
                <!--Form with header-->

            </div>
            <!--Grid column-->

          </div>
        </div>
    </main>
    <!--Main layout-->

<?php include_once 'app/inc/footer.php' ?>
<?php include_once 'app/inc/foot.php' ?>