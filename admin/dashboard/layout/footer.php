<footer class="main-footer">
    <div class="container">
        <strong><center>Copyright &copy; 2016</center></strong>
    </div></div>
</footer>
</div><!-- wrapper -->

<!-- jQuery 2.1.4 -->
<script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.min.js"></script>
<script src="../../dist/js/docs.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo1.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
$(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
    });
});
</script>
<!-- Fancy Box -->
<script type="text/javascript" src="../../dist/fancybox/jquery.fancybox.pack.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $(".fancybox").fancybox()
});
</script>
<!-- summernote -->
<script src="../../dist/css/summernote.js"></script>
<script>
$(document).ready(function() {
    $('#summernote').summernote({
        height: 190,
        type: "POST",
        toolbar: [
            ['style', ['style']], // no style button
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            //['insert', ['picture', 'link']], // no insert buttons
            //['table', ['table']], // no table button
            ['help', ['help']] //no help button
        ]
    });
});
</script>

</body>

</html>
