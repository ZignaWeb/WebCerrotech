<?
// acciones
$inline["en"]["listar"]="View";
$inline["en"]["editar"]="Edit";
$inline["en"]["delete"]="Delete";
$inline["en"]["cargar"]="Add";
$inline["en"]["export"]="Export";
$inline["en"]["medias"]="Upload";
$inline["en"]["download"]="Download file";
$inline["en"]["Search"]="Search";
$inline["en"]["pages"]="Pages";
$str["en"]["upfoto"]="Add media"; // boton post crear elemento
$inline["en"]["media"]="Media";

// headers
$inline["en"]["viendo"]="Listing: ";
$inline["en"]["permisos"]="Allowed actions";
$inline["en"]["permisosBajadas"]="You are a moderator level [:x:] in this system, these are the actions that your level authorize you t perform:";
$inline["en"]["eliminado"]="Deleted";
$inline["en"]["editado"]="Edited";
$inline["en"]["Bienvenido"]="Welcome";
$inline["en"]["login"]="Login";
$inline["en"]["logout"]="Logout";

// forms
$inline["en"]["searchTerm"]="Search term";
$inline["en"]["search"]="Search";
$inline["en"]["title"]="Title";
$inline["en"]["nombre"]="Name";
$inline["en"]["desc"]="Description";
$inline["en"]["tipo"]="File type";
$inline["en"]["created"]="Created";
$inline["en"]["File"]="File";
$inline["en"]["uploadto"]="Upload to";
$inline["en"]["asignto"]="Asign to";
$inline["en"]["Date"]="Date";
$inline["en"]["Datetime"]="Date and time";
$inline["en"]["Username"]="Username";
$inline["en"]["Password"]="Password";
$inline["en"]["Email"]="Email";
$inline["en"]["Level"]="Level";
$inline["en"]["Accion"]="Action";
$inline["en"]["Codigo"]="Code";
$inline["en"]["desde"]="From";
$inline["en"]["hasta"]="To";
$inline["en"]["sindefinir"]="Undefined";
$inline["en"]["Elegir"]="Choose: ";
$inline["en"]["type"]="File type";
$inline["en"]["visibility"]="Visibility";
$inline["en"]["Show"]="Show";
$inline["en"]["NoShow"]="Don't Show";
$inline["en"]["private"]="Private";
$inline["en"]["links"]="Links";
$inline["en"]["default"]="Default";
$inline["en"]["Yes"]="Yes";
$inline["en"]["No"]="No";

// resultados busqueda
$inline["en"]["results"]="results";
$inline["en"]["buscando"]="searching for";
$inline["en"]["pagina"]="page";
$inline["en"]["of"]="of";
$inline["en"]["noresults"]="There is no [:x:] to list at this moment.";

// menues
$inline["en"]["menu"]="Menu";
$inline["en"]["his"]="Log";
$inline["en"]["setup"]="Setup";
$inline["en"]["salir"]="Log-out";
$inline["en"]["goback"]="Go back";
$inline["en"]["cp"]="Control Panel";

// contexturales
$str["en"]["cargado"]="Element added to: "; 			// texto on seccess submit formulario cargar
$str["en"]["nocargado"]="Error creating: "; 	// texto on fail submit formulario cargar
$str["en"]["unamas"]="Add one more";
$str["en"]["crear"]="New: ";

// joyride
$str["en"]["joytext"]="Help";
$str["en"]["esotodo"]="That is it!";
$str["en"]["yacono"]="You know all the fundamental elements in this screen.";
$joy["en"] = array(
	array (
		"i" => "joy_menu_ver", // id del elemento html
		"h" => $inline["en"]["listar"], // titulo del tip
		"t" => "In this section you can see and manage all the registries added to the system." // texto del tip
	),
	array (
		"i" => "joy_menu_cargar",
		"h" => $inline["en"]["cargar"],
		"t" => "Here you have quick access for creating new material."
	),
	array (
		"i" => "joy_contenido_permisos",
		"h" => $inline["en"]["permisos"],
		"t" => "These are the thigs you are authorized to do."
	),
	array (
		"i" => "joy_menu_sec",
		"h" => "Secondary menu",
		"t" => "This is a list of the action that you can perform on this screen."
	),
	array (
		"i" => "joy_menu_sec_exportar",
		"h" => $inline["en"]["export"],
		"t" => "You can save the contents of this section into a spreadsheet (csv file)"
	),
	array (
		"i" => "filter-form",
		"h" => $inline["en"]["Search"],
		"t" => "Use this form to narrow the results and search for more specific entries."
	),
	array (
		"i" => "joy_context_actions",
		"h" => "Item contextual menu",
		"t" => "These are the actions that you can perform to manage entries in the system."
	),
	array (
		"i" => "joy_form_rtf",
		"h" => "Text editor",
		"t" => "Allows you to use rich text when writing content for the site. How to: select a segment of text and then click one of these buttons to add styles to it. This will add html code to the text saving you the time of doing it manually."
	)
);

// errores
$error["en"]["usrpsw"]="The login information you submited does not correspond to a valid user.";
$error["en"]["allobli"]="All fields are required.";
$error["en"]["oneobli"]="El campo <strong>[:x:]</strong> es obligatorio"; // [:x:] marca texto a reemplazar
$error["en"]["timeout"]="You sessions has expired, please login again.";
$error["en"]["tryagain"]="There was an error, please try again";
$error["en"]["notenoughpermits"]="You are not authorized to perform this action.";
// fiel upload
$error["en"]["wrongformat"]="File type not suported. Try uploading JPEG, JPG, GIF, PNG or PDF files.";
$error["en"]["copyfilefail"]="The file could not be tranfered.";

// editor de texto
$rtf["en"]["Titulo"]="Title";
$rtf["en"]["subTitulo"]="Sub Title";
$rtf["en"]["Italic"]="Italic";
$rtf["en"]["Clear"]="Clear tags";
$rtf["en"]["Bold"]="Bold";
$rtf["en"]["hyperlink"]="Link";
$rtf["en"]["hyperlinkTo"]="Where should it point to?";
$rtf["en"]["hyperlinkTxt"]="How should it read?";
$rtf["en"]["hyperlinkAdd"]="Add link";
$rtf["en"]["hyperlinkCancel"]="Cancel";

// tips
$inline["en"]["Tips"]="Tips";
$tipsCargar["en"] = array (
	"The fields marked with (*) are required.",
);
$tipsEditar["en"] = array (
	"The fields marked with (*) are required.",
);

// texto pagina setup
$info["en"]["setup"]="This section us intended to create all necesary elements in the database for this system to run properly.";
$info["en"]["dataconfigstatus"]="Database configuration";
$info["en"]["tablacreada"]="Table created";
$info["en"]["errorcreatetable"]="Error: the table could not be created";
$info["en"]["tablaexiste"]="Table [:x:] status: is in database.";

// texto pagina listar
$info["en"]["show"]="Show";
?>