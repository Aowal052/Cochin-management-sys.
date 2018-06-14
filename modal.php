<?php include_once 'app/inc/header.php'; ?>
<?php include_once 'app/inc/navbar.php';?>



				<div style="height: 300px;"></div>

				<a href="" class="btn btn-primary btn-rounded mb-4 waves-effect waves-light" data-toggle="modal" data-target="#modalContactForm">Launch Modal Contact Form <i class="fa fa-eye ml-1"></i></a>


				<!--Modal: Subscription From-->
                <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog cascading-modal" role="document">
                        <!--Content-->
                        <div class="modal-content">

                            <!--Header-->
                            <div class="modal-header light-blue darken-3 white-text">
                                <h4 class=""><i class="fa fa-newspaper-o"></i> Subscription form</h4>
                                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                            </div>
                            <!--Body-->
                            <div class="modal-body mb-0">

                                <div class="md-form form-sm">
                                    <i class="fa fa-lock prefix"></i>
                                    <input type="password" id="form27" class="form-control form-control-sm">
                                    <label for="form27">Your name</label>
                                </div>

                                <div class="md-form form-sm">
                                    <i class="fa fa-envelope prefix"></i>
                                    <input type="text" id="form28" class="form-control form-control-sm">
                                    <label for="form28">Your email</label>
                                </div>

                                <div class="text-center mt-1-half">
                                    <button class="btn btn-info mb-1">Submit <i class="fa fa-check ml-1"></i></button>
                                </div>

                            </div>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <!--Modal: Subscription From-->


<?php include_once 'app/inc/footer.php' ?>
<?php include_once 'app/inc/foot.php' ?>