<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading"><?php echo lang("add");?></div>
			<div class="panel-body">
				<form action="<?php echo site_url('backend/Role/updateRole');?>"
					method="post" data-id="#Role"
					data-table-source="<?php echo site_url('backend/Role/getRoles');?>"
					onSubmit="return SubmitAjax(this);">
				 		<?php echo inputHidden($Role,"Role_id");?>
					<div class="form-group">
						<label class="control-label" for="title"><?php echo lang("role");?></label> <input
							class="form-control" name="Name"
							<?php echo inputValue($Role,"Name");?> placeholder="<?php echo lang("role").lang("enter");?>">
					</div>
					<?php foreach ($Permessions as $_permsssion){?>
					<div class="form-group">
						<div class="row">
							<label class="col-xs-2 control-label"><?php echo $_permsssion["Name"];?></label>
							<div class="col-xs-10">
								<label class="checkbox-inline">
									<?php
									$actionCount = $Action->getByPermessionIdsCount($_permsssion["Permession_id"]);
									if(isset($RolePermession) && $actionCount !=0 && $RolePermession->getByRolePermessionCount($Role["Role_id"],$_permsssion["Permession_id"]) == $actionCount){?>
									<input type="checkbox" checked data-class="ch_<?php echo $_permsssion["Description"];?>" onclick='handleClick(this)' value="すべて">すべて
									<?php }else{?>
									<input type="checkbox" id="ch_<?php echo $_permsssion["Description"];?>" data-class="ch_<?php echo $_permsssion["Description"];?>" onclick='handleClick(this)' value="すべて" />すべて
									<?php }?>
								</label>
							<?php foreach ($Action->getByPermession($_permsssion["Permession_id"]) as $_action){ ?>
								<label class="checkbox-inline">
									<input type="checkbox"  class="ch_<?php echo $_permsssion["Description"];?>"
										<?php echo isset($RolePermession)?checkedValue($_action["Action_id"],$RolePermession->getByRolePermession($Role["Role_id"],$_permsssion["Permession_id"])):"";?>
										 name="Permessions[<?php echo $_permsssion["Permession_id"];?>][]" onclick='checkChekced(this)' value="<?php echo $_action["Action_id"];?>">
								    <?php echo $_action["Name"];?>
							   </label> 
							<?php }?>
							</div>
						</div>
					</div>
					<?php }?>
					<div class="form-group">
						<button class="btn btn-primary" type="submit"><?php echo lang("save");?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading"><?php echo lang("role_list");?></div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<table id="Role"
							class="display table table-striped table-bordered table-hover dataTable"
							cellspacing="0" width="100%" style="width: 100%;">
							<thead>
								<tr role="row">
									<th>ID</th>
									<th><?php echo lang("number");?></th>
									<th><?php echo lang("manage");?></th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function () {

	 var options = {};
	 options.pagination = true;
	 options.filter = false;
	 options.sort = false;
	 options.info = true;
	 options.serverSide = true;
	 options.pageLength = 10;
	 
	 var loadDataUrl = '<?php echo site_url("backend/Role/getRoles")?>';

	var RoleAocolums =  [{ "mData": "Role_id" },{ "mData": "Name" },{ "mData": null }];
	var RoleColumnDefs = [{"targets": -1,"data": null,
		"render": function (data, type, row) {
			return "<a href=\"<?php echo site_url("backend/Role/?Role_edit_id=");?>"+row.Role_id+"\"><i class=\"fa fa-edit\"></i></a> "+
	  		 "<a href=\"javascript:del('<?php echo site_url("backend/Role/delete/?id=");?>"+row.Role_id+"','#Role','"+loadDataUrl+"')\">"+
	  		 "<i class=\"fa fa-remove\"></i></a>";
	}}];
	InitOverviewDataTable("#Role",loadDataUrl,RoleAocolums,RoleColumnDefs,options);
});
</script>