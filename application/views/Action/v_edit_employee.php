<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Employee</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->

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
            <form action="<?= base_url('EditDataEmployee/') ?>" method="POST">
              <div class="card-body ">
                <div class="form-group">
                  <label for="EmployeeID">Employee ID</label>
                  <input name="EmployeeID" id="EmployeeID" type="text" class="form-control" value="<?= $ubah['EmployeeID'] ?>" readonly='readonly'>
                </div>
                <div class="form-group">
                  <label for="LastName">Last Name</label>
                  <input type="text" class="form-control" id="LastName" name="LastName" value="<?= $ubah['LastName'] ?>">
                  <?= form_error('nama_fakultas', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>
              <div class="card-footer justify-content-between">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Edit</button>
                <a href="<?= base_url('DataEmployee') ?>" class="btn btn-default">Kembali</a>
              </div>
            </form>

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