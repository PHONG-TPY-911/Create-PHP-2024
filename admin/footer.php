  <!-- End Page-content -->
  <footer class="footer">
      <div class="container-fluid">
          <div class="row">
              <div class="col-sm-6">
                  <script>
                      document.write(new Date().getFullYear())
                  </script> &copy; Team kin beer keng
              </div>
              <div class="col-sm-6">
                  <div class="text-sm-end d-none d-sm-block">
                      Develop with <i class="mdi mdi-heart text-danger"></i> by <a href="https://Themesbrand.com/" target="_blank" class="text-reset">Team saiy ty</a>
                  </div>
              </div>
          </div>
      </div>
  </footer>
  </div>
  <!-- end main content-->

  </div>
  <!-- END layout-wrapper -->

  <!-- Right Sidebar -->
  <a href="#" id="right-bar-toggle">
      <!-- <i class="icon-sm mb-2" data-feather="settings"></i> <span class="align-middle">Settings</span> -->
  </a>

  <div class="right-bar">
      <div data-simplebar class="h-100">
          <div class="rightbar-title d-flex align-items-center bg-primary p-3">

              <a href="javascript:void(0);" class="right-bar-toggle-close ms-auto">
                  <i class="mdi mdi-close noti-icon"></i>
              </a>
          </div>
          <div class="p-4">
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="layout-width" id="layout-width-boxed" value="boxed" onchange="document.body.setAttribute('data-layout-size', 'boxed')">
              </div>
              <div id="sidebar-setting">
              </div>
          </div>
      </div>
  </div>


  <!-- start sweetalert2 -->

  <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/libs/metismenujs/metismenujs.min.js"></script>
  <script src="assets/libs/simplebar/simplebar.min.js"></script>
  <script src="assets/libs/feather-icons/feather.min.js"></script>

  <!-- apexcharts -->
  <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
  <!-- Chart JS -->
  <script src="assets/js/pages/chartjs.js"></script>

  <script src="assets/js/pages/dashboard.init.js"></script>

  <script src="assets/js/app.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- start sweetalert2 -->

  <!-- JavaScript Bundle with Popper -->
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <!-- JavaScript Bundle with Popper -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>


  <script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
          $('#myTable').DataTable({
              "aaSorting": [
                  [0, 'desc']
              ],
              "oLanguage": {
                  "sLengthMenu": "ສະແດງ _MENU_ ແຖວ ຕໍ່ໜ້າ",
                  "sZeroRecords": "ບໍ່ພົບຂໍ້ມູນຄົ້ນຫາ",
                  "sInfo": "ສະແດງ _START_ ເຖິງ _END_ ຂອງ _TOTAL_ ແຖວ",
                  "sInfoEmpty": "ສະແດງ 0 ເຖິງ 0 ຂອງ 0 ແຖວ",
                  "sInfoFiltered": "(ຈາກບັນທຶກທັງໝົດ _MAX_ ບັນທຶກ)",
                  "sSearch": "ຄົ້ນຫາ : ",
                  "oPaginate": {
                      "sFirst": "ໜ້າຫຼັກ",
                      "sPrevious": "ກ່ອນໜ້ານີ້",
                      "sNext": "ຕໍ່ໄປ",
                      "sLast": "ໜ້າສຸດທ້າຍ"
                  },
              }
          });
      });
  </script>

  </body>

  </html>