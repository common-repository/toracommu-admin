<?
require_once($GLOBALS["plugin_root_tora"]."lib/default.js");
?>
<div class=wrap>
	<h2>日本ブログ村 トラコミュ設定</h2> 
	<?
	if(isset($error_strings) && $error_strings!=""){
	?>
	<em style="color:red;"><?=$error_strings;?></em>
	<?
	}
	?>
	<form method="post" action="options-general.php?page=blog_mura_toracommu" name="blog_mura_toracommu_form">
	<input type="hidden" name="toracommu_mode" value="add_data">
	<input type="hidden" name="toracommu_num" value="">
	<table class="widefat" style="text-align:center"> 
		<thead> 
			<tr> 
				<th scope="col" style="text-align:left">Num</th> 
				<th scope="col" style="text-align:center">トラコミュ名</th> 
				<th scope="col" style="text-align:center">トラコミュURL</th> 
				<th scope="col" style="text-align:center">編集</th> 
				<th scope="col" style="text-align:center">削除</th> 
			</tr> 
		</thead> 
		<tbody>
			<tr class="alternate"> 
				<td style="text-align:left" id="input_space">
				入力・編集
				</td> 
				<td>
				<input type="text" name="toracommu_name" value="" size="30">
				</td> 
				<td> 
				<input type="text" name="toracommu_url" value="" size="70">
				</td> 
				<td> 
				<input type="button" value="登録" id="editbutton" onClick="if(window.confirm('データを送信しますか？')){document.blog_mura_toracommu_form.submit();}">
				</td> 
				<td>
				&nbsp;
				</td> 
			</tr>
		<?
		if(is_array($csvLines) && count($csvLines)>0){
			foreach($csvLines as $k=>$v){
				?>
				<tr class="alternate"> 
					<td style="text-align:left">
					<?=($k+1);?>
					</td> 
					<td>
					<?=str_replace("++replace_text++",",",htmlspecialchars($v[0]));?>
					</td> 
					<td> 
					<?=str_replace("++replace_text++",",",htmlspecialchars($v[1]));?>
					</td> 
					<td> 
					<input type="button" value="編集" onClick="toracommu_edit('<?=str_replace("++replace_text++",",",htmlspecialchars($v[0]));?>','<?=str_replace("++replace_text++",",",htmlspecialchars($v[1]));?>',<?=$k;?>);">
					</td> 
					<td>
					<input type="button" value="削除" onClick="if(window.confirm('データを削除しますか？')){toracommu_delete(<?=$k;?>);}">
					</td> 
				</tr>
				<?
			}
		}else{
			?>
			<tr class="alternate"> 
				<td style="text-align:left" colspan="5">
				登録はありません。
				</td> 
			</tr>
			<?
		}
		?>
		</tbody>
	</table>
	</form>
</div>