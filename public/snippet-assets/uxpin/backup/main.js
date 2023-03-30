/********************************************
* Confirm delete
********************************************/
function confirmDelete(id){
    $(id).next('tr').removeClass('d-none'); 
    $(id).addClass('d-none');
}



$(function(){   
    /********************************************
    * Checkbox
    ********************************************/
    $(".uxpin .input--toggle").click(function(e){
        $(e.currentTarget).closest("fieldset").find("input:checkbox").prop('checked', $(this).prop('checked'));
    })


    /********************************************
    * Cancel delete
    ********************************************/
    $(".table-in-table-warning .uxpin.button--cancel-sm").click(function(e){
        $(e.currentTarget).closest('tr').addClass('d-none');
        $(e.currentTarget).closest('tr').prev('tr').removeClass('d-none');
    })

    
    /********************************************
    * Select2 Normal
    ********************************************/
    $('.select2').select2({
        width: '100%'
    })
    $('.text-input-sm-group.select2').each(function(){
        var selected = $(this).find("[data-select2-id]").length;
        if(selected > 0){
            $(this).find("[data-select2-id]").val().length > 0 && $(this).parent().find("label").addClass("active")
        }
    })

    
    /********************************************
    * Select2 Click Event when Changed
    ********************************************/
    $('.select2').on('change', function (e) {
        var selected = $(e.currentTarget).find("[data-select2-id]").length;
        if(selected > 0){
            $(e.currentTarget).parent().find('.select2-container').addClass("active");
            $(e.currentTarget).parent().find('label').addClass("active");
        }
        else{
            $(e.currentTarget).parent().find('.select2-container').removeClass("active");
            $(e.currentTarget).parent().find('label').removeClass("active");
        }
        e.preventDefault();
    });

    /********************************************
    * Reset Date
    ********************************************/
    $('.reset-date').on('click', function(e){
        $(e.currentTarget).parent().find("select").prop("selectedIndex", 0);
    })


    /********************************************
    * Date Range Picker
    ********************************************/
    $('input[name="daterange"].daterange').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear',
            format: 'MMM DD, YYYY'
        }
    }).on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MMM DD, YYYY') + ' - ' + picker.endDate.format('MMM DD, YYYY'));
    }).on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

    /********************************************
    * Date Picker
    ********************************************/
   $('input[name="daterange"].date').daterangepicker({
        autoUpdateInput: false,
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        orientation: "auto",
        maxYear: parseInt(moment().format('YYYY'),10)
    }).on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MMM DD, YYYY'));
    })

    /********************************************
    * Toggle User Profile
    ********************************************/
    $('.snippetslib.avatar').on('click', function(e){
        var menu = $("#"+$(e.currentTarget).data("target"));
        menu.toggleClass("show");
        if(!$(e.currentTarget).has(".select2-container--open").length){
            $(e.currentTarget).removeClass("show");
        }
    });


    /********************************************
    * Toggle between Choose Facility
    ********************************************/
    $('#btn-show-frs-facility-type, #btn-show-frs-facility-building, #btn-show-frs-facility-both').on('click', function (e) {
        var target_form = "#" + $(e.currentTarget).data("target");
        $(".frs-choose-facility-form").hide();
        $(target_form ).show();
    });


    /********************************************
    * Facity accordion and modal
    ********************************************/
    $('.accordian-body').on('show.bs.collapse', function () {
        $(this).closest("table").find(".collapse.in").not(this).collapse('toggle')
    })


    /********************************************
    * Show Modal
    ********************************************/
    $('.openmodal').click(function(){
        if($(this).is(':checked')) {
            $('#alertConfict').modal('show');
        } else {
            $('#alertConfict').modal('hide');
        }
    });


    /********************************************
    * Toggle Table
    ********************************************/
   $("#period-selector input").click(function(){
        $(".toggle-form").addClass("d-none");
        $($(this).attr("data-target")).removeClass("d-none");
    });

    $(".bt-open").click(function(){
        $(".event-dt tr").removeClass("active");
        $($(this).attr("data-target")).addClass("active");
    });

    $(".btn-group.two .button--neutral").click(function(){
        $(".event-dt tr").removeClass("active");
    });


    /********************************************
    * DROPZONE
    ********************************************/
    $(".dropzone").dropzone({ url: $(".dropzone").attr("action") });


});

