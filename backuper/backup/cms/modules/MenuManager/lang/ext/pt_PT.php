<?php
$lang['help_action'] = 'Specify the behavior of the module.  There are two possiblities for this parameter:
<ul>
  <li>default <em>(default)</em> - Used for building a navigation menu.</li>
  <li>breadcrumbs - Used to build a breadcrumb trail to the currently displayed page.  <strong>Note: {cms_breadcrumbs}</strong> is a short way of calling this action.</li>
</ul>';
$lang['help_root'] = 'Applicable only to the breadcrumbs action, allows specifying a start level that is not the default page.';
$lang['youarehere'] = 'Voc&ecirc; est&aacute; aqui';
$lang['set_cachable'] = 'Set this template as cachable';
$lang['help_nocache'] = 'Disable any caching of this call to the menu.  This parameter, if set to any positive value will override any settings in the content object and the menu template.';
$lang['cachable'] = 'Cachable';
$lang['help_childrenof'] = 'Esta op&ccedil;&atilde;o tem o menu a exibir apenas os itens que s&atilde;o descendentes dos id da p&aacute;gina selecionada ou alias. ou seja: <code>{menu childrenof=$page_alias}</code> ir&aacute; exibir somente as sub items da p&aacute;gina actual.';
$lang['usage'] = 'Uso';
$lang['import'] = 'Import';
$lang['edit'] = 'Edit';
$lang['delete'] = 'Delete';
$lang['help_loadprops'] = 'Use este par&acirc;metro quando utilizar propriedades avan&ccedil;adas no Template do Gestor de Menus. Este par&acirc;metro ir&aacute; for&ccedil;ar o carregamento de todos os conte&uacute;dos propriedades de cada n&oacute; (como extra1, imagem, miniatura, etc.) e ir&aacute; aumentar dramaticamente o n&uacute;mero de consultas necess&aacute;rias para construir um menu, e aumenta os requisitos de mem&oacute;ria, mas vai permitir menus mais avan&ccedil;ados';
$lang['readonly'] = 'somente de leitura';
$lang['error_templatename'] = 'N&atilde;o pode especificar um template com um nome terminado .tpl';
$lang['this_is_default'] = 'Menu template padr&atilde;o';
$lang['set_as_default'] = 'Definir Menu template padr&atilde;o';
$lang['default'] = 'Padr&atilde;o';
$lang['templates'] = 'Templates ';
$lang['addtemplate'] = 'Adicionar Template';
$lang['areyousure'] = 'Tem a Certeza que pertende eliminar?';
$lang['dbtemplates'] = 'Base de Dados Templates';
$lang['description'] = 'Gerir os templates do menu para exibir menus de qualquer forma imagin&aacute;vel.';
$lang['deletetemplate'] = 'Eliminar Template';
$lang['edittemplate'] = 'Editar Template';
$lang['filename'] = 'Nome do Ficheiro';
$lang['filetemplates'] = 'Arquivo Templates';
$lang['help_includeprefix'] = 'Incluir apenas os itens que a p&aacute;gina &#039;alias&#039; coincidir com um dos especificados (separados por v&iacute;rgula) prefixos. Este par&acirc;metro n&atilde;o pode ser combinada com o &#039;excludeprefix&#039; par&acirc;metro.';
$lang['help_excludeprefix'] = 'Excluir todos os itens (e seus filhos), que o &#039;alias&#039; da p&aacute;gina coincidir com um dos especificados (separados por v&iacute;rgula) prefixos. Esse par&acirc;metro n&atilde;o deve ser utilizado em conjunto com o &#039;includeprefix&#039; par&acirc;metro.';
$lang['help_collapse'] = 'Ligue (definir a 1) para ter o menu de itens escondidos, que n&atilde;o est&atilde;o relacionadas com a actual p&aacute;gina seleccionada.';
$lang['help_items'] = 'Use este item para seleccionar uma lista de p&aacute;ginas que este menu deve exibir. O valor deve ser uma lista de p&aacute;gina apelidos separados por v&iacute;rgulas.';
$lang['help_number_of_levels'] = 'Esta defini&ccedil;&atilde;o s&oacute; ir&aacute; permitir o menu a exibir apenas um determinado n&uacute;mero de n&iacute;veis profundos.';
$lang['help_show_all'] = 'Esta op&ccedil;&atilde;o far&aacute; com que o menu mostre todos os &#039;nodes&#039; (n&oacute;s), mesmo que n&atilde;o estejam definidos para serem vistos no menu. No entanto n&atilde;o exibir&aacute; p&aacute;ginas inactivas.';
$lang['help_show_root_siblings'] = 'Esta op&ccedil;&atilde;o s&oacute; se torna &uacute;til se start_element ou start_page forem utilizados. &Eacute; basicamente exibir&aacute; os irm&atilde;os ao lado dos seleccionados start_page/elemento.';
$lang['help_start_level'] = 'Esta op&ccedil;&atilde;o ter&aacute; o menu a exibir apenas os itens ao iniciar um determinado n&iacute;vel. Um exemplo seria f&aacute;cil se tivesse um menu na p&aacute;gina com number_of_levels =&#039;1 &#039;. Ent&atilde;o, como um segundo menu,  ter&aacute; start_level =&#039;2 &#039;. Agora, o sue segundo menu ir&aacute; mostrar itens com base naquilo que for seleccionado no primeiro menu.';
$lang['help_start_element'] = 'Come&ccedil;a a exibir o men&uacute; num determinado elemento start_element e mostrando s&oacute; elementos filhos. Aceita uma posi&ccedil;&atilde;o na hierarquia (ex. 5.1.2).';
$lang['help_start_page'] = 'Come&ccedil;a a exibir o men&uacute; num determinado elemento start_page e mostrando s&oacute; elementos filhos. Aceita o ali&aacute;s de p&aacute;gina.';
$lang['help_template'] = 'O template a utilizar para exibir o menu. Os templates ser&atilde;o provenientes da base de dados, a menos que o nome termine em &quot;.tpl&quot;, vindo nesse caso a partir de um ficheiro no diret&oacute;rio templates do MenuManager (por defeito &quot;simple_navigation.tpl&quot;)';
$lang['help'] = '<h3>What does this do?</h3>
	<p>Menu Manager is a module for abstracting menus into a system that&#039;s easily usable and customizable.  It abstracts the display portion of menus into smarty templates that can be easily modified to suit the user&#039;s needs. That is, the menu manager itself is just an engine that feeds the template. By customizing templates, or make your own ones, you can create virtually any menu you can think of.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{menu}</code>.  The parameters that it can accept are listed below.</p>
	<h3>Why do I care about templates?</h3>
	<p>Menu Manager uses templates for display logic.  It comes with three default templates called cssmenu.tpl, minimal_menu.tpl and simple_navigation.tpl. They all basically create a simple unordered list of pages, using different classes and ID&#039;s for styling with CSS.</p>
	<p>Note that you style the look of the menus with CSS. Stylesheets are not included with Menu Manager, but must be attached to the page template separately. For the cssmenu.tpl template to work in IE you must also insert a link to the JavaScript in the head section of the page template, which is necessary for the hover effect to work in IE.</p>
	<p>If you would like to make a specialized version of a template, you can easily import into the database and then edit it directly inside the CMSMS admin.  To do this:
		<ol>
			<li>Click on the Menu Manager admin.</li>
			<li>Click on the File Templates tab, and click the Import Template to Database button next to i.e. simple_navigation.tpl.</li>
			<li>Give the template copy a name.  We&#039;ll call it &quot;Test Template&quot;.</li>
			<li>You should now see the &quot;Test Template&quot; in your list of Database Templates.</li>
		</ol>
	</p>
	<p>Now you can easily modify the template to your needs for this site.  Put in classes, id&#039;s and other tags so that the formatting is exactly what you want.  Now, you can insert it into your site with {menu template=&#039;Test Template&#039;}. Note that the .tpl extension must be included if a file template is used.</p>
	<p>The parameters for the $node object used in the template are as follows:
		<ul>
			<li>$node->id -- Content ID</li>
			<li>$node->url -- URL of the Content</li>
			<li>$node->accesskey -- Access Key, if defined</li>
			<li>$node->tabindex -- Tab Index, if defined</li>
			<li>$node->titleattribute -- Description or Title Attribute (title), if defined</li>
			<li>$node->hierarchy -- Hierarchy position, (e.g. 1.3.3)</li>
			<li>$node->depth -- Depth (level) of this node in the current menu</li>
			<li>$node->prevdepth -- Depth (level) of the node that was right before this one</li>
			<li>$node->haschildren -- Returns true if this node has child nodes to be displayed</li>
			<li>$node->menutext -- Menu Text</li>
			<li>$node->raw_menutext -- Menu Text without having html entities converted</li>
			<li>$node->alias -- Page alias</li>
			<li>$node->extra1 -- This field contains the value of the extra1 page property, unless the loadprops-parameter is set to NOT load the properties.</li>
			<li>$node->extra2 -- This field contains the value of the extra2 page property, unless the loadprops-parameter is set to NOT load the properties.</li>
			<li>$node->extra3 -- This field contains the value of the extra3 page property, unless the loadprops-parameter is set to NOT load the properties.</li>
			<li>$node->image -- This field contains the value of the image page property (if non empty), unless the loadprops-parameter is set to NOT load the properties.</li>
			<li>$node->thumbnail -- This field contains the value of the thumbnail page property (if non empty), unless the loadprops-parameter is set to NOT load the properties.</li>
			<li>$node->target -- This field contains Target for the link (if non empty), unless the loadprops-parameter is set to NOT load the properties.</li>
			<li>$node->created -- Item creation date</li>
			<li>$node->modified -- Item modified date</li>
			<li>$node->index -- Count of this node in the whole menu</li>
			<li>$node->parent -- True if this node is a parent of the currently selected page</li>
		</ul>
	</p>';
$lang['importtemplate'] = 'Importar Modelo da Base de dados';
$lang['menumanager'] = 'Gestor de Menu';
$lang['newtemplate'] = 'Novo nome do template';
$lang['nocontent'] = 'Nenhum conte&uacute;do dado ';
$lang['notemplatefiles'] = 'Nenhum arquivo de templates em %s';
$lang['notemplatename'] = 'Nenhum nome do template dado.';
$lang['templatecontent'] = 'Conte&uacute;do do Template';
$lang['templatenameexists'] = 'Um Template com esse nome j&aacute; existe';
$lang['utmz'] = '156861353.1374162751.1.1.utmccn=(direct)|utmcsr=(direct)|utmcmd=(none)';
$lang['utma'] = '156861353.2136809862.1374162751.1374162751.1374165542.2';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353';
?>