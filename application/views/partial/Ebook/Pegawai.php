<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h3>Surat Edaran</h3>
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
                                            <!-- <a href="<?php echo base_url('/Ebook/halaman_edit') ?>/<?php echo $row->id ?>" class="btn btn-sm btn-warning"><i class="fa fa-cancel">Edit</i></a>
                                    <a href="<?php echo base_url('/Ebook/fungsiDelete') ?>/<?php echo $row->id ?>" class="btn btn-sm btn-danger" title="edit"><i class="fa fa-cancel">Delete</i></a> -->
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
    </div>

</div>