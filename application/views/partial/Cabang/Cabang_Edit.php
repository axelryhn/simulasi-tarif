<div class="content-wrapper">

    <div class="card">
        <h3>Edit Data Cabang</h3>
        <?php echo form_open_multipart('Cabang/fungsiEdit'); ?>
        <table>
            <tr>

                <td><input type="text" name="id" value="<?php echo $queryCbgDetail->id ?>" hidden></td>
            </tr>
            <tr>
                <td>Cabang</td>
                <td>:</td>
                <td>
                    <select id="cabang" name="cabang" value="<?php echo $queryCbgDetail->cabang ?>">
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
                </td>
            </tr>
            
            <tr>
                <td>Jumlah</td>
                <td>:</td>
                <td><input type="text" name="jumlah" value="<?php echo $queryCbgDetail->jumlah ?>"></td>
            </tr>






            <tr>
                <td colspan="5"><br><button type="submit" class="btn btn-success center">Update </button></td>
            </tr>
        </table>
        <?= form_close(); ?>
    </div>

</div>