<?php
include 'conexion_nutricion.php';

if (isset($_GET["objetivo"]) && isset($_GET["intolerancia_lactosa"]) && isset($_GET["intolerancia_gluten"]) && isset($_GET["tipo_dieta"]) && isset($_GET["categoria"])) {
    $objetivo = $_GET["objetivo"];
    $intolerancia_lactosa = $_GET["intolerancia_lactosa"];
    $intolerancia_gluten = $_GET["intolerancia_gluten"];
    $tipo_dieta = $_GET["tipo_dieta"];
    $categoria = $_GET["categoria"];

    $query = "SELECT * FROM alimentos WHERE objetivo_id = ? AND categoria = ?";

    if ($intolerancia_lactosa == 1) {
        $query .= " AND tiene_lactosa = 0";
    }
    if ($intolerancia_gluten == 1) {
        $query .= " AND tiene_gluten = 0";
    }
    if ($tipo_dieta != 'sin_particularidades') {
        $query .= " AND tipo_dieta = ?";
    }

    $stmt = mysqli_prepare($conexion_nutricion, $query);

    if ($stmt) {
        if ($tipo_dieta == 'sin_particularidades') {
            mysqli_stmt_bind_param($stmt, "is", $objetivo, $categoria);
        } else {
            mysqli_stmt_bind_param($stmt, "iss", $objetivo, $categoria, $tipo_dieta);
        }
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $alimentos = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $imagen = '../imgs/' . strtolower(str_replace(' ', '_', $row['nombre'])) . '.jpg';
            $hover_text = '';
            switch ($row['nombre']) {
                case 'Hummus':
                    $imagen = '../imgs/hummus2.jpg';
                    $hover_text = 'Buena opción en dietas de volumen veganas y vegetarianas';
                    break;
                case 'Queso fresco':
                    $imagen = '../imgs/queso_fresco.jpg';
                    $hover_text = 'Ideal para agregar proteína en tus ensaladas';
                    break;
                case 'Maíz dulce':
                    $imagen = '../imgs/maiz.png';
                    $hover_text = 'Fuente de vitaminas y minerales';
                    break;
                    case 'Mazorca de maíz':
                        $imagen = '../imgs/mazorca.png';
                        $hover_text = 'Más saciante que comer el maíz suelto';
                        break;
                case 'Gelatina 0% azúcar sabor fresa':
                    $imagen = '../imgs/gelatina.jpg';
                    $hover_text = 'Buena opción en fase de definición si tienes antojo de dulce, debido a su poco aporte calórico';
                    break;
                    case 'Tofu':
                        $imagen = '../imgs/tofu.png';
                        $hover_text = 'Buena alternativa para añadir proteína vegetal';
                        break;
                        case 'Seitán':
                            $imagen = '../imgs/seitan.png';
                            $hover_text = 'Buena alternativa para añadir proteína vegetal';
                            break;
                case 'Crema de cacahuete 100%':
                    $imagen = '../imgs/c_cacahuete.jpg';
                    $hover_text = 'Más fácil de consumir que los frutos secos enteros, ideal para volumen muscular, ya que no produce tanta saciedad';
                    break;
                case 'Natillas proteicas':
                    $imagen = '../imgs/natillas.jpg';
                    $hover_text = 'Buena opción como postre, puedes agregar canela para realzar su sabor';
                    break;
                case 'Claras de huevo':
                    $imagen = '../imgs/clara.jpg';
                    $hover_text = 'Proteína de alto valor biológico';
                    break;
                case 'Yogur griego natural':
                    $imagen = '../imgs/yogur_griego.jpg';
                    $hover_text = 'En comparación con el yogur natural regular, suele contener más grasa, debido al proceso de filtrado utilizado en su producción';
                    break;
                case 'Pan de fibra y sésamo':
                    $imagen = '../imgs/pan_fibra.jpg';
                    $hover_text = 'Las semillas de sésamo son una fuente rica de ácidos grasos esenciales';
                    break;
                case 'Cereal Mix':
                    $imagen = '../imgs/cereales_mix.jpg';
                    $hover_text = 'Esta combinación de cereales son ideales para aportar hidratos de carbono de bajo índice glucémico';
                    break;
                case 'Crema de arroz':
                    $imagen = '../imgs/crema_arroz.jpg';
                    $hover_text = 'La glucosa que aporta este alimento se almacena en nuestros músculos para tener fuerza a la hora de entrenar';
                    break;
                case 'Porciones de Chocolate negro 85%':
                    $imagen = '../imgs/chocolatina_85.webp';
                    $hover_text = 'Excelente fuente de antioxidantes y puede ayudar a reducir los antojos de dulce';
                    break;
                case 'Queso Quark':
                    $imagen = '../imgs/queso_quark.webp';
                    $hover_text = 'Rico en proteínas y bajo en grasa, ideal para dietas de pérdida de grasa';
                    break;
                case 'Helado de proteína':
                    $imagen = '../imgs/helado_lidl.webp';
                    $hover_text = 'Delicioso helado proteico, perfecto para disfrutar sin remordimientos';
                    break;
                case 'Helado +Proteínas':
                    $imagen = '../imgs/helado_merca.jpg';
                    $hover_text = 'Helado proteico sabor plátano con trozos de brownie, ideal para ganar masa muscular';
                    break;
                case 'Ketchup zero':
                    $imagen = '../imgs/ketchup.jpg';
                    $hover_text = 'Ketchup sin azúcares añadidos, perfecto para dietas de pérdida de grasa';
                    break;
                case 'Copos de avena suaves':
                    $imagen = '../imgs/copos.webp';
                    $hover_text = 'Fuente excelente de carbohidratos de liberación lenta';
                    break;
                case 'Arroz basmati':
                    $imagen = '../imgs/basmati.jpg';
                    $hover_text = 'Arroz aromático ideal para acompañar tus comidas';
                    break;
                case 'Caldo de pollo casero':
                    $imagen = '../imgs/caldo_pollo.jpg';
                    $hover_text = 'Caldo casero, perfecto para añadir sabor a tus platos';
                    break;
                case 'Castañas cocidas':
                    $imagen = '../imgs/castañas.jpg';
                    $hover_text = 'Ricas en fibra y carbohidratos, perfectas para la pérdida de grasa';
                    break;
                case 'Anacardo natural':
                    $imagen = '../imgs/anacardo.jpg';
                    $hover_text = 'Fuente rica en grasas saludables';
                    break;
                case 'Tortitas de arroz':
                    $imagen = '../imgs/tortitas_arroz.png';
                    $hover_text = 'Perfectas como snack saludable y bajo en calorías';
                    break;
                case 'Maíz palomitas':
                    $imagen = '../imgs/palomitas.png';
                    $hover_text = 'Ideal para preparar palomitas caseras saludables';
                    break;
                case 'Confitura de fresa 0%':
                    $imagen = '../imgs/confitura.png';
                    $hover_text = 'Confitura sin azúcares añadidos, perfecta para dietas de pérdida de grasa';
                    break;
                case 'Atún claro al natural':
                    $imagen = '../imgs/atun.png';
                    $hover_text = 'Rico en proteínas y bajo en grasas, ideal para ganar masa muscular';
                    break;
                case 'Salmón ahumado':
                    $imagen = '../imgs/salmon.png';
                    $hover_text = 'Fuente excelente de omega-3 y proteínas';
                    break;
                case 'Cacahuete en polvo desgrasado':
                    $imagen = '../imgs/cacahuete_polvo.png';
                    $hover_text = 'Rico en proteínas y bajo en grasas, ideal para dietas de pérdida de grasa';
                    break;
                case 'Spray de aceite de oliva':
                    $imagen = '../imgs/aceite_spray.webp';
                    $hover_text = 'Aceite de oliva virgen extra en spray, perfecto para controlar la cantidad de grasa añadida';
                    break;
                case 'Edamame soja verde':
                    $imagen = '../imgs/edamame.jpg';
                    $hover_text = 'Rico en proteínas y fibra, ideal para snacks saludables';
                    break;
                case 'Batido de chocolate 0%':
                    $imagen = '../imgs/batido.png';
                    $hover_text = 'Delicioso batido de chocolate sin azúcares añadidos, ideal para dietas de pérdida de grasa';
                    break;
                default:
                    $imagen = '../imgs/default.jpg';
                    $hover_text = 'Detalles adicionales';
                    break;
            }
            
            $alimento = array(
                'nombre' => $row['nombre'],
                'descripcion' => $row['descripcion'],
                'precio' => $row['precio'],
                'marca' => $row['marca'],
                'imagen' => $imagen,
                'hover_text' => $hover_text
            );
            $alimentos[] = $alimento;
        }

        echo json_encode($alimentos);
        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(array('error' => mysqli_error($conexion_nutricion)));
    }
} else {
    echo json_encode(array('error' => 'No se proporcionó un objetivo, intolerancia o categoría.'));
}

mysqli_close($conexion_nutricion);
?>
