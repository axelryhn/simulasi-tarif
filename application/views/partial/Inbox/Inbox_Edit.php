<div class="content-wrapper">

    <div class="card">
        <h3>Edit Data Status</h3>
        <?php echo form_open_multipart('Inbox/fungsiEdit'); ?>
        <table>
            <tr>

                <td><input type="text" name="id" value="<?php echo $queryInbDetail->id ?>" hidden></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" value="<?php echo $queryInbDetail->nama ?>"></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td>
                    <select id="status" name="status" value="<?php echo $queryInbDetail->status ?>">

                        <option value="Proses">Proses</option>
                        <option value="Selesai">Selesai</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>:</td>
                <td>
                    <input type="text" name="keterangan" value="<?php echo $queryInbDetail->keterangan ?>">
                </td>
            </tr>

            <tr>
                <td colspan="5"><br><button type="submit" class="btn btn-success center">Update </button></td>
            </tr>
        </table>
        <?= form_close(); ?>
    </div>

</div>