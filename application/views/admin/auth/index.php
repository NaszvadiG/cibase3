<div class="uk-width-medium-1-1 uk-margin-top">
<h2><?php echo lang('index_heading');?></h2>
<p><?php echo lang('index_subheading');?>

<p>
<a class="uk-button uk-button-primary" href="/admin/auth/create_user"><?php echo lang('index_create_user_link');?></a>
<a class="uk-button uk-button-primary" href="/admin/auth/create_group"><?php echo lang('index_create_group_link');?></a>

<table class="uk-table uk-table-striped uk-table-hover">
<thead>
	<tr>
		<th><?php echo lang('index_fname_th');?></th>
		<th><?php echo lang('index_lname_th');?></th>
		<th><?php echo lang('index_email_th');?></th>
		<th><?php echo lang('index_groups_th');?></th>
		<th><?php echo lang('index_status_th');?></th>
		<th><?php echo lang('index_action_th');?></th>
	</tr>
</thead>
<tbody>
	<?php foreach ($users as $user):?>
		<tr>
            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
			<td>
				<?php foreach ($user->groups as $group):?>
					<?php echo anchor("admin/auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
                <?php endforeach?>
			</td>
			<td><?php echo ($user->active) ? anchor("admin/auth/deactivate/".$user->id, lang('index_active_link')) : anchor("admin/auth/activate/". $user->id, lang('index_inactive_link'));?></td>
                        <td>
                        <a class="uk-button uk-button-primary" href="/admin/auth/edit_user/<?=$user->id;?>">Edytuj</a>
</td>
		</tr>
	<?php endforeach;?>
</tbody>
</table>
</div>
