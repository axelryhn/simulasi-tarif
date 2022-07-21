<div class="content-wrapper">
    <div class="row">
        <?php if ($this->session->flashdata('msg_alert')) { ?>
            <div class="alert alert-info">
                <label style="font-size: 13px;"><?= $this->session->flashdata('msg_alert'); ?></label>
            </div>
        <?php } ?>
        <?php echo form_open_multipart('Inbox/fungsiTambah'); ?>
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" value="<?= $user_name; ?>" placeholder="Nama Lengkap" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Status</label>
                    <div class="form-group col-md-6">
                        <select id="status" name="status">
                            <option value="Saran Masuk Prioritas">Prioritas</option>
                            <option value="Saran Masuk Non Prioritas ">Non Prioritas</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Keterangan</label>
                <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="Tulis keterangan..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?= form_close(); ?>
    </div>
</div>