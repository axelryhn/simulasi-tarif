

function data_pegawai_index() {
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'data_master/pegawai_ajax',
        },
        columns: [{
            title: "No.",
            data: 'no'
        },
        {
            title: "Avatar",
            data: 'avatar'
        },
        {
            title: "Nama Lengkap",
            data: 'nama'
        },
        {
            title: "NIP",
            data: 'nip'
        },

        {
            title: "Tanggal Lahir",
            data: 'tanggal_lahir'
        },
        {
            title: "Jenis Kelamin",
            data: 'jenis_kelamin'
        },
        {
            title: "Unit Kerja",
            data: 'unit_kerja'
        },
        {
            title: "Status Pegawai",
            data: 'status_pegawai'
        },

        {
            title: "Action",
            data: 'id'
        }
        ],
        createdRow: function (row, data, index) {
            $('td', row).eq(0).html(index + 1);
            if (data['id']) {
                var id = data['id'],
                    html = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/edit/pegawai/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/delete/pegawai/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function data_admin_index() {
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'Dataadmin/admin_ajax',
        },
        columns: [{
            title: "No.",
            data: 'no'
        },
        {
            title: "Avatar",
            data: 'avatar'
        },
        {
            title: "Nama Lengkap",
            data: 'nama'
        },
        {
            title: "Type",
            data: 'id_role'
        },
        {
            title: "Nip",
            data: 'nip'
        },
        {
            title: "Action",
            data: 'id'
        }
        ],
        createdRow: function (row, data, index) {
            $('td', row).eq(0).html(index + 1);
            if (data['id']) {
                var id = data['id'],
                    html = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'Dataadmin/edit/admin/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'Dataadmin/delete/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}



$(document).ready(function () {
    switch (true) {
        case (window.location.href.indexOf('/Dataadmin') != -1):
            data_admin_index();
            break;
        case (window.location.href.indexOf('/data_master/jabatan') != -1):
            data_jabatan_index();
            break;
        case (window.location.href.indexOf('/data_master/bidang') != -1):
            data_bidang_index();
            break;
        case (window.location.href.indexOf('/data_master/pegawai') != -1):
            data_pegawai_index();
            break;
    }
});