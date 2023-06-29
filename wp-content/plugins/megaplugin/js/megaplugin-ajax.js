jQuery(function($) {
    $('#stocks-filter-select').on('change', function() {
        var filterValue = $(this).val();

        $.ajax({
            url: megaplugin_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'stocks_filter',
                filter_value: filterValue
            },
            success: function(response) {
                $('#stocks-results-container').html(response.data);
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });
});
