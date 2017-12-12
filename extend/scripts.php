</main>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>
<script type="text/javascript" src="../js/base.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.1/sweetalert2.all.min.js"></script>

<script>
    $(".button-collapse").sideNav();
    $('select').material_select();
    $('.parallax').parallax(); 

    $(document).ready(function(){
        $('#parallax').parallax(); 
    });

    

    $('.datepicker').pickadate({
    monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    weekdaysFull: ['Domigo', 'Lunes', 'Marte', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
    weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mier', 'Jue', 'Vie', 'Sab'],
    labelMonthNext: 'Siguiente Mes',
    labelMonthPrev: 'Mes Previo',
    labelMonthSelect: 'Selecciona un mes',
    labelYearSelect: 'Selecciona un año',
    format: 'yyyy-mm-dd',
    formatSubmit: 'yyyy-mm-dd', //formato para MYSQL    
    min: true, //-100 ANIOS HASTA HOY
    selectMonths: true, // Dropdown para el MES
    selectYears: 1, // Anios
    today: 'Hoy',
    clear: 'Reestablecer',
    close: 'Ok',
    closeOnSelect: true // cerrar al seleccionar
    });

        
</script>
