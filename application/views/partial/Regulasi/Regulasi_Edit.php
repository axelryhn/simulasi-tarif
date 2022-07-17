<div class="content-wrapper">

    <div class="card">
        <h3>Edit Regulasi</h3>
        <?php echo form_open_multipart('Regulasi/fungsiEdit'); ?>
        <table>
            <tr>

                <td><input type="text" name="id" value="<?php echo $queryRglDetail->id ?>" hidden></td>
            </tr>

            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" value="<?php echo $queryRglDetail->nama ?>"></td>
            </tr>
            <tr>
                <td>Kering</td>
                <td>:</td>
                <td><input type="text" name="kering" value="<?php echo $queryRglDetail->kering ?>"></td>
            </tr>
            <tr>
                <td>Cair</td>
                <td>:</td>
                <td><input type="text" name="cair" value="<?php echo $queryRglDetail->cair ?>"></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>:</td>
                <td><input type="text" name="keterangan" value="<?php echo $queryRglDetail->keterangan ?>"></td>
            </tr>

            <tr>
                <td colspan="5"><br><button type="submit" class="btn btn-success center">Update </button></td>
            </tr>
        </table>
        <?= form_close(); ?>
    </div>

</div>