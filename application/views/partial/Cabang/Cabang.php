<div class="content-wrapper">
    <h3>Data Cabang</h3>

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
                    <?php echo form_open_multipart('Cabang/fungsiTambah'); ?>

                    <input type="hidden" name="id" />
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Cabang</label>
                        <div class="col-sm-10">
                            <select id="cabang" name="cabang">
                                <option value="Pusat">Pusat</option>
                                <option value="Tanjung Priok">Tanjung Priok</option>
                                <option value="Teluk Bayur">Teluk Bayur</option>
                                <option value="Palembang">Palembang</option>
                                <option value="Jambi">Jambi</option>
                                <option value="Panjang">Panjang</option>
                                <option value="Bengkulu">Bengkulu</option>
                                <option value="Pangkal Balam">Pangkal Balam</option>
                                <option value="Pontianak">Pontianak</option>
                                <option value="Banten">Banten</option>
                                <option value="Cirebon">Cirebon</option>
                                <option value="Sunda Kelapa">Sunda Kelapa</option>

                            </select>
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Jumlah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jumlah" name="jumlah">
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
                        <th>Cabang</th>
                        
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (is_array($queryAllCbg)) { ?>
                        <?php
                        $no = 1; ?>

                        <?php foreach ($queryAllCbg as $row) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row->cabang ?></td>
                                
                                <td><?php echo $row->jumlah ?></td>

                                <td>
                                    <a href="<?php echo base_url('/Cabang/halaman_edit') ?>/<?php echo $row->id ?>" class="btn btn-sm btn-warning"><i class="fa fa-cancel">Edit</i></a>
                                    <a href="<?php echo base_url('/Cabang/fungsiDelete') ?>/<?php echo $row->id ?>" class="btn btn-sm btn-danger" title="edit"><i class="fa fa-cancel">Delete</i></a>
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