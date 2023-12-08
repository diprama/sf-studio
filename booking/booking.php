<?php
include_once "library/inc.connection.php";
?>

<!-- Copyright @ 2018 PT. Rentas Media Indonesia (www.rentas.co.id) -->
<!-- Dilarang mengcopy , memperbanyak atau menggunakan source code ini dalam bentuk apapun tanpa izin tertulis dari PT. Rentas Media Indonesia. -->
<!DOCTYPE html>
<html lang="in" dir="ltr">
inputan datepicker/htmlnya:
<tr>
  <td width='200'>Tgl Pembuatan </td>
  <td><input type="text" class="form-control" name="tgl_pembuatan" id="tgl_pembuatan" placeholder="Tgl Pembuatan" value="<?php echo $tgl_pembuatan; ?>" /></td>
</tr>
////////////////////////////////////////////////////////////////////////////////

javascript :
<script src="<?php echo ('assets/js/vendors/jquery-1.11.2.min.js') ?>"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.id.min.js" charset="UTF-8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.css" />

<script type="text/javascript">
  $(function() {
    $(document).ready(function() {
      $('#tgl_pembuatan').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true,

        language: "id",
        locale: "id",
      });
    });
  });
</script>

</html>