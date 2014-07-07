<?
// acciones
$inline["es"]["listar"]="Administrar";
$inline["es"]["editar"]="Editar";
$inline["es"]["delete"]="Borrar";
$inline["es"]["cargar"]="Agregar";
$inline["es"]["export"]="Exportar";
$inline["es"]["medias"]="Subir";
$inline["es"]["download"]="Descargar";
$inline["es"]["Search"]="Buscar";
$inline["es"]["pages"]="Páginaas";
$str["es"]["upfoto"]="Agregar media"; // boton post crear elemento
$inline["es"]["media"]="Media";

// headers
$inline["es"]["viendo"]="Viendo: ";
$inline["es"]["permisos"]="Acciones Disponibles";
$inline["es"]["permisosBajadas"]="Eres moderador nivel [:x:], estas son las acciones que están habilitadas para tu cuenta:";
$inline["es"]["eliminado"]="Eliminado";
$inline["es"]["editado"]="Editado";
$inline["es"]["Bienvenido"]="Bienvenido";
$inline["es"]["login"]="Ingresar";
$inline["es"]["logout"]="Salir";

// forms
$inline["es"]["searchTerm"]="Ingrese su Busqueda";
$inline["es"]["search"]="Buscar";
$inline["es"]["title"]="Titulo";
$inline["es"]["nombre"]="Nombre";
$inline["es"]["desc"]="Descripcion";
$inline["es"]["created"]="Creado";
$inline["es"]["File"]="Archivo";
$inline["es"]["uploadto"]="Agregar a";
$inline["es"]["asignto"]="Asignar a";
$inline["es"]["Date"]="Fecha";
$inline["es"]["Datetime"]="Fecha y Hora";
$inline["es"]["Username"]="Usuario";
$inline["es"]["Password"]="Contraseña";
$inline["es"]["Email"]="Email";
$inline["es"]["Level"]="Nivel";
$inline["es"]["Accion"]="Accion";
$inline["es"]["Codigo"]="Codigo";
$inline["es"]["desde"]="Desde";
$inline["es"]["hasta"]="Hasta";
$inline["es"]["sindefinir"]="Sin Definir";
$inline["es"]["Elegir"]="Elegir: ";
$inline["es"]["type"]="Tipo De Archivo";
$inline["es"]["visibility"]="Visibilidad";
$inline["es"]["Show"]="Mostrar";
$inline["es"]["NoShow"]="No Mostrar";
$inline["es"]["private"]="Privado";
$inline["es"]["links"]="Enlaces";
$inline["es"]["default"]="Por defecto";
$inline["es"]["Yes"]="Si";
$inline["es"]["No"]="No";

// resultados busqueda
$inline["es"]["results"]="Resultados";
$inline["es"]["buscando"]="Buscando";
$inline["es"]["pagina"]="Pagina";
$inline["es"]["of"]="De";
$inline["es"]["noresults"]="No hay [:x:] para mostrar en este momento.";

// menues
$inline["es"]["menu"]="Menu";
$inline["es"]["his"]="Historial";
$inline["es"]["setup"]="Instalar";
$inline["es"]["salir"]="Salir";
$inline["es"]["goback"]="Atras";
$inline["es"]["cp"]="CP";

// contexturales
$str["es"]["cargado"]="Elemento agregado a: "; 			// texto on seccess submit formulario cargar
$str["es"]["nocargado"]="Error creando: "; 	// texto on fail submit formulario cargar
$str["es"]["unamas"]="Agregar otro";
$str["es"]["crear"]="Nuevo: ";

// joyride
$str["es"]["joytext"]="Ayuda";
$str["es"]["esotodo"]="Esto fue todo!";
$str["es"]["yacono"]="Ya conoces todos los elementos fundamentales de esta pantalla.";
$joy["es"] = array(
	array (
		"i" => "joy_menu_ver", // id del elemento html
		"h" => $inline["es"]["listar"], // titulo del tip
		"t" => "En esta seccion podes ver y administrar todos los registros agregados al sistema." // texto del tip
	),
	array (
		"i" => "joy_menu_cargar",
		"h" => $inline["es"]["cargar"],
		"t" => "Aca tenes acceso rapido para crear nuevo material."
	),
	array (
		"i" => "joy_contenido_permisos",
		"h" => $inline["es"]["permisos"],
		"t" => "Estas son las cosas que tenes permitido hacer."
	),
	array (
		"i" => "joy_menu_sec",
		"h" => "Menu Secundario",
		"t" => "Esta es una lista de las acciones que podes ejecutar en esta pantalla."
	),
	array (
		"i" => "joy_menu_sec_exportar",
		"h" => $inline["es"]["export"],
		"t" => "Podes guardar el contenido de esta seccion en una plantilla Excel (csv file)"
	),
	array (
		"i" => "filter-form",
		"h" => $inline["es"]["Search"],
		"t" => "Usa este formulario para filtrar los resultados y buscar mas espeficicamente."
	),
	array (
		"i" => "joy_context_actions",
		"h" => "Menu contextual",
		"t" => "Estas son las acciones que podes realizar para administrar las entradas del sistema."
	),
	array (
		"i" => "joy_form_rtf",
		"h" => "Text editor",
		"t" => "Te permite dar formato al texto cuando estas escribiendo el contenido del sitio. Por ejemplo: Selecciona un segmento de texto y hace click en uno de estos botones para agregarle estilo. Esto le va a agregar codigo html al texto para ahorrarte el tiempo de tener que hacerlo manualmente."
	)
);

// errores
$error["es"]["usrpsw"]="Los datos ingresados no corresponden a un usuario valido.";
$error["es"]["allobli"]="Todos los datos son necesarios.";
$error["es"]["oneobli"]="El campo <strong>[:x:]</strong> es obligatorio"; // [:x:] marca texto a reemplazar
$error["es"]["timeout"]="La sesion ha expirado, por favor vuelve a iniciar sesion.";
$error["es"]["tryagain"]="Hubo un error, por favor intenta de nuevo.";
$error["es"]["notenoughpermits"]="No tienes las credenciales para ejecutar esta accion.";
// fiel upload
$error["es"]["wrongformat"]="Tipo de archivo no soportado. Intenta subir archivos JPEG, JPG, GIF, PNG o PDF.";
$error["es"]["copyfilefail"]="El archivo no pudo ser transferido.";
$error["es"]["credenciales"]="Las credenciales de la cuenta con la que inició esta sessión ([:x:]) no le permiten completar esta acción.";

// editor de texto
$rtf["es"]["Titulo"]="Titulo";
$rtf["es"]["subTitulo"]="Sub Titulo";
$rtf["es"]["Italic"]="Italica";
$rtf["es"]["Clear"]="Limpiar formato";
$rtf["es"]["Bold"]="Negrita";
$rtf["es"]["hyperlink"]="Hipervinculo";
$rtf["es"]["hyperlinkTo"]="A donde debe apuntar?";
$rtf["es"]["hyperlinkTxt"]="How should it read?";
$rtf["es"]["hyperlinkAdd"]="Agregar Hipervinculo";
$rtf["es"]["hyperlinkCancel"]="Cancelar";

// tips
$inline["es"]["Tips"]="Tips";
$tipsCargar["es"] = array (
	"Los campos marcados con (*) son obligatorios.",
);
$tipsEditar["es"] = array (
	"Los campos marcados con (*) son obligatorios.",
);

// texto pagina setup
$info["es"]["setup"]="En esta seccion se crean todos los elementos necesarion en la base de datos para que el sistema funcione correctamente.";
$info["es"]["dataconfigstatus"]="Configuracion de la base de datos";
$info["es"]["tablacreada"]="Tabla creada";
$info["es"]["errorcreatetable"]="Error: La tabla no pudo ser creada";
$info["es"]["tablaexiste"]="Tabla [:x:] ya existe.";

// texto pagina listar
$info["es"]["show"]="Mostrar"; // hay dos shows linea 160 y 47
?>