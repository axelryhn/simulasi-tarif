<div class="content-wrapper">
    <h3>Data Pegawai</h3>

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
                    <?php echo form_open_multipart('Datapegawai/fungsiTambah'); ?>

                    <input type="hidden" name="id" />
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">NIPP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nip" name="nip">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Umur</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="umur" name="umur">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Kelas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kelas" name="kelas">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Kategori</label>
                        <div class="col-sm-10">
                            <select id="kategori" name="kategori">
                                <option value="Organik Pelindo">Organik Pelindo</option>
                                <option value="Organik PTP">Organik PTP</option>
                                <option value="TNO">TNO</option>
                                <option value="PKWT">PKWT</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Unit Kerja</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="unit_kerja" name="unit_kerja">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Jabatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jabatan" name="jabatan">
                        </div>
                    </div>

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
                        <label class="control-label col-sm-2" for="pwd">Status Pegawai</label>
                        <div class="col-sm-10">
                            <select id="status_pegawai" name="status_pegawai">
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">CV</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="dokumen" name="dokumen">
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
                        <th>Nipp</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Kelas</th>
                        <th>Kategori</th>
                        <th>Unit_kerja</th>
                        <th>Jabatan</th>
                        <th>Cabang</th>
                        <th>Status Pegawai</th>
                        <th>CV</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (is_array($queryAllPgw)) { ?>
                        <?php
                        $no = 1; ?>

                        <?php foreach ($queryAllPgw as $row) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row->nip ?></td>
                                <td><?php echo $row->nama ?></td>
                                <td><?php echo $row->umur ?></td>
                                <td><?php echo $row->kelas ?></td>
                                <td><?php echo $row->kategori ?></td>
                                <td><?php echo $row->unit_kerja ?></td>
                                <td><?php echo $row->jabatan ?></td>
                                <td><?php echo $row->cabang ?></td>
                                <td><?php echo $row->status_pegawai ?></td>
                                <td><?php echo $row->dokumen ?></td>
                                <td>
                                    <a href="<?php echo base_url("/uploads/cv/$row->dokumen") ?>" class="btn btn-sm btn-primary" download><i class="fa fa-cancel">Download</i></a>
                                    <a href="<?php echo base_url('/Datapegawai/halaman_edit') ?>/<?php echo $row->id ?>" class="btn btn-sm btn-warning"><i class="fa fa-cancel">Edit</i></a>
                                    <!-- <a class="btn btn-sm btn-info" title="detail"><i class="fa fa-edit" data-bs-toggle="modal" data-bs-target="#exampleModal1">Edit</i></a> -->
                                    <a href="<?php echo base_url('/Datapegawai/fungsiDelete') ?>/<?php echo $row->id ?>" class="btn btn-sm btn-danger" title="edit"><i class="fa fa-cancel">Delete</i></a>
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