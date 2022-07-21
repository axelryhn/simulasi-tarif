<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h3><?= $title_page; ?></h3>
            <!-- Button trigger modal -->
            <!-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah data
            </button> -->
            <br>
            <?php $CI = &get_instance();
            if ($this->session->flashdata('msg_alert')) { ?>

                <div class="alert alert-info">
                    <label style="font-size: 13px;"><?= $this->session->flashdata('msg_alert'); ?></label>
                </div>
            <?php } ?>
            <div class="table-responsive">
                <p>

                <table id="example" class="data table table-bordered table-striped" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>

                            <th>Nama</th>

                            <th>Keterangan</th>
                            <th>Status</th>

                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (is_array($queryAllInb)) { ?>
                            <?php
                            $no = 1; ?>

                            <?php foreach ($queryAllInb as $row) : ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row->nama ?></td>
                                    <td><?php echo $row->keterangan ?></td>
                                    <td><?php echo $row->status ?></td>

                                    <td>
                                        <a href="<?php echo base_url('/Inbox/halaman_edit') ?>/<?php echo $row->id ?>" class="btn btn-sm btn-warning"><i class="fa fa-cancel">Edit</i></a>
                                        <!-- <a class="btn btn-sm btn-info" title="detail"><i class="fa fa-edit" data-bs-toggle="modal" data-bs-target="#exampleModal1">Edit</i></a> -->
                                        <a href="<?php echo base_url('/Inbox/fungsiDelete') ?>/<?php echo $row->id ?>" class="btn btn-sm btn-danger" title="edit"><i class="fa fa-cancel">Delete</i></a>
                                    </td>
                                </tr>


                            <?php endforeach ?>
                        <?php } else { ?>
                            <td colspan="7" align="center"><strong>Data Kosong</strong></td>
                        <?php } ?>

                    </tbody>
                </table>

                </p>
            </div>
        </div>
    </div>
</div>