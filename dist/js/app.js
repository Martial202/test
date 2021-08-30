$(function () {
    /* $('#myTable').DataTable();*/
    
    btn_dates();
    Btn_listeApproUneDate();
    Btn_listeApproDeuxDates();
    function btn_dates() {
        $('body').on('click', '.onClickBtn1', function () {
            $('.bloc1').toggle(500);
            $('#bloc2').hide(500);
            $('#liste_appro').html("");
            $('#date').val("")
        });
        $('body').on('click', '.onClickBtn2', function () {
            $('#bloc2').toggle(500);
            $('.bloc1').hide(500);
            $('#liste_appro').html("");
            $('#date1').val("");
            $('#date2').val("");
        });
    }
    function listeApproUneDate(date) {
        $.ajax({
            url: 'includes/rooter.php',
            method: 'POST',
            data: {onClickDate1: 1, date: date},
            success: function (retour) {
                $('#liste_appro').html(retour);
            }
        });
    }
    function listeApproDeuxDates(d1,d2) {
        $.ajax({
            url: 'includes/rooter.php',
            method: 'POST',
            data: {onClickDate2: 1, d1:d1,d2:d2},
            success: function (retour) {
                $('#liste_appro').html(retour);
            }
        });
    }
    function Btn_listeApproUneDate() {
        $('body').on('change', '#date', function () {
            if ($(this).val() == "") {
                $('#liste_appro').html('<strong class="text-danger">Veuillez choisir une date</strong>');
            } else {
                listeApproUneDate($(this).val());
            }
        });
    }
    
    function Btn_listeApproDeuxDates() {
        $('body').on('change', '#date1', function () {
            if ( $('#date1').val() == "" || $('#date2').val() == "") {
                $('#liste_appro').html('<strong class="text-danger">Veuillez choisir une date de début et une date de fin</strong>');
            } else {
                listeApproDeuxDates($('#date1').val(),$('#date2').val());
            }
        });
        $('body').on('change', '#date2', function () {
            if ( $('#date1').val() == "" || $('#date2').val() == "") {
                $('#liste_appro').html('<strong class="text-danger">Veuillez choisir une date de début et une date de fin</strong>');
            } else {
                listeApproDeuxDates($('#date1').val(),$('#date2').val());
            }
        });
    }
});


