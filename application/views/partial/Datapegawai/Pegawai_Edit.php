<div class="content-wrapper">

    <div class="card">
        <h3>Edit Data Pegawai</h3>
        <?php echo form_open_multipart('Datapegawai/fungsiEdit'); ?>
        <table>
            <tr>

                <td><input type="text" name="id" value="<?php echo $queryPgwDetail->id ?>" hidden></td>
            </tr>
            <tr>
                <td>Nipp</td>
                <td>:</td>
                <td><input type="text" name="nip" value="<?php echo $queryPgwDetail->nip ?>"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" value="<?php echo $queryPgwDetail->nama ?>"></td>
            </tr>
            <tr>
                <td>Umur</td>
                <td>:</td>
                <td><input type="text" name="umur" value="<?php echo $queryPgwDetail->umur ?>"></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><input type="text" name="kelas" value="<?php echo $queryPgwDetail->kelas ?>"></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>:</td>
                <td>
                    <select id="kategori" name="kategori" value="<?php echo $queryPgwDetail->kategori ?>">
                        <option value="Organik Pelindo">Organik Pelindo</option>
                        <option value="Organik PTP">Organik PTP</option>
                        <option value="TNO">TNO</option>
                        <option value="PKWT">PKWT</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Unit_Kerja</td>
                <td>:</td>
                <td><input type="text" name="unit_kerja" value="<?php echo $queryPgwDetail->unit_kerja ?>"></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><input type="text" name="jabatan" value="<?php echo $queryPgwDetail->jabatan ?>"></td>
            </tr>
            <tr>
                <td>Cabang</td>
                <td>:</td>
                <td>
                    <select id="cabang" name="cabang" value="<?php echo $queryPgwDetail->cabang ?>">
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
                <td>Status Pegawai</td>
                <td>:</td>
                <td>
                    <select id="status_pegawai" name="status_pegawai" value="<?php echo $queryPgwDetail->status_pegawai ?>">
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>CV </td>
                <td>:</td>
                <td><input type="file" name="dokumen" value="<?php echo $queryPgwDetail->dokumen ?>"></td>
            </tr>

            <tr>
                <td colspan="5"><br><button type="submit" class="btn btn-success center">Update </button></td>
            </tr>
        </table>
        <?= form_close(); ?>
    </div>

</div>