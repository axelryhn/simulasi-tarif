<div class="content-wrapper">

    <div class="card">
        <h3>Edit Data Ebook</h3>
        <?php echo form_open_multipart('Ebook/fungsiEdit'); ?>
        <table>
            <tr>

                <td><input type="text" name="id" value="<?php echo $queryEbkDetail->id ?>" hidden></td>
            </tr>
            <tr>
                <td>Judul</td>
                <td>:</td>
                <td><input type="text" name="judul" value="<?php echo $queryEbkDetail->judul ?>"></td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td>:</td>
                <td><input type="text" name="tahun" value="<?php echo $queryEbkDetail->tahun ?>"></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>:</td>
                <td><input type="text" name="kategori" value="<?php echo $queryEbkDetail->kategori ?>"></td>
            </tr>
            <tr>
                <td>File </td>
                <td>:</td>
                <td><input type="file" name="file" value="<?php echo $queryEbkDetail->file ?>"></td>
            </tr>

            <tr>
                <td colspan="5"><br><button type="submit" class="btn btn-success center">Update </button></td>
            </tr>
        </table>
        <?= form_close(); ?>
    </div>

</div>