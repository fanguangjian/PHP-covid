// for future uninstall functionality popup in manage plugins page
jQuery(document).ready(function(){
	if(typeof(ajaxurl) === 'undefined' || !ajaxurl) return;

	var g_mbsAnimationSpeed = 300;
	var $uninstallLnk = jQuery('#the-list tr[data-plugin="'+ sbsPluginsData.plugSlug+ '/index.php"] .row-actions .delete a');
	if($uninstallLnk && $uninstallLnk.size()) {
		var $uninstallForm = jQuery('#sbsUninstallForm');
		var $uninstallWnd = jQuery('.sbsUninstallFormWrapp').dialog({
			modal:    true
			,	autoOpen: false
			,	width: 500
			,	height: 390
			,	buttons:  {
				'Submit & Deactivate': function() {
					$uninstallForm.submit();
				}
			}
		});

		$uninstallLnk.click(function(){
			$uninstallWnd.dialog('open');
			return false;
		});

		$uninstallForm.submit(function(){
			console.log('submit uninstall')
		});

	}
});