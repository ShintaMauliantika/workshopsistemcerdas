</div>
</body>
<style>
  thead th{
    font-size:12px!important;
  }
</style>
<!--   Core JS Files   -->
<script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="./assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script>
    $(function(){
        $("#data").keyup(function(){
            // apigetCluster.php?paperId=1
            $.get( "apigetCluster.php?dataId="+$(this).val(), function( data ) {
            // $( ".result" ).html( data );
            // alert( "Load was performed." );
            var d = JSON.parse(data);
            // console.log(d);
            console.log(d.age);
            $("#anaemia").val(d.anaemia);
            $("#creatinine_phosphokinase").val(d.creatinine_phosphokinase);
            $("#diabetes").val(d.diabetes);
            $("#ejection_fraction").val(d.ejection_fraction);
            $("#high_blood_pressure").val(d.high_blood_pressure);
            $("#platelets").val(d.platelets);
            $("#serum_creatinine").val(d.serum_creatinine);
            $("#serum_sodium").val(d.serum_sodium);
            $("#sex").val(d.sex);
            $("#smoking").val(d.smoking);
            $("#time").val(d.time);
            // $("#abstract").val(d.abstract);
            // console.log(d['title']);
            });
        })
    })
</script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chartist JS -->
<script src="./assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="./assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="./assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>