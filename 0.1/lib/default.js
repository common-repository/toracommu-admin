<script type="text/javascript"> 
// <![CDATA[
	function toracommu_edit(name,url,num){
		document.blog_mura_toracommu_form.toracommu_name.value=name;
		document.blog_mura_toracommu_form.toracommu_url.value=url;
		document.blog_mura_toracommu_form.toracommu_num.value=num;
		document.getElementById('editbutton').value='データを更新';
		document.blog_mura_toracommu_form.toracommu_mode.value='edit_data';	
	}
	function toracommu_delete(num){
		document.blog_mura_toracommu_form.toracommu_num.value=num;
		document.blog_mura_toracommu_form.toracommu_mode.value='delete_data';
		document.blog_mura_toracommu_form.submit();
	}
// ]]>
</script> 