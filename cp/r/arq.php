<?

// arquitectura

/*
# p 		: nivel de permiso
# a			: acciones posibles
# t 		: texto a mostrar en pantallla
# db		: correspondencia en la base de datos
# type 		: tipo de elemento en formulario - drop / input / textarea / select
# menu		: como mostrar - menu principal (top) / menu contextual (context)
# get   	: espera un id que corresponde a la tabla definida por get
# val   	: tipo de valor ingresado - varchar / text / file / email / number / date / datetime
# force 	: campo obligatorio
# autofill 	: valor prederteminado
# hide		: mostrar en list o no - 0 (mostrar inline) / 1 (popup) / 2 (no mostrar)
# search	: define un campo como posible de buscar o no, not set = searchable - 1(si) / 0(no)
# rtf		: si muestra o no la barra de herramientas de edicion de textos sobre los campos teaxtarea - si / no
# dependency: poblar con los datos de a una tabla de la autogestion
# array		: poblar con los datos de un array definido en data.php
*/
$cpa = array (
	"cpa" => array (
		"t" => $inline[$lang]["cp"],
		"db"=> "cpa",
		"c" => array (
			"his" => array ("db" => "his", "menu" => "menu", "t" => $inline[$lang]["his"], "p" => 1),
			"setup" => array ("db" => "setup", "menu" => "menu", "t" => $inline[$lang]["setup"], "p" => 99),
		)
	)
);

$secciones=array(
"prueba" => array (
		"db" => "ag_prueba",
		"t" => "prueba",
		"l" => 0,
		"p" => 1,
		"a" => array (
			"listar" => array ( "db" => "listar", "menu" => "menu", "t" =>$inline[$lang]["listar"], "p" => 1),
			"editar" => array ( "db" => "editar", "menu" => "context", "t" =>$inline[$lang]["editar"], "p" => 1),
			"delete" => array ( "db" => "delete", "menu" => "context", "t" =>$inline[$lang]["delete"], "p" => 1),
			"cargar" => array ( "db" => "cargar", "menu" => "menu", "t" =>$inline[$lang]["cargar"], "p" => 1),
			"export" => array ( "db" => "export", "menu" => "menu", "t" =>$inline[$lang]["export"], "p" => 99),
			"medias" => array ( "db" => "medias", "menu" => "context", "t" =>$inline[$lang]["medias"], "p" => 1)
		),
		"c" => array (
			"mostrar" => array("db" => "mostrar", "t" => $inline[$lang]["visibility"], "val" => "number", "type" => "check",
						  "options" => array (1 => $inline[$lang]["Show"], 0 => $inline[$lang]["NoShow"])
					),
			"img" => array ( "db" => "imagen", "t" => $inline[$lang]["File"], "type" => "img", "dependency" =>"med", "val" => "file", "search" => 0, "hide"=>2,
					"imgsizes" => array (
						"thumb" => array ( "w" => 200, "h" => 200),
						"grande" => array ( "w" => 300, "h" => "auto")
					)
				)
		)
	),

	
	"marcas" => array (
		"db" => "ag_marcas",
		"t" => "Marcas",
		"l" => 0,
		"p" => 1,
		"a" => array (
			"listar" => array ( "db" => "listar", "menu" => "menu", "t" =>$inline[$lang]["listar"], "p" => 1),
			"editar" => array ( "db" => "editar", "menu" => "context", "t" =>$inline[$lang]["editar"], "p" => 1),
			"delete" => array ( "db" => "delete", "menu" => "context", "t" =>$inline[$lang]["delete"], "p" => 1),
			"cargar" => array ( "db" => "cargar", "menu" => "menu", "t" =>$inline[$lang]["cargar"], "p" => 1),
			"export" => array ( "db" => "export", "menu" => "menu", "t" =>$inline[$lang]["export"], "p" => 99),
			"medias" => array ( "db" => "medias", "menu" => "context", "t" =>$inline[$lang]["medias"], "p" => 1)
		),
		"c" => array (
			"nombre" 	=> array("db" => "nombre", "t" => "Nombre", "type" => "input", "val" => "varchar", "force" => 1, "search" => 1),
			"creada" 	=> array("db" => "creada", "t" => $inline[$lang]["created"], "type" => "input", "val" => "datetime", "search" => 1, "hide" =>2, "autofill" =>$ahora),
			"precio" 	=> array("db" => "precioM", "t" => "Precio Marca", "type" => "input", "val" => "number", "force" => 1, "search" => 1),
			"mostrar" => array("db" => "mostrar", "t" => $inline[$lang]["visibility"], "val" => "number", "type" => "check",
						  "options" => array (1 => $inline[$lang]["Show"], 0 => $inline[$lang]["NoShow"])
					),
			"img" => array ( "db" => "imagen", "t" => $inline[$lang]["File"], "type" => "img", "dependency" =>"med", "val" => "file", "search" => 0, "hide"=>2,
					"imgsizes" => array (
						"thumb" => array ( "w" => 200, "h" => 200),
						"grande" => array ( "w" => 300, "h" => "auto")
					)
				)
		)
	),
	
		
	"carrier" => array (
		"db" => "ag_carrier",
		"t" => "Carrier",
		"l" => 0,
		"p" => 1,
		"a" => array (
			"listar" => array ( "db" => "listar", "menu" => "menu", "t" =>$inline[$lang]["listar"], "p" => 1),
			"editar" => array ( "db" => "editar", "menu" => "context", "t" =>$inline[$lang]["editar"], "p" => 1),
			"delete" => array ( "db" => "delete", "menu" => "context", "t" =>$inline[$lang]["delete"], "p" => 1),
			"cargar" => array ( "db" => "cargar", "menu" => "menu", "t" =>$inline[$lang]["cargar"], "p" => 1),
			"export" => array ( "db" => "export", "menu" => "menu", "t" =>$inline[$lang]["export"], "p" => 99),
			"medias" => array ( "db" => "medias", "menu" => "context", "t" =>$inline[$lang]["medias"], "p" => 1)
		),
		"c" => array (
			"nombre" 	=> array("db" => "nombre", "t" => "Nombre", 								 "type" => "input", "val" => "varchar", "force" => 1, "search" => 1),
			"creada" 	=> array("db" => "creada", "t" => $inline[$lang]["created"], "type" => "input", "val" => "datetime", "search" => 1, "hide" =>2, "autofill" =>$ahora),
			"pais" 		=> array("db" => "pais", 	"t" => "Pais", 									 "type" => "select", "val" => "varchar", "force" => 1, "search" => 1,
									"options" => array ("Argentina", "Estados Unidos")
						),
			"mostrar" => array("db" => "mostrar","t" => $inline[$lang]["visibility"], "val" => "number", "type" => "select",
						  "options" => array (1 => $inline[$lang]["Show"], 0 => $inline[$lang]["NoShow"])
					),
			"img" => array ( "db" => "imagen", "t" => $inline[$lang]["File"], "type" => "img", "dependency" =>"med", "val" => "file", "search" => 0, "hide"=>2,
					"imgsizes" => array (
						"thumb" => array ( "w" => 200, "h" => 200),
						"grande" => array ( "w" => 300, "h" => "auto")
					)
				)
		)
	),
	
	"telefono" => array (
		"db" => "ag_telefono",
		"t" => "Telefonos",
		"l" => 0,
		"p" => 1,
		"a" => array (
			"listar" => array ( "db" => "listar", "menu" => "menu", "t" =>$inline[$lang]["listar"], "p" => 1),
			"editar" => array ( "db" => "editar", "menu" => "context", "t" =>$inline[$lang]["editar"], "p" => 1),
			"delete" => array ( "db" => "delete", "menu" => "context", "t" =>$inline[$lang]["delete"], "p" => 1),
			"cargar" => array ( "db" => "cargar", "menu" => "menu", "t" =>$inline[$lang]["cargar"], "p" => 1),
			"export" => array ( "db" => "export", "menu" => "menu", "t" =>$inline[$lang]["export"], "p" => 99),
			"medias" => array ( "db" => "medias", "menu" => "context", "t" =>$inline[$lang]["medias"], "p" => 1)
		),
		"c" => array (
			"modelo" 	=> array("db" => "modelo", "t" => "Modelo", "type" => "input", "val" => "varchar", "force" => 1, "search" => 1),
			"creada" 	=> array("db" => "creada", "t" => $inline[$lang]["created"], "type" => "input", "val" => "datetime", "search" => 1, "hide" =>2, "autofill" =>$ahora),
			"precio" 	=> array("db" => "precioT", "t" => "Precio Telefono", "type" => "input", "val" => "number", "search" => 1, "dependency" =>"carrier"),
			"marcaid" => array ("db" => "marcaid", "t" => "Marca", "type" => "drop", "val" => "number", "force" => 1, "search" => 0, "get" => "marcas"),
			"mostrar" => array("db" => "mostrar", "t" => $inline[$lang]["visibility"], "val" => "number", "type" => "select",
						  "options" => array (1 => $inline[$lang]["Show"], 0 => $inline[$lang]["NoShow"])
					),
			"img" => array ( "db" => "imagen", "t" => $inline[$lang]["File"], "type" => "img", "dependency" =>"med", "val" => "file", "search" => 0, "hide"=>2,
					"imgsizes" => array (
						"thumb" => array ( "w" => 200, "h" => 200),
						"grande" => array ( "w" => 300, "h" => "auto")
					)
				)
		)
	),

	"pedidos" => array (
		"db" => "ag_pedido",
		"t" => "Pedidos",
		"l" => 0,
		"p" => 1,
		"a" => array (
			"listar" => array ( "db" => "listar", "menu" => "menu", "t" =>$inline[$lang]["listar"], "p" => 1),
			"editar" => array ( "db" => "editar", "menu" => "context", "t" =>$inline[$lang]["editar"], "p" => 1),
			"delete" => array ( "db" => "delete", "menu" => "context", "t" =>$inline[$lang]["delete"], "p" => 1),
			/*"cargar" => array ( "db" => "cargar", "menu" => "menu", "t" =>$inline[$lang]["cargar"], "p" => 1),*/
			"export" => array ( "db" => "export", "menu" => "menu", "t" =>$inline[$lang]["export"], "p" => 99),
			"medias" => array ( "db" => "medias", "menu" => "context", "t" =>$inline[$lang]["medias"], "p" => 1)
		),
		"c" => array (
			"payment" 	=> array("db" => "payment", "t" => "Forma de pago", "val" => "varchar", "search" => 0),
			"creada" 	=> array("db" => "creada", "t" => $inline[$lang]["created"], "type" => "input", "val" => "datetime", "search" => 0, "hide" =>2, "autofill" =>$ahora),
			"imei" 	=> array("db" => "imei", "t" => "IMEI", "val" => "varchar", "search" => 1),
			"codigo" 	=> array("db" => "codigo", "t" => "Codigo", "val" => "varchar", "search" => 1),
			"email" 	=> array("db" => "email", "t" => "Email", "val" => "email", "search" => 1),
			"idtelefono" 	=> array("db" => "idtelefono", "t" => "Telefono", "val" => "varchar", "search" => 0),
			"idcarrier" 	=> array("db" => "idcarrier", "t" => "Carrier", "val" => "varchar", "search" => 0),
		)
	),
	"precios" => array (
		"db" => "ag_preciosXcarrier",
		"t" => "Precios por Carrier",
		"l" => 0,
		"p" => 1,
		"a" => array (
			"listar" => array ( "db" => "listar", "menu" => "menu", "t" =>$inline[$lang]["listar"], "p" => 1),
			"editar" => array ( "db" => "editar", "menu" => "context", "t" =>$inline[$lang]["editar"], "p" => 1),
			"delete" => array ( "db" => "delete", "menu" => "context", "t" =>$inline[$lang]["delete"], "p" => 1),
			"cargar" => array ( "db" => "cargar", "menu" => "menu", "t" =>$inline[$lang]["cargar"], "p" => 1),
			"export" => array ( "db" => "export", "menu" => "menu", "t" =>$inline[$lang]["export"], "p" => 99),
			"medias" => array ( "db" => "medias", "menu" => "context", "t" =>$inline[$lang]["medias"], "p" => 1)
		),
		"c" => array (
			"telefonoid" => array ("db" => "telefonoid", "t" => "Telefono", "type" => "drop", "val" => "number", "force" => 1, "search" => 0, "get" => "telefono"),
			"carrierid" => array ("db" => "carrierid", "t" => "Carrier", "type" => "drop", "val" => "number", "force" => 1, "search" => 0, "get" => "carrier"),
			"precioC" 	=> array("db" => "precioC", "t" => "Precio Carrier", "type" => "input", "val" => "number", "search" => 1),
			"mostrar" => array("db" => "mostrar", "t" => $inline[$lang]["visibility"], "val" => "number", "type" => "select",
						  "options" => array (1 => $inline[$lang]["Show"], 0 => $inline[$lang]["NoShow"])
					),
			
		)
	),
	/*novedades*/
	/*
	"novedades" => array (
		"db" => "ag_novedades",
		"t" => "Novedades",
		"l" => 0,
		"p" => 1,
		"a" => array (
			"listar" => array ( "db" => "listar", "menu" => "menu", "t" =>$inline[$lang]["listar"], "p" => 1),
			"editar" => array ( "db" => "editar", "menu" => "context", "t" =>$inline[$lang]["editar"], "p" => 1),
			"delete" => array ( "db" => "delete", "menu" => "context", "t" =>$inline[$lang]["delete"], "p" => 1),
			"cargar" => array ( "db" => "cargar", "menu" => "menu", "t" =>$inline[$lang]["cargar"], "p" => 1),
			"export" => array ( "db" => "export", "menu" => "menu", "t" =>$inline[$lang]["export"], "p" => 99),
			"medias" => array ( "db" => "medias", "menu" => "context", "t" =>$inline[$lang]["medias"], "p" => 1)
		),
		"c" => array (
			"titulo" => array( "db" => "titulo", "t" => "titulo", "type" => "input", "val" => "varchar", "force" => 1, "search" => 1),
			"desde" => array ("db" => "creada", "t" => $inline[$lang]["created"], "type" => "input", "val" => "date", "force" => 1, "search" => 1,  "autofill" =>$hoy),
			"hasta" => array ("db" => "hasta", "t" => $inline[$lang]["hasta"], "type" => "input", "val" => "date", "force" => 1, "search" => 1),
			"desc" => array ("db" => "desc", "t" => $inline[$lang]["desc"], "type" => "textarea", "val" => "text", "force" => 1, "search" => 0),
			"rubroid" => array ("db" => "rubroid", "t" => "Rubro", "type" => "drop", "val" => "number", "force" => 1, "search" => 0, "get" => "Rubros"),
			"mostrar" => array ( "db" => "mostrar", "t" => $inline[$lang]["visibility"], "val" => "number", "type" => "select", 
					"options" => array (1 => $inline[$lang]["Show"], 0 => $inline[$lang]["NoShow"])
					),
			"img" => array ( "db" => "imagen", "t" => $inline[$lang]["File"], "type" => "img", "dependency" =>"med", "val" => "file", "search" => 0,"hide" => 2,
					"imgsizes" => array (
						"thumb" => array ( "w" => 200, "h" => 200),
						"grande" => array ( "w" => 600, "h" => "auto")
					)
				)
		)
	),
	*/
	/*Rubros*/
	/*"Rubros" => array (
		"db" => "ag_rubros",
		"t" => "Rubros",
		"l" => 0,
		"p" => 1,
		"a" => array (
			"listar" => array ( "db" => "listar", "menu" => "menu", "t" =>$inline[$lang]["listar"], "p" => 1),
			"editar" => array ( "db" => "editar", "menu" => "context", "t" =>$inline[$lang]["editar"], "p" => 1),
			"delete" => array ( "db" => "delete", "menu" => "context", "t" =>$inline[$lang]["delete"], "p" => 1),
			"cargar" => array ( "db" => "cargar", "menu" => "menu", "t" =>$inline[$lang]["cargar"], "p" => 1),
			"export" => array ( "db" => "export", "menu" => "menu", "t" =>$inline[$lang]["export"], "p" => 99),
			"medias" => array ( "db" => "medias", "menu" => "context", "t" =>$inline[$lang]["medias"], "p" => 1)
		),
		"c" => array (
			"nombre" => array( "db" => "nombre", "t" => "Nomre del Rubro", "type" => "input", "val" => "varchar", "force" => 1, "search" => 1),
			"desc" => array ("db" => "desc", "t" => $inline[$lang]["desc"], "type" => "textarea", "val" => "text", "force" => 1, "search" => 0),
			"mostrar" => array ( "db" => "mostrar", "t" => $inline[$lang]["visibility"], "val" => "number", "type" => "select", 
					"options" => array (1 => $inline[$lang]["Show"], 0 => $inline[$lang]["NoShow"])
					),
			
			"img" => array ( "db" => "imagen", "t" => $inline[$lang]["File"], "type" => "img", "dependency" =>"med", "val" => "file", "search" => 0,"hide" => 2,"force" => 1,
					"imgsizes" => array (
						"thumb" => array ( "w" => 200, "h" => 360),
						"grande" => array ( "w" => 600, "h" => "auto")
					)
				)
		)
	),*/
	/*NEWS*/
	
	
	
	
	
	
	
	
	// required
	"med" => array (
		"db" => "ag_media",
		"t" => $inline[$lang]["media"],
		"l" => 1,
		"p" => 1,
		"a" => array (
			"listar" => array ( "db" => "listar", "menu" => "menu", "t" =>$inline[$lang]["listar"], "p" => 1),
			"editar" => array ( "db" => "editar", "menu" => "context", "t" =>$inline[$lang]["editar"], "p" => 1),
			"delete" => array ( "db" => "delete", "menu" => "context", "t" =>$inline[$lang]["delete"], "p" => 1),
			"cargar" => array ( "db" => "cargar", "menu" => "menu", "t" =>$inline[$lang]["cargar"], "p" => 1),
			"export" => array ( "db" => "export", "menu" => "menu", "t" =>$inline[$lang]["export"], "p" => 1)
		),
		"c" => array (
			"titulo" => array( "db" => "titulo", "t" => $inline[$lang]["title"], "type" => "input", "val" => "varchar", "force" => 1, "search" => 1),
			"descripcion" => array ("db" => "descripcion", "t" => $inline[$lang]["desc"], "type" => "textarea", "val" => "text", "search" => 1),
			"creada" => array ("db" => "creada", "t" => $inline[$lang]["created"], "type" => "input", "val" => "datetime", "force" => 1, "search" => 1, "hide" =>2, "autofill" =>$ahora),
			"url" => array ("db" => "url", "t" => $inline[$lang]["File"], "type" => "img", "val" => "file", "force" => 1, "search" => 0), 
			"dep_table" => array ("db" => "dep_table", "t" => $inline[$lang]["uploadto"], "type" => "input", "val" => "varchar", "force" => 1, "search" => 1, "hide" =>2), 
			"dep_id" => array ("db" => "dep_id", "t" => $inline[$lang]["asignto"], "type" => "input", "val" => "number", "force" => 1, "search" => 1, "hide" =>2), 
			"type" => array ("db" => "type", "t" => $inline[$lang]["type"], "type" => "input", "val" => "varchar", "search" => 1, "hide" => 2),
			"mostrar" => array ( "db" => "mostrar", "t" => $inline[$lang]["visibility"], "type" => "select", "val" => "number", 
							  "options" => array (1 => $inline[$lang]["Show"], 0 => $inline[$lang]["NoShow"])
							)
		)
	),
	"his" => array (
		"db" => "historial",
		"t" => "Historial",
		"p" => 1,
		"a" => array ( 
			"listar" => array ( "db" => "listar", "menu" => "menu", "t" =>$inline[$lang]["listar"], "p" => 1),
			"editar" => array ( "db" => "editar", "menu" => "context", "t" =>$inline[$lang]["editar"], "p" => 99),
			"delete" => array ( "db" => "delete", "menu" => "context", "t" =>$inline[$lang]["delete"], "p" => 99),
			"cargar" => array ( "db" => "cargar", "menu" => "menu", "t" =>$inline[$lang]["cargar"], "p" => 99),
			"export" => array ( "db" => "export", "menu" => "menu", "t" =>$inline[$lang]["export"], "p" => 99)
			),
		"c" => array(
			"quien" => array ( "db" => "quien", "t" => $inline[$lang]["nombre"], "type" => "drop", "val" => "number", "get" => "adm", "search" => 1),
			"accion" => array ( "db" => "accion", "t" => $inline[$lang]["Accion"], "type" => "input", "val" => "varchar", "search" => 1),
			"codigo" => array ( "db" => "codigo", "t" => $inline[$lang]["Codigo"], "type" => "textarea", "val" => "codigo", "hide" => 2),
			"fechahora"  => array ( "db" => "fechahora", "t" => $inline[$lang]["Datetime"], "type" => "input", "val" => "datetime", "search" => 1)
		)
	),
	"adm" => array (
		"db" => "ag_admins",
		"t" => "Admins",
		"p" => 99,
		"a" => array ( 
			"listar" => array ( "db" => "listar", "menu" => "menu", "t" =>$inline[$lang]["listar"], "p" => 99),
			"editar" => array ( "db" => "editar", "menu" => "context", "t" =>$inline[$lang]["editar"], "p" => 99),
			"delete" => array ( "db" => "delete", "menu" => "context", "t" =>$inline[$lang]["delete"], "p" => 99),
			"cargar" => array ( "db" => "cargar", "menu" => "menu", "t" =>$inline[$lang]["cargar"], "p" => 2),
			"export" => array ( "db" => "export", "menu" => "menu", "t" =>$inline[$lang]["export"], "p" => 99)
			),
		// 	usr	psw	email	level
		"c" => array (
			"usr" => array ( "db" => "usr", "t" => $inline[$lang]["Username"], "type" => "input", "val" => "varchar", "force" => "1"),
			"psw" => array ( "db" => "psw", "t" => $inline[$lang]["Password"], "type" => "password", "val" => "varchar", "force" => "1", "search" => 0),
			"email" => array ( "db" => "email", "t" => $inline[$lang]["Email"], "type" => "input", "val" => "email"),
			"level" => array ( "db" => "level", "t" => $inline[$lang]["Level"], "type" => "select", "val" => "number", "force" => "1", 	
					"options" => array (1 => "Admin",2 => "Full Admin")
				  )
		)
	)
	
	
);
?>