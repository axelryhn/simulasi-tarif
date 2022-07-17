<div class="content-wrapper">
    <div class="card">
        <?php
        $CI = &get_instance();
        $hasilnoFormat = 0;
        if (isset($_POST['hitung'])) {
            $isLanjut = 0;
            $operasi = $_POST['operasi'];
            foreach ($queryAllRgl as $row) :
                if (is_numeric($_POST['data_' . $row->id]) == FALSE) {
                    ++$isLanjut;
                }
            endforeach;
            $hasil = 0;

            if ($isLanjut == 0) {
                switch ($operasi) {
                    case 'kering':
                        $total = 0;
                        foreach ($queryAllRgl as $row) :
                            $total +=  ($_POST['data_' . $row->id] * $row->kering);
                        endforeach;
                        $total += 6000;
                        $hasilnoFormat = $total;
                        $hasil = number_format($total, 2, ',', '.');
                        break;
                    case 'cair':

                        $total = 0;
                        foreach ($queryAllRgl as $row) :
                            $total +=  ($_POST['data_' . $row->id] * $row->cair);
                        endforeach;
                        $total += 6000;
                        $hasilnoFormat = $total;
                        $hasil = number_format($total, 2, ',', '.');
                        break;
                }
                $datas = array();
                foreach ($queryAllRgl as $row) :
                    $nama = $row->nama;
                    $value = $_POST['data_' . $row->id];
                    $a = array("nama" => $nama, "value" => $value);
                    array_push($datas, $a);
                endforeach;
                $CI->simpanReport($operasi, $hasilnoFormat, json_encode($datas));
            } else {
                $hasil = 0;
            }

            // $controller->simpanReport($operasi, $hasil, json_encode($datas));
        }

        ?>
        <div class="Simulasi Tarif">

            <form class="col-12 col-md-9 pl-5 pr-5" method="post" action="index">
                <h1 class="display-3 mb-3 text-left">Simulasi Tarif</h1>

                <?php if (is_array($queryAllRgl)) {
                    foreach ($queryAllRgl as $row) :
                ?>
                        <div class="form-group">
                            <label for="kontainer">Jumlah <?php echo $row->nama; ?> <em><?php echo $row->keterangan; ?></em> </label>
                            <input type="number" class="form-control" id="<?php echo "data_" . $row->id; ?>" name="<?php echo "data_" . $row->id; ?>" placeholder="Contoh: 15">
                        </div>
                    <?php endforeach ?>
                <?php } ?>
                <!-- 
                <div class="form-group">
                    <label for="ukuran">Ukuran <em>(Ton) (Kering: Rp.5.000.000/Ton)(Cair: Rp.4.000.000/Ton)</em> </label>
                    <input type="number" class="form-control" id="ukuran" name="ukuran" placeholder="Contoh: 120 Ton">
                </div>

                <div class="form-group">
                    <label for="durasi">Durasi Penginapan<em>(Per Malam)(Kering: Rp.500.000/Malam)(Cair: Rp.500.000/Malam)</em> </label>
                    <input type="number" class="form-control" id="durasi" name="durasi" placeholder="Contoh: 1 Malam">
                </div> -->


                <div class="form-group">
                    <label for="jenis">Jenis</label>
                    <select class="form-control" name="operasi">
                        <option value="kering">Kering</option>
                        <option value="cair">Cair</option>
                    </select>
                </div>

                <p>*Biaya Administrasi : Rp.6.000</p>

                <div class="form-group">
                    <input type="submit" name="hitung" value="Hitung">
                </div>
            </form><br>


            <?php if (isset($_POST['hitung'])) { ?>
                <div class="form-group" style="text-align:center ;">
                    <p>Rp. <input type="text" value="<?php echo $hasil; ?>" style="text-align:center ;">
                    </p>
                </div>

            <?php } else { ?>
                <div class="form-group" style="text-align:center ;">
                    <p>Rp. <input type="text" value="0" style="text-align:center ;"> </p>
                </div>
            <?php } ?>


        </div>
    </div>
</div>