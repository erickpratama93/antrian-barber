<style type="text/css">
	.row{
		margin-top: 10px;
	}
</style>
<form action="<?php echo base_url('admin/Antrian_barberman/save') ?>" method="post">
	<div class ="row">
		<div class ="col-md-2">
			<label>Pilih Barberman</label>		
		</div>

		<div class="col-md-5">
			<select name="id_barberman" id="id_barberman" class="form-control" onchange="noAntrian(this.value)">
				<option value=""> Pilih </option>
				<?php foreach ($getBarberman as $row ) {
				?>
					<option value="<?php echo $row->id_barberman; ?>"> <?php echo $row->kode_barberman; ?> </option>
				<?php } ?>
			</select>
		</div>
	</div>

	<div class ="row">
		<div class ="col-md-2">
			<label>No Antrian Barberman</label>		
		</div>

		<div class="col-md-5">
			<input type="text" name="no_antrian_barberman2" id="no_antrian_barberman2" value="" disabled="" class="form-control">
			<input type="hidden" name="no_antrian_barberman" id="no_antrian_barberman" value="" class="form-control">
		</div>
	</div>

	<div class ="row">
		<div class ="col-md-2">
			<label>Pilih Member</label>		
		</div>

		<div class="col-md-5">
			<select name="id_member" id="id_member" class="form-control">
				<?php foreach ($getMember as $row ) {
				?>	
				<option value="<?php echo $row->id_member; ?>"> <?php echo $row->nama; ?> </option>
			<?php } ?>
			</select>
		</div>
	</div>
	<div class="row text-right">
		<div class="col-md-7">
			<input type="submit" name="simpan" id="simpan" value="Simpan" class="btn btn-primary">
		</div>
	</div>
</form>

<script type="text/javascript">
	
</script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/sb_admin/js/jquery.js') ?>"></script> 
<!-- <script src="js/bootstrap.min.js"></script> -->
<script>
    

    function noAntrian(id_barberman){
		// alert(id_barberman);
		if(id_barberman!=""){
			$.ajax({

				url: "<?php echo base_url('admin/Antrian_barberman/getNoAntrian'); ?>",
				type : "POST",
				data : "id_barberman="+id_barberman,
				datatype: "json",
				success:function(response){
					console.log(response);
					// alert(data);
					var output = JSON.parse(response);
					if(output.no > output.maks){
						$("#no_antrian_barberman2").val('Data Sudah Penuh');
						// $("#simpan").toggle('slow');
						$("#simpan").prop("disabled",true);
					}else{

						$("#no_antrian_barberman").val(output.no);
						$("#no_antrian_barberman2").val(output.no_hasil);
						$("#simpan").prop("disabled",false);
					}
				} // Munculkan alert error
			});
		}else{
			$("#no_antrian_barberman").val("");
			$("#no_antrian_barberman2").val("");
		}
	}
</script>

