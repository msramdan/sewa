<?php 

$string = "<div class=\"content-wrapper\">
<section class=\"content-header\">
	<div class=\"container-fluid\">
		<div class=\"row mb-2\">
			<div class=\"col-sm-6\">
			<?php if (\$this->uri->segment(2) == \"create\" || \$this->uri->segment(2) == \"create_action\" ) { ?>
				<h4>TAMBAH DATA " . strtoupper($table_name) . "</h4>
			<?php } else { ?>
				<h4>EDIT DATA " . strtoupper($table_name) . "</h4>
			<?php } ?>

			</div>
			<div class=\"col-sm-6\">
				<ol class=\"breadcrumb float-sm-right\">
					<li class=\"breadcrumb-item\"><a href=\"<?= base_url() ?>\">Dashboard</a></li>
					<li class=\"breadcrumb-item active\">" . $table_name . "</li>
				</ol>
			</div>
		</div>
	</div>
</section>

<section class=\"content\">
	<div class=\"card\">

		<div class=\"card-body\">
        
            <form action=\"<?php echo \$action; ?>\" method=\"post\">
            <table id=\"data-table-default\" class=\"table  table-bordered table-hover table-td-valign-middle\">";
foreach ($non_pk as $row) {
    if ($row["data_type"] == 'text')
    {
    $string .= "\n\t    
        <tr><td >".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></td><td> <textarea class=\"form-control\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\"><?php echo $".$row["column_name"]."; ?></textarea></td></tr>";
    }elseif($row["data_type"]=='email'){
        $string .= "\n\t    <tr><td >".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></td><td><input type=\"email\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" /></td></tr>";    
    }
    elseif($row["data_type"]=='date'){
        $string .= "\n\t    <tr><td >".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></td><td><input type=\"date\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" /></td></tr>";    
        } 
    else
    {
    $string .= "\n\t    <tr><td >".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></td><td><input type=\"text\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" /></td></tr>";
    }
}
$string .= "\n\t    <tr><td></td><td><input type=\"hidden\" name=\"".$pk."\" value=\"<?php echo $".$pk."; ?>\" /> ";
$string .= "\n\t    <button type=\"submit\" class=\"btn btn-danger\"><i class=\"fas fa-save\"></i> <?php echo \$button ?></button> ";
$string .= "\n\t    <a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-info\"><i class=\"fas fa-undo\"></i> Kembali</a></td></tr>";
$string .= "\n\t</table></form></div>
</div>
</section>
</div>
";

$hasil_view_form = createFile($string, $target."views/" . $c_url . "/" . $v_form_file);
