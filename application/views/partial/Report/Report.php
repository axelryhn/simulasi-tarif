<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h3><?= $title_page; ?></h3>
            <!-- Button trigger modal -->
            <!-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah data
            </button> -->
            <br>
            <?php if ($this->session->flashdata('msg_alert')) { ?>

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
                            <th>Jenis</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>Aktivitas</th>
                            <th>User</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (is_array($queryAllRpt)) { ?>
                            <?php
                            $no = 1; ?>

                            <?php foreach ($queryAllRpt as $row) : ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row->jenis ?></td>
                                    <td><?php echo $row->value ?></td>
                                    <td><?php echo $row->timestamp ?></td>
                                    <td><?php echo $row->aktivitas ?></td>
                                    <td><?php echo $row->id_user ?></td>
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