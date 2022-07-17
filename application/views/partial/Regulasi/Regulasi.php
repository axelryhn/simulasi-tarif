<div class="content-wrapper">
    <h3>Regulasi</h3>

    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah data
    </button><br>
    <?php if ($this->session->flashdata('msg_alert')) { ?>
        <div class="alert alert-info">
            <label style="font-size: 13px;"><?= $this->session->flashdata('msg_alert'); ?></label>
        </div>
    <?php } ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('Regulasi/fungsiTambah'); ?>

                    <input type="hidden" name="id" />
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nama">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="kering">Kering</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kering" name="kering">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="cair">Cair</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="cair" name="cair">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="keterangan">Keterangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="keterangan" name="keterangan">
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
                        <th>Nama</th>
                        <th>Kering</th>
                        <th>Cair</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (is_array($queryAllRgl)) { ?>
                        <?php
                        $no = 1; ?>

                        <?php foreach ($queryAllRgl as $row) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row->nama ?></td>
                                <td><?php echo $row->kering ?></td>
                                <td><?php echo $row->cair ?></td>
                                <td><?php echo $row->keterangan ?></td>
                                <td>
                                    <a href="<?php echo base_url('/Regulasi/halaman_edit') ?>/<?php echo $row->id ?>" class="btn btn-sm btn-warning"><i class="fa fa-cancel">Edit</i></a>
                                    <a href="<?php echo base_url('/Regulasi/fungsiDelete') ?>/<?php echo $row->id ?>" class="btn btn-sm btn-danger" title="edit"><i class="fa fa-cancel">Delete</i></a>
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