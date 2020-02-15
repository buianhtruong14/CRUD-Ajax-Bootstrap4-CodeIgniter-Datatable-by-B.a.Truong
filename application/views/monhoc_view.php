<html>

<head>
     <title><?php echo $title; ?></title>

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
     <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" />
     <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css" />
     
     <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

     
</head>

<body>
<div class="container">
		<div class="row">
			<div class="col-md-12 mt-5">
				<h1 class="text-center"><?php echo $title; ?></h1>
				<hr style="background-color: black; color:black; height:1px;">
			</div>
          </div>
          <ul class="nav">
               <li class="nav-item">
                    <a href="http://localhost/ci3ajax/" class="nav-link">
                         Quản Lý Giáo Viên
                    </a>
               </li>
               <li class="nav-item">
                    <a href="http://localhost/ci3ajax/hocsinh" class="nav-link">
                         Quản Lý Học Sinh
                    </a>
               </li>
               <li class="nav-item">
                    <a href="http://localhost/ci3ajax/lop" class="nav-link">
                         Quản Lý Lớp
                    </a>
               </li>
               <li class="nav-item">
                    <a href="http://localhost/ci3ajax/monhoc" class="nav-link">
                         Quản Lý Môn Học
                    </a>
               </li>
               <li class="nav-item">
                    <a href="http://localhost/ci3ajax/diem" class="nav-link">
                         Quản Lý Điểm
                    </a>
               </li>
          </ul>
          <hr style="background-color: black; color:black; height:1px;">
		<div class="row">
			<div class="col-md-12 mt-2">
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
					Thêm Môn Học
				</button>

				<!-- add data -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Thêm Lớp</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="" method="post" id="form">
									<div class="form-group">
										<label for="">Tên Môn Học</label>
										<input type="text" id="ten_mh" class="form-control">
									</div>
									<div class="form-group">
										<label for="">Lớp Học</label>
										<input type="text" id="lop_hoc" class="form-control">
									</div>
									<div class="form-group">
										<label for="">Tiết Dạy</label>
										<input type="text" id="tiet_day" class="form-control">
									</div>
									<div class="form-group">
										<label for="">Giáo Viên Dạy</label>
										<input type="text" id="gv_day" class="form-control">
									</div>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary " id="add">Thêm</button>
							</div>
						</div>
					</div>
				</div>

				<!-- edit data -->
				<div class="modal fade" id="editModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Sửa Thông Tin Môn Học</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="" method="post" id="edit_form">
									<input type="hidden" id="edit_model_id" value="">
									<div class="form-group">
										<label for="">Tên Môn Học</label>
										<input type="text" id="edit_ten_mh" class="form-control">
									</div>
									<div class="form-group">
										<label for="">Lớp Học</label>
										<input type="text" id="edit_lop_hoc" class="form-control">
									</div>
									<div class="form-group">
										<label for="">Tiết Dạy</label>
										<input type="text" id="edit_tiet_day" class="form-control">
									</div>
									<div class="form-group">
										<label for="">Giáo Viên Dạy</label>
										<input type="text" id="edit_gv_day" class="form-control">
									</div>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary " id="update">Sửa</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 mt-3">
				<table class="table" id="user_data">
					<thead>
						<tr>
                                   <th>Tên Môn Học</th>
                                   <th>Lớp Học</th>
                                   <th>Tiết Dạy</th>
                                   <th>Giáo Viên Dạy</th>
                                   <th>Edit</th>
                                   <th>Delete</th>
						</tr>
					</thead>
					
				</table>
			</div>
		</div>
	</div>

     <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
     <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
     <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
     
     <script type="text/javascript" language="javascript">
          $(document).ready(function() {
               var dataTable = $('#user_data').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "order": [],
                    "ajax": {
                         url: "<?php echo base_url() . 'monhoc/fetch_user'; ?>",
                         type: "POST"
                    },
                    "columnDefs": [{
                         "targets": [0, 3, 4],
                         "orderable": false,
                    }, ],
               });

          });
          $(document).on("click", "#add", function(e) {
               e.preventDefault();

               var ten_mh = $("#ten_mh").val();
               var lop_hoc = $("#lop_hoc").val();
               var tiet_day = $("#tiet_day").val();
               var gv_day = $("#gv_day").val();
               if (ten_mh == "" || lop_hoc == "" || tiet_day == "" || gv_day == "") {
                    alert("all field is required");
               } else {
                    $.ajax({
                         url: "<?php echo base_url() . 'monhoc/insert'; ?>",
                         type: "post",
                         dataType: "json",
                         data: {
                              ten_mh: ten_mh,
                              lop_hoc: lop_hoc,
                              tiet_day: tiet_day,
                              gv_day: gv_day
                         },
                         success: function(data) {

                              location.reload();


                         }
                    });
               }


          });
          $(document).on("click", "#del", function(e) {
               e.preventDefault();

               var del_id = $(this).attr("value");

               if (del_id == "") {
                    alert("Delete is requied")
               } else {
                    const swalWithBootstrapButtons = Swal.mixin({
                         customClass: {
                              confirmButton: 'btn btn-success',
                              cancelButton: 'btn btn-danger mr-2'
                         },
                         buttonsStyling: false
                    })

                    swalWithBootstrapButtons.fire({
                         title: 'Bạn Chắc Chắn Chứ ?',
                         text: "Bạn không thể khôi phục chúng!",
                         icon: 'warning',
                         showCancelButton: true,
                         confirmButtonText: 'Xóa !',
                         cancelButtonText: 'Không, Hủy !',
                         reverseButtons: true
                    }).then((result) => {
                         if (result.value) {

                              $.ajax({
                                   url: "<?php echo base_url() . 'monhoc/delete'; ?>",
                                   type: "post",
                                   dataType: "json",
                                   data: {
                                        del_id: del_id
                                   },
                                   success: function(data) {

                                        if (data.responce == "success") {
                                             swalWithBootstrapButtons.fire(
                                                  'Đã Xóa!',
                                                  'Dữ Liệu đã được xóa.',
                                                  'Thành Công!'
                                             )
                                             location.reload();
                                        }

                                   }
                              });

                         } else if (
                              /* Read more about handling dismissals below */
                              result.dismiss === Swal.DismissReason.cancel
                         ) {
                              swalWithBootstrapButtons.fire(
                                   'Đã Hủy!',
                                   'Dữ liệu chưa được xóa. :)',
                                   'Đã hủy'
                              )
                         }
                    })
               }
          });

          $(document).on("click", "#edit", function(e) {
               e.preventDefault();

               var edit_id = $(this).attr("value");

               if (edit_id == "") {
                    alert("Delete is requied")
               } else {
                    $.ajax({
                         url: "<?php echo base_url() . 'monhoc/edit'; ?>",
                         type: "post",
                         dataType: "json",
                         data: {
                              edit_id: edit_id
                         },
                         success: function(data) {
                              if (data.responce == "success") {
                                   $('#editModel').modal('show');
                                   $("#edit_model_id").val(data.post.id);
                                   $("#edit_ten_mh").val(data.post.ten_mh);
                                   $("#edit_lop_hoc").val(data.post.lop_hoc);
                                   $("#edit_tiet_day").val(data.post.tiet_day);
                                   $("#edit_gv_day").val(data.post.gv_day);
                              } else {
                                   toastr["success"](data.message);

                                   toastr.options = {
                                        "closeButton": true,
                                        "debug": false,
                                        "newestOnTop": false,
                                        "progressBar": true,
                                        "positionClass": "toast-top-right",
                                        "preventDuplicates": false,
                                        "onclick": null,
                                        "showDuration": "300",
                                        "hideDuration": "1000",
                                        "timeOut": "5000",
                                        "extendedTimeOut": "1000",
                                        "showEasing": "swing",
                                        "hideEasing": "linear",
                                        "showMethod": "fadeIn",
                                        "hideMethod": "fadeOut"
                                   }
                              }
                         }
                    });
               }
          });

          //update data
          $(document).on("click", "#update", function(e) {
               e.preventDefault();

               var edit_id = $("#edit_model_id").val();
               var edit_ten_mh = $("#edit_ten_mh").val();
               var edit_lop_hoc = $("#edit_lop_hoc").val();
               var edit_tiet_day = $("#edit_tiet_day").val();
               var edit_gv_day = $("#edit_gv_day").val();

               if (edit_id == "" || edit_ten_mh == "" || edit_lop_hoc == "" || edit_tiet_day == "" ||
                    edit_gv_day == "") {
                    alert("all field is required");
               } else {

                    $.ajax({
                         url: "<?php echo base_url() . 'monhoc/update'; ?>",
                         type: "post",
                         dataType: "json",
                         data: {
                              edit_id: edit_id,
                              edit_ten_mh: edit_ten_mh,
                              edit_lop_hoc: edit_lop_hoc,
                              edit_tiet_day: edit_tiet_day,
                              edit_gv_day: edit_gv_day
                         },
                         success: function(data) {

                              if (data.responce == "success") {
                                   $('#editModal').modal('hide');
                                   toastr["success"](data.message);

                                   toastr.options = {
                                        "closeButton": true,
                                        "debug": false,
                                        "newestOnTop": false,
                                        "progressBar": true,
                                        "positionClass": "toast-top-right",
                                        "preventDuplicates": false,
                                        "onclick": null,
                                        "showDuration": "300",
                                        "hideDuration": "1000",
                                        "timeOut": "5000",
                                        "extendedTimeOut": "1000",
                                        "showEasing": "swing",
                                        "hideEasing": "linear",
                                        "showMethod": "fadeIn",
                                        "hideMethod": "fadeOut"
                                   }
                              } else {
                                   toastr["error"](data.message);

                                   toastr.options = {
                                        "closeButton": true,
                                        "debug": false,
                                        "newestOnTop": false,
                                        "progressBar": true,
                                        "positionClass": "toast-top-right",
                                        "preventDuplicates": false,
                                        "onclick": null,
                                        "showDuration": "300",
                                        "hideDuration": "1000",
                                        "timeOut": "5000",
                                        "extendedTimeOut": "1000",
                                        "showEasing": "swing",
                                        "hideEasing": "linear",
                                        "showMethod": "fadeIn",
                                        "hideMethod": "fadeOut"
                                   }
                              }
                              location.reload();
                         }
                    });
               }
          });
     </script>
</body>

</html>