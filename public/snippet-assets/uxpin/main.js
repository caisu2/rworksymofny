/********************************************
 * Confirm delete
 ********************************************/
function confirmDelete(id) {
    $(id).next('tr').removeClass('d-none');
    $(id).addClass('d-none');
}



$(function () {
    /********************************************
     * Checkbox
     ********************************************/
    $(".uxpin .input--toggle").click(function (e) {
        $(e.currentTarget).closest("fieldset").find("input:checkbox").prop('checked', $(this).prop('checked'));
    })


    /********************************************
     * Cancel delete
     ********************************************/
    $(".table-in-table-warning .uxpin.button--cancel-sm").click(function (e) {
        $(e.currentTarget).closest('tr').addClass('d-none');
        $(e.currentTarget).closest('tr').prev('tr').removeClass('d-none');
    })


    /********************************************
     * Select2 Normal
     ********************************************/
    $('.select2').select2({
        width: '100%'
    })
    // $('.text-input-sm-group.select2').each(function(){
    //     var selected = $(this).find("[data-select2-id]").val();
    //     console.log(selected);

    //     if(selected != ""){
    //         $(this).find("[data-select2-id]").val().length > 0 && $(this).parent().find("label").addClass("show") 
    //         $('.select2-container').addClass("show");
    //         $(this).parent().find("label").addClass("show");
    //     }
    // })


    /********************************************
     * Select2 Click Event when Changed
     ********************************************/
    $('.select2').on('change', function (e) {
        var selected = $(e.currentTarget).find("[data-select2-id]").length;
        if (selected > 0) {
            $(e.currentTarget).parent().find('.select2-container').addClass("active");
            $(e.currentTarget).parent().find('label').addClass("active");
        } else {
            $(e.currentTarget).parent().find('.select2-container').removeClass("active");
            $(e.currentTarget).parent().find('label').removeClass("active");
        }
        e.preventDefault();
    });

    /********************************************
     * Reset Date
     ********************************************/
    $('.reset-date').on('click', function (e) {
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
    }).on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('MMM DD, YYYY') + ' - ' + picker.endDate.format('MMM DD, YYYY'));
    }).on('cancel.daterangepicker', function (ev, picker) {
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
        maxYear: parseInt(moment().format('YYYY'), 10) + 5,
    }).on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('MMM DD, YYYY'));
    })

    /********************************************
     * Toggle User Profile
     ********************************************/
    $('.snippetslib.avatar').on('click', function (e) {
        var menu = $("#" + $(e.currentTarget).data("target"));
        menu.toggleClass("show");
        if (!$(e.currentTarget).has(".select2-container--open").length) {
            $(e.currentTarget).removeClass("show");
        }
    });


    /********************************************
     * Toggle between Choose Facility
     ********************************************/
    $('#btn-show-frs-facility-type, #btn-show-frs-facility-building, #btn-show-frs-facility-both').on('click', function (e) {
        var target_form = "#" + $(e.currentTarget).data("target");
        $(".frs-choose-facility-form").hide();
        $(target_form).show();
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
    $('.openmodal').click(function () {
        if ($(this).is(':checked')) {
            $('#alertConfict').modal('show');
        } else {
            $('#alertConfict').modal('hide');
        }
    });


    /********************************************
     * Toggle Table
     ********************************************/
    /*$("#period-selector input").click(function(){
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
     */


    /********************************************
     * DROPZONE
     ********************************************/
    if ($(".dropzone").length) {
        $(".dropzone").dropzone({
            url: $(".dropzone").attr("action")
        });
    }

    /********************************************
     * NEW TIMEPICKER
     ********************************************/
    $('.timepickers').timepicker();

    /********************************************
     * MODAL POPUP
     ********************************************/
    $(".overlay").hide();

    $(".open-modal").click(function (om) {
        om.preventDefault();
        $(".overlay").show();
    });
    $(".close-modal").click(function (cm) {
        cm.preventDefault();
        $(".overlay").hide();
    });

    /********************************************
     * Table Responsive
     ********************************************/
    //init
    /*if($("table.responsive")[0]){
        window.responsiveTables.init();
    }
    $("table.responsive td:first-child").click(function(){
        $("table.responsive tr").removeClass("active");
        $(this).parent().addClass("active");
    });
*/
    /*$( document ).ready( function() {
          window.responsiveTables.init();
      } );*/
    $("table.responsive td:first-child").click(function () {
        $("table.responsive tr").removeClass("active");
        $(this).parent().addClass("active");
    });

    /*--- MASK CURRENCY ---*/
    $("input[data-type='currency']").on({
        keyup: function () {
            formatCurrency($(this));
            if ($(this).val()) {
                $(this).addClass('valid');
            } else {
                $(this).removeClass('valid');
            }
        },
        blur: function () {
            formatCurrency($(this), "blur");
        }
    });


    function formatNumber(n) {
        // format number 1000000 to 1,234,567
        return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    }

    function formatCurrency(input, blur) {
        // appends $ to value, validates decimal side
        // and puts cursor back in right position.

        // get input value
        var input_val = input.val();

        // don't validate empty input
        if (input_val === "") {
            return;
        }

        // original length
        var original_len = input_val.length;

        // initial caret position 
        var caret_pos = input.prop("selectionStart");

        // check for decimal
        if (input_val.indexOf(".") >= 0) {
            // get position of first decimal
            // this prevents multiple decimals from
            // being entered
            var decimal_pos = input_val.indexOf(".");

            // split number by decimal point
            var left_side = input_val.substring(0, decimal_pos);
            var right_side = input_val.substring(decimal_pos);

            // add commas to left side of number
            left_side = formatNumber(left_side);

            // validate right side
            right_side = formatNumber(right_side);

            // On blur make sure 2 numbers after decimal
            if (blur === "blur") {
                right_side += "00";
            }

            // Limit decimal to only 2 digits
            right_side = right_side.substring(0, 2);

            // join number by .
            input_val = left_side + "." + right_side;

        } else {
            // no decimal entered
            // add commas to number
            // remove all non-digits
            input_val = formatNumber(input_val);
            input_val = input_val;

            // final formatting
            if (blur === "blur") {
                input_val += ".00";
            }
        }

        // send updated string to input
        input.val(input_val);

        // put caret back in the right position
        var updated_len = input_val.length;
        caret_pos = updated_len - original_len + caret_pos;
        input[0].setSelectionRange(caret_pos, caret_pos);
    }

    /*--- END MASK CURRENCY ---*/

});
// EW DROPZONE
$(document).bind('dragover', function (e) {
    var dropZone = $('.ew-dropzone'),
        timeout = window.dropZoneTimeout;
    if (!timeout) {
        dropZone.addClass('in');
    } else {
        clearTimeout(timeout);
    }
    var found = false,
        node = e.target;
    do {
        if (node === dropZone[0]) {
            found = true;
            break;
        }
        node = node.parentNode;
    } while (node != null);
    if (found) {
        dropZone.addClass('hover');
    } else {
        dropZone.removeClass('hover');
    }
    window.dropZoneTimeout = setTimeout(function () {
        window.dropZoneTimeout = null;
        dropZone.removeClass('in hover');
    }, 100);
});