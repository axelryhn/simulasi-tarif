<div class="content-wrapper">


    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah data
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('Ebook/fungsiTambah'); ?>

                    <input type="hidden" name="id" />
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="judul" name="judul">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Tahun</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tahun" name="tahun">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Kategori</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kategori" name="kategori">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">File</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="file" name="file">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>

                <?= form_close(); ?>
            </div>

        </div>
    </div>


    <div class="table-responsive">
        <p>
        <div class="tabel">
            <table id="example" class="data table table-bordered table-striped" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Tahun</th>
                        <th>Kategori</th>
                        <th>File</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (is_array($queryAllEbk)) { ?>
                        <?php
                        $no = 1; ?>

                        <?php foreach ($queryAllEbk as $row) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row->judul ?></td>
                                <td><?php echo $row->tahun ?></td>
                                <td><?php echo $row->kategori ?></td>
                                <td><?php echo $row->file ?></td>
                                <td>
                                    <a href="<?php echo base_url("/uploads/ebook/$row->file") ?>" class="btn btn-sm btn-primary" download><i class="fa fa-cancel">Download</i></a>
                                    <a href="<?php echo base_url('/Ebook/halaman_edit') ?>/<?php echo $row->id ?>" class="btn btn-sm btn-warning"><i class="fa fa-cancel">Edit</i></a>
                                    <!-- <a class="btn btn-sm btn-info" title="detail"><i class="fa fa-edit" data-bs-toggle="modal" data-bs-target="#exampleModal1">Edit</i></a> -->
                                    <a href="<?php echo base_url('/Ebook/fungsiDelete') ?>/<?php echo $row->id ?>" class="btn btn-sm btn-danger" title="edit"><i class="fa fa-cancel">Delete</i></a>
                                </td>
                            </tr>


                        <?php endforeach ?>
                    <?php } else { ?>
                        <td colspan="7" align="center"><strong>Data Kosong</strong></td>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        </p>
    </div>
</div>