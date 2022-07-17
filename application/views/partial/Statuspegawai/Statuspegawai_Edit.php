<div class="content-wrapper">

    <div class="card">
        <h3>Edit Data Status Pegawai</h3>
        <?php echo form_open_multipart('Statuspegawai/fungsiEdit'); ?>
        <table>
            <tr>

                <td><input type="text" name="id" value="<?php echo $queryStsDetail->id ?>" hidden></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td>
                    <select id="status" name="status" value="<?php echo $queryStsDetail->status ?>">
                        <option value="Organik Pelindo">Organik Pelindo</option>
                        <option value="Organik PTP">Organik PTP</option>
                        <option value="TNO">TNO</option>
                        <option value="PKWT">PKWT</option>

                    </select>
                </td>
            </tr>
            
            <tr>
                <td>Total</td>
                <td>:</td>
                <td><input type="text" name="total" value="<?php echo $queryStsDetail->total ?>"></td>
            </tr>






            <tr>
                <td colspan="5"><br><button type="submit" class="btn btn-success center">Update </button></td>
            </tr>
        </table>
        <?= form_close(); ?>
    </div>

</div>