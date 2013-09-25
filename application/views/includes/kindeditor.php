	<link rel="stylesheet" href="<?php echo base_url(); ?>kindeditor/themes/default/default.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>kindeditor/plugins/code/prettify.css" />
	<script charset="utf-8" src="<?php echo base_url(); ?>kindeditor/kindeditor.js"></script>
	<script charset="utf-8" src="<?php echo base_url(); ?>kindeditor/lang/en.js"></script>
	<script charset="utf-8" src="<?php echo base_url(); ?>kindeditor/plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content"]', {
				width : '600px',
				height: '400px',
				langType : 'en',
				cssPath : '<?php echo base_url(); ?>kindeditor/plugins/code/prettify.css',
				uploadJson : '<?php echo base_url(); ?>kindeditor/php/upload_json.php',
				fileManagerJson : '<?php echo base_url(); ?>kindeditor/php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=kindeditor]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=kindeditor]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
	</script>