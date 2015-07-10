/* ============================================================
 * DataTables
 * Generate advanced tables with sorting, export options using
 * jQuery DataTables plugin
 * For DEMO purposes only. Extract what you need.
 * ============================================================ */
(function($) {

    'use strict';

    var responsiveHelper = undefined;
    var breakpointDefinition = {
        tablet: 1024,
        phone: 480
    };


    // Initialize datatable showing a search box at the top right corner
    var initTableWithSearch = function() {

        var table = $('#tableWithSearch');

        var settings = {
            "sDom": "<'table-responsive't><'row'<p i>>",
            "sPaginationType": "bootstrap",
            "destroy": true,
            "scrollCollapse": true,
            "oLanguage": {
                "sLengthMenu": "_MENU_ ",
                "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
            },
            columnDefs: [
                {"targets": [6,7], "orderable": false}
            ],
            order: [[0, "desc"]],
            "iDisplayLength": 10
        };

        table.dataTable(settings);

        // search box for table
        $('#search-table').keyup(function() {
            table.fnFilter($(this).val());
        });

    }

    $('#tableWithSearch').on( 'draw.dt', function () {
        $('#tableWithSearch').find('.applicant_toolbar').each(function(i,item) {
            $(item).hide();
        });
    } );

    jQuery('#tableWithSearch tr').mouseover(function(e) {
        var tr = $(e.currentTarget);
        tr.find('p').addClass('text-primary bold');
        var toolBar = tr.find('.applicant_toolbar');
        toolBar.show();
    });

    jQuery('#tableWithSearch tr').mouseout(function(e) {
        var tr = $(e.currentTarget);
        tr.find('p').removeClass('text-primary bold');
        var toolBar = tr.find('.applicant_toolbar');
        toolBar.hide();
    });

    initTableWithSearch();

})(window.jQuery);