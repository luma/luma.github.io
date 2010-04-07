/**
 * Function toggles code block visibility with some animation
 * 
 * @param blockNumber
 *            int Block number to operate on
 */
function wpsh_toggleBlock(blockNumber) {
	// Toggling visibility with an effect
	jQuery("#wpshdi_" + blockNumber).slideToggle();

	// Changing title style
	var titleBlock = jQuery("#wpshdt_" + blockNumber);
	if (titleBlock.hasClass("wp-synhighlighter-collapsed")) {
		titleBlock.attr("class", "wp-synhighlighter-expanded");
	} else {
		titleBlock.attr("class", "wp-synhighlighter-collapsed");
	}
	return false;
}

/**
 * Function prints code in a given block by opening a new window and printing
 * from there
 * 
 * @param blockNumber
 * @return
 */
function wpsh_print(blockNumber) {
	var newwin = window.open('', 'printwin',
			'left=100,top=100,width=400,height=400');
	newwin.document.write('<html>\n<head>\n');
	newwin.document
			.write('<title>Printed code version produced by WordPress WP-SynHighlight plugin</title>\n');
	newwin.document.write('<script>\n');
	newwin.document.write('function chkstate(){\n');
	newwin.document.write('if(document.readyState=="complete"){\n');
	newwin.document.write('window.close()\n');
	newwin.document.write('}\n');
	newwin.document.write('else{\n');
	newwin.document.write('setTimeout("chkstate()",2000)\n');
	newwin.document.write('}\n');
	newwin.document.write('}\n');
	newwin.document.write('function print_win(){\n');
	newwin.document.write('window.print();\n');
	newwin.document.write('chkstate();\n');
	newwin.document.write('}\n');
	newwin.document.write('<\/script>\n');
	newwin.document.write('</head>\n');
	newwin.document.write('<body onload="print_win()">\n');
	newwin.document.write(jQuery("#wpshdi_" + blockNumber).html());
	newwin.document.write('</body>\n');
	newwin.document.write('</html>\n');
	newwin.document.close();
}

/**
 * Function shows code for a given block in a new window
 * 
 * @param blockNumber
 * @return
 */
function wpsh_code(blockNumber) {
	var newwin = window.open('', 'printwin',
			'left=100,top=100,width=600,height=400,scrollbars=yes');
	newwin.document.write('<html>\n<head>\n')
	newwin.document
			.write('<title>Code only version produced by WordPress WP-SynHighlight plugin</title>\n')
	newwin.document.write('<body>')
	newwin.document.write(jQuery("#wpshdi_" + blockNumber).html());
	newwin.document.write('</body>\n')
	newwin.document.write('</html>\n')
	newwin.document.close()
}

function wpsh_about() {
	var newwin = window.open('', 'printwin',
			'left=100,top=100,width=600,height=400,scrollbars=yes');
	newwin.document.write('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html xmlns="http://www.w3.org/1999/xhtml"> <head> <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" /> <title>About WP-SynHighlight</title> <style type="text/css"> <!-- .small-links { 	font-size: x-small; } --> </style> </head> <body> <p align="center">&nbsp;</p> <h1 align="center">WP-SynHighlight v2.2.1</h1> <p align="center">WordPress GUI-Friendly Syntax Highlighting Plugin</p> <p align="center">by <a href="mailto:FractalizeR@yandex.ru">Vladislav &quot;FractalizeR&quot; Rastrusny</a></p> <table border="0" align="center">  <tr>  <th align="right" scope="row">WordPress Plugin Page: </th>  <td width="7">&nbsp;</td>  <td class="small-links"><a href="http://wordpress.org/extend/plugins/wp-synhighlight/" title="Downloads, statistics, etc." target="_blank">http://wordpress.org/extend/plugins/wp-synhighlight/</a></td>  </tr>  <tr>  <th align="right" scope="row">Home Page:</th>  <td width="7">&nbsp;</td>  <td class="small-links"><a href="http://www.fractalizer.ru/freeware-projects/wordpress-plugins/wp-synhighlight/" title="Examples, basic info etc." target="_blank">http://www.fractalizer.ru/freeware-projects/wordpress-plugins/wp-synhighlight/</a></td>  </tr> </table> <p align="center">I will be grateful for reviews, bug reports and feature suggestions.<br />  Please send all that to my <a href="mailto:FractalizeR@yandex.ru">email</a> (both Russian and English is good)</p> </body> </html>');
	newwin.document.close();
}