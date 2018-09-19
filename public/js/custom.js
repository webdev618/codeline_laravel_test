
jQuery(function($) {

    // init datetime picker
    $('.datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss'
    });

    // init select2
    $('.select2').select2({
        'theme': 'bootstrap4'
    });

    // configure slug
    $('.film-name').stringToSlug({
        getPut: '.film-slug'
    });

//    $('.film-name').change(function() {
//        var name = $(this).val();
//        $('.film-slug').val(name);
//    });
});