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
                                    <td><?php echo number_format($row->value, 2, ',', '.') ?></td>
                                    <td><?php echo $row->timestamp ?></td>
                                    <td>

                                        <?php
                                        $dataArray = json_decode($row->aktivitas);

                                        foreach ($dataArray as $item) :
                                            echo "<div>" . $item->nama . " = " . $item->value . "</div>";
                                        endforeach
                                        ?>

                                    </td>
                                    <td><?php
                                        $nama = $CI->getNama($row->id_user);
                                        echo $nama ?>
                                    </td>
                                </tr>


                            <?php endforeach ?>
                        <?php } else { ?>
                            <td colspan="7" align="center"><strong>Data Kosong</strong></td>
                        <?php } ?>




                    </tbody>
                </table> <br>
                <div class="card">
                    <div class="card-header">
                        <h5>Summary</h5>
                    </div>
                    <div class="card-body">

                        <?php
                        $dataTotal = $CI->getTotal();
                        echo "total Cair = " . $dataTotal['totalCair'];
                        echo "<br>";
                        echo "total Kering =" . $dataTotal['totalKering'];
                        echo "<br>";
                        echo "total Value Cair = Rp " . number_format($dataTotal['totalValueCair'], 2, ',', '.');
                        echo "<br>";
                        echo "total Value Kering = Rp " . number_format($dataTotal['totalValueKering'], 2, ',', '.');
                        ?>
                    </div>
                </div>
                </p>
            </div>
        </div>
    </div>
</div>