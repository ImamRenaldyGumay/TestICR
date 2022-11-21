<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Employee</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <a href="<?= base_url('tambahCustomer') ?>" class="btn btn-primary col-12 mt-3" data-toggle="modal" data-target="#exampleModal">Tambah <?= $title ?></a>
    <!-- <button type="button" class="btn btn-primary col-12 mt-3" data-toggle="modal" data-target="#TDF">
      tambah
    </button> -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with minimal features & hover style</h3>
            </div>
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Employee ID</th>
                    <th>Last Name</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($order as $o) : ?>
                    <tr>
                      <td><?= $o['EmployeeID'] ?></td>
                      <td><?= $o['LastName'] ?></td>
                      <td>
                        <a href="<?= base_url('Admin/EditDataEmployee/' . $o['EmployeeID']) ?>" class="btn btn-warning">Edit</a>
                        <a href="<?= base_url('Admin/HapusEmployee/' . $o['EmployeeID']) ?>" class="btn btn-danger btn-action" onclick="confirm('Yakin?')">Delete</a>
                        <!-- <a href="<?= base_url('EditEmployee') ?>" class="btn btn-warning btn-action">Edit</a> -->
                        <!-- <a href="" class="btn btn-danger btn-action">Delete</a> -->
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Modal -->
<div class="modal fade" id="TDF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah <?= $title ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('tambahEmployee') ?>" method="POST">
        <div class="modal-body">
          <?php ?>
          <div class="form-group">
            <label for="EmployeeID">Employee ID</label>
            <input type="text" class="form-control" id="EmployeeID" name="EmployeeID">
          </div>
          <div class="form-group">
            <label for="LastName">Last Name</label>
            <input type="text" class="form-control" id="LastName" name="LastName">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal -->
<!-- Modal -->
<div class="modal fade" id="EE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit <?= $title ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('editEmployee') ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="EmployeeID">Employee ID</label>
            <input type="text" class="form-control" id="EmployeeID" name="EmployeeID">
          </div>
          <div class="form-group">
            <label for="LastName">Last Name</label>
            <input type="text" class="form-control" id="LastName" name="LastName">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal -->