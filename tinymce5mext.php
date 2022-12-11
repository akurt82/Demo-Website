<?php
/* ****************************************************************************************************** *
 *
 *  5M-Ware Web Solution License
 *  Copyright 2014, 5M-Ware
 *
 *  info@5m-ware.eu
 *
 *  Javascript part of the 'tinyMCE 5M-Ware Plugin Extensions'
 *  Version 1.1
 *  Stable
 *
 *  Description:
 *  Contents several functions to create plugins into the tinymce-editing instances.
 *
 *  Dependencies:
 *  tinymce ver. >= 4
 *  wepi_core.js
 *  wepi_serv.js
 *  tinymce5mplugins.js/php
 *
 *  Plugins:
 *  plugin_block.php
 *  plugin_table01.php
 *  plugin_pagelink.php
 *  plugin_uploadsifi.php
 *
 * ****************************************************************************************************** */

	/*
		This file needs before inclusion the following declaration

		$tinymceEditorLabel			Label of the editor

		$tinymceScriptingPath       Full-path of the file tinymce5mplugins.js or tinymce5mplugins.php

		and creates the editor. Further optional declaration are:
		
		$tinymceEditorURL			That is the form-url to send the text-area content to

		$tinymceDocumentTitle		Title of the document

		$tinymceDocumentSubTitle	Sub-title of the document

		$tinymceContent				Content of the text-area

		$tinymceWidth               Width-size of the editor

		$tinymceHeight              Height-size of the editor

		$tinymceObject              Embed some more tag-elements into the editor's form-scope

		$tinymceClass				Style-Class

		$tinymceID                  ID of the editor's tag-element

		$tinymceName                Name of the editor's tag-element
		
		$tinymceItems				Declares the items of the editor
				<leer>				All buttons and menus
				base				Base buttons and menus and the extendted image-function
				default				Base buttons and menus
				maxi				Everything excluding the 5M-Ware-Extensions and the menubar
				midi				So most, but not all items and excluding the 5M-Ware-Extensions and the menubar
				mini				The absolute minimum and excluding the 5M-Ware-Extensions and the menubar
				chat				Base buttons for the Chat-Environment and excluding the 5M-Ware-Extensions and the menubar
				minichat			The Chat-Needs only
				none				Wihout nothing special
	*/

	if ( !isset($tinymceItems) ) { $tinymceItems = ""; }

	if ( $tinymceItems == "" ) {
		$tinymceMenu = "";
		$tinymceActivate = '"tinymce5mWare_PlugIns",';
		$tinymceToolbar = "tinymce5mWare_ImageUpload tinymce5mWare_Box tinymce5mWare_Navigator tinymce5mWare_ReportTable | new save | btn5mClear | styleselect | undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image btn5mImage btn5mZoomBox | print preview media fullpage | forecolor backcolor emoticons | sizeselect | fontselect |  fontsizeselect | btn5mPopup btn5mMenu btn5mDock | btn5mMusic | btn5mBlock btn5mFormRow | btn5mBorder btn5mNavigator btn5mReportTable | btn5mList btn5mTree | btn5mPanelTab btn5mSlideTab btn5mAniTab | btn5mGalleryTab | btn5mBanner btn5mFluText | btn5mPage btn5mPDF btn5mFiles | btn5mBackgroundImage btn5mBackgroundAnimation | btn5mFacebook btn5mGooglePlus btn5mTwitter btn5mLinkedIn | btn5mL | btnTopic";
	} elseif ( $tinymceItems == "ebay" ) {
		$tinymceMenu = "";
		$tinymceActivate = '"tinymce5mWare_PlugIns",';
		$tinymceToolbar = "tinymce5mWare_ImageUpload tinymce5mWare_Box tinymce5mWare_Navigator tinymce5mWare_ReportTable | new save | btn5meBayCode | btn5mClear | styleselect | undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image btn5mImage btn5mZoomBox | print preview media fullpage | forecolor backcolor emoticons | sizeselect | fontselect |  fontsizeselect | btn5mPopup btn5mMenu btn5mDock | btn5mMusic | btn5mBlock btn5mFormRow | btn5mBorder btn5mNavigator btn5mReportTable | btn5mList btn5mTree | btn5mPanelTab btn5mSlideTab btn5mAniTab | btn5mGalleryTab | btn5mBanner btn5mFluText | btn5mPage btn5mPDF btn5mFiles | btn5mBackgroundImage btn5mBackgroundAnimation | btn5mFacebook btn5mGooglePlus btn5mTwitter btn5mLinkedIn | btn5mL | btnTopic";
	} elseif ( $tinymceItems == "form" ) {
		$tinymceMenu = "menubar: 'none',";
		$tinymceActivate = '"tinymce5mWare_PlugIns",';
		$tinymceToolbar = "new save | btn5mClear | styleselect | undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image btn5mImage | print preview fullpage | forecolor backcolor | sizeselect | fontselect |  fontsizeselect | btn5mBorder btn5mReportTable | btn5mPanelTab btn5mSlideTab | btn5mBlock | btn5mFormRow | btn5mFormModalWindow | btn5mFormRegFields btn5mFormInput btn5mFormCheckBox | btn5mFormRadioGroup btn5mFormCombo | btn5mFormSendButton | btn5mFormClearButton | btn5mL | btnTopic"; // btn5mFormList btn5mFormTree -> Bind later...
	} elseif ( $tinymceItems == "base" ) {
		$tinymceMenu = "";
		$tinymceActivate = '"tinymce5mWare_PlugIns",';
		$tinymceToolbar = "new save | btn5mClear | styleselect | undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image btn5mImage | print preview media fullpage | forecolor backcolor emoticons | sizeselect | fontselect |  fontsizeselect";
	} elseif ( $tinymceItems == "default" ) {
		$tinymceMenu = "";
		$tinymceActivate = '';
		$tinymceToolbar = "new save | styleselect | undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons | sizeselect | fontselect |  fontsizeselect";
	} elseif ( $tinymceItems == "none" ) {
		$tinymceMenu = "menubar: 'none',";
		$tinymceActivate = '';
		$tinymceToolbar = "";
	} elseif ( $tinymceItems == "maxi" ) {
		$tinymceMenu = "menubar: 'none',";
		$tinymceActivate = '';
		$tinymceToolbar = "new save | undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | forecolor backcolor emoticons | sizeselect | fontselect |  fontsizeselect";
	} elseif ( $tinymceItems == "midi" ) {
		$tinymceMenu = "menubar: 'none',";
		$tinymceActivate = '';
		$tinymceToolbar = "new save | undo redo | bold italic underline | alignleft aligncenter alignright alignjustify";
	} elseif ( $tinymceItems == "mini" ) {
		$tinymceMenu = "menubar: 'none',";
		$tinymceActivate = '';
		$tinymceToolbar = "new save | undo redo | bold italic underline";
	} elseif ( $tinymceItems == "chat" ) {
		$tinymceMenu = "menubar: 'none',";
		$tinymceActivate = '"tinymce5mWare_PlugIns",';
		$tinymceToolbar = "btn5mSend | undo redo | bold italic underline | forecolor backcolor emoticons | btn5mLink";
	} elseif ( $tinymceItems == "minichat" ) {
		$tinymceMenu = "menubar: 'none',";
		$tinymceActivate = '"tinymce5mWare_PlugIns",';
		$tinymceToolbar = "btn5mSend | undo redo | bold italic underline | emoticons";
	} elseif ( $tinymceItems == "embedban" ) {
		$tinymceMenu = "menubar: 'none',";
		$tinymceActivate = '"tinymce5mWare_PlugIns",';
		$tinymceToolbar = "btn5mSend | btn5mEmbedForeignCode";
	}

	if ( !isset($tinymceID) ) {
		$tinymceID = "";
	} else {
		$tinymceID = ' id = "' . $tinymceID . '" ';
	}

	if ( !isset($tinymceName) ) {
		$tinymceName = "";
	} else {
		$tinymceName = ' name = "' . $tinymceName . '" ';
	}

	if ( !isset($tinymceClass) ) {
?>
		<div class = "tinymceAround">
<?php } else {
		if ( $tinymceClass != "" ) {
?>
		<div class = "<?php echo $tinymceClass; ?>">
<?php
		} else {
?>
		<div>
<?php
		}
} ?>
		<script type = "text/javascript">

		<?php
		if ( ( $tinymceScriptingPath != "" ) && ( file_exists($tinymceScriptingPath) ) ) {
			include_once( $tinymceScriptingPath );
		?>

		tinymce.init({
			selector: "textarea#<?php echo $tinymceEditorLabel; ?>",
			theme: "modern",
			language: "<?php echo $lang; ?>",
			<?php echo $tinymceMenu; ?>
			width: <?php echo $tinymceWidth; ?>,
			height: <?php echo $tinymceHeight; ?>,
			plugins: [
				 <?php echo $tinymceActivate; ?>
				 "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
				 "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
				 "save table contextmenu directionality emoticons template paste textcolor", "table", "preview"
		   ],
		   content_css: "css/content.css",
		   toolbar: "<?php echo $tinymceToolbar; ?>", 
		   force_br_newlines : true,
		   force_p_newlines : false,
		   forced_root_block : '',
		   valid_elements: "@[id|class|title|style|onmouseover|onclick]," +
						   "a[name|href|target|title|alt]," +
						   "div[align|valign|style|width|height],blockquote,-ol,-ul,-li,br,img[src|height|width],-sub,-sup,-b,-i,-u,table,tbody,tr,td,th,center," +
						   "-span[data-mce-type],hr," +
						   "input[style|type|name|id|value|checked],"+
						   "select[style|size|type|name|id],"+
						   "option[value|selected],"+
						   "iframe[src|title|width|height|allowfullscreen|frameborder|class|id],object[classid|width|height|codebase|*],param[name|value|_value|*],embed[type|width|height|src|*],"+
						   "table[border|cellspacing|cellpadding|width],tr[rowspan],td[colspan|width|height|align|valign|style],th[colspan|width|height|align|valign|style],tr[style|width|height]",
		   extended_valid_elements : "@[id,class,title,style,onclick,onmouseover,onmouseout,onmousemove,onkeydown,onkeyup,onkeypress]" +
									 ",img[class|src|border=0|style|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name|onclick|box-shadow|-moz-box-shadow|-webkit-box-shadow|box-radius|-moz-box-radius|-webkit-box-radius]"+
		                             ",div[class,align,style,width,height,onmouseover,onmouseout,onmousemove,onclick,onkeydown,onkeyup,onkeypress,alt,name,id]"+
									 ",p[class,align,style,width,height,onmouseover,onmouseout,onmousemove,onclick,onkeydown,onkeyup,onkeypress,alt,name,id]"+
									 ",table[class,align,style,width,height,onmouseover,onmouseout,onmousemove,onclick,onkeydown,onkeyup,onkeypress,alt,name,id,width,height]"+
									 ",tr[class,align,style,width,height,onmouseover,onmouseout,onmousemove,onclick,onkeydown,onkeyup,onkeypress,alt,name,id,width,height]"+
									 ",td[class,align,style,width,height,onmouseover,onmouseout,onmousemove,onclick,onkeydown,onkeyup,onkeypress,alt,name,id,width,height,colspan,rowspan]"+
									 ",th[class,align,style,width,height,onmouseover,onmouseout,onmousemove,onclick,onkeydown,onkeyup,onkeypress,alt,name,id,width,height,colspan,rowspan]"+
									 ",script[language|type|src]"+
									 ",input[style,type,name,id,value,checked,onkeydown,onkeyup,onkeypress,onblur,onmousedown,onmouseup,onmouseover,onmouseout,onclick,ondblclick]"+
									 ",select[style,size,type,name,id]"+
									 ",iframe[value,value,src,method,width,height,border,style]"+
									 ",option[value,selected]",
									 
		   entity_encoding : "raw",
		   fontsize_formats: "8pt 9pt 10pt 11pt 12pt 16pt 20pt 24pt 26pt 36pt 38pt 42pt 46pt 50pt 55pt 60pt 65pt 70pt 75pt 80pt 85pt 90pt 100pt 110pt 120pt 130pt 140pt 150pt 160pt 170pt 180pt",
		   mode : "textareas",
		   theme_advanced_buttons3_add : "tablecontrols",
		   table_styles : "Header 1=header1;Header 2=header2;Header 3=header3",
		   table_cell_styles : "Header 1=header1;Header 2=header2;Header 3=header3;Table Cell=tableCel1",
		   table_row_styles : "Header 1=header1;Header 2=header2;Header 3=header3;Table Row=tableRow1",
			theme_advanced_buttons4_add : "preview",
			plugin_preview_width : "990",
			plugin_preview_height : "500"
		 }); 

		</script>

		<?php if ( $tinymceDocumentTitle != "" ) { ?>
		<h2><?php echo $tinymceDocumentTitle; ?>
			<?php if ( $tinymceDocumentSubTitle != "" ) { ?>
			<br /><small><?php echo $tinymceDocumentSubTitle; ?></small>
			<?php } ?>
		</h2>
		<?php } ?>

		<form action="<?php echo $tinymceEditorURL; ?>" method="post" <?php echo "$tinymceID $tinymceName"; ?>>
				<?php echo $tinymceObject; ?>
				<textarea cols="80" id="<?php echo $tinymceEditorLabel; ?>" name="<?php echo $tinymceEditorLabel; ?>" rows="10"><?php
					echo $tinymceContent;
				?></textarea>
		</form>
		</div>

	<?php } else { ?>

		Error while loading scripting file.

	<?php } ?>
