jQuery(function ($) {
    $("#fans-table").DataTable({
        "searching": true,
        "paging": true,
        "info": false,
        "ordering": true,
        "columnDefs": [
            { "orderable": false, "targets": [-1] },
        ],
        "oLanguage": {
            "sUrl": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
        }

    });
});