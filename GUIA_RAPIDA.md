# 🚀 Guía Rápida - Sistema de Gestión de Paquetes Turísticos

## 📋 Información General

**Proyecto:** American Andean Travel - Sistema de Gestión de Paquetes Turísticos
**Framework:** Laravel 12.16.0
**PHP:** 8.2
**Base de Datos:** MySQL (db_gestionpaquetes1)

---

## 🔐 Credenciales de Acceso

- **Email:** luis@correo.com
- **Contraseña:** 12345678

---

## 🖼️ Gestión de Imágenes

### Ubicación de las Imágenes
Todas las imágenes se guardan automáticamente en:
```
public/storage/
├── paquetes/       → Imágenes de paquetes turísticos
├── hoteles/        → Imágenes de hoteles
└── restaurantes/   → Imágenes de restaurantes
```

### ✅ Funcionamiento Automático
- Al **crear** o **editar** un registro con imagen, se guarda automáticamente en `public/storage/`
- Al **eliminar** un registro, la imagen asociada se borra automáticamente
- Al **actualizar** una imagen existente, la imagen anterior se elimina y se guarda la nueva
- **NO necesitas** preocuparte por enlaces simbólicos ni permisos

---

## 💰 Sistema de Precios (Soles S/)

Todo el sistema maneja moneda peruana (Soles):
- **Dashboard:** Muestra ingresos totales en S/
- **Reservas:** Precio total calculado automáticamente: `precio_paquete × num_personas`
- **Paquetes, Hoteles, Restaurantes:** Todos los precios en S/

---

## 📦 Módulos Principales

### 1. **Paquetes Turísticos**
- CRUD completo
- Precio, duración, destino, descripción
- Relaciones: Guías y Transportes (muchos a muchos)
- Imagen obligatoria para mejor presentación

### 2. **Reservas**
- Estado: pendiente, confirmada, cancelada
- **Estado de Pago:** pendiente, pagado (con badges de colores)
- **Precio Total:** Calculado automáticamente al guardar
- **Número de Personas:** Campo requerido (min: 1, max: 50)
- Fechas calculadas automáticamente según duración del paquete

### 3. **Clientes**
- Tipos de documento: DNI, Carnet, Pasaporte, PTP, Otro
- Email y teléfono únicos

### 4. **Guías**
- Especialidades, idiomas
- Relación muchos a muchos con paquetes

### 5. **Transportes**
- Tipos, capacidad, empresa
- Estado: activo, mantenimiento, inactivo

### 6. **Hoteles**
- Estrellas (1-5), precio por noche
- Servicios, capacidad
- Imagen opcional

### 7. **Restaurantes**
- Tipo de cocina, precio promedio
- Horarios, especialidades
- Imagen opcional

---

## 📊 Dashboard

El dashboard muestra:
- **Tarjetas Clickeables:** Clientes, Guías, Reservas, Ingresos
- **Últimas Reservas:** Tabla con estado de pago (badges)
- **Paquetes Más Populares:** Cards con imágenes y precios

---

## 🎨 Características de UI/UX

- ✅ Tema AdminLTE con Bootstrap 5
- ✅ Iconos Bootstrap Icons
- ✅ Tarjetas con efectos hover
- ✅ Badges de estado con colores (verde=pagado, rojo=pendiente)
- ✅ Navegación lateral con menú desplegable
- ✅ Branding "American Andean Travel"

---

## 📄 Sistema de Reportes PDF

Rutas disponibles:
- `/reportes/paquetes` → PDF de todos los paquetes
- `/reportes/clientes` → PDF de todos los clientes
- `/reportes/guias` → PDF de todas las guías
- `/reportes/transportes` → PDF de todos los transportes

---

## 🔄 Disponibilidad en Tiempo Real

Endpoints AJAX para verificar disponibilidad:
- `/reservas/disponibilidad-guia/{id}/{fecha}` → Verifica disponibilidad de guía
- `/reservas/disponibilidad-transporte/{id}/{fecha}` → Verifica disponibilidad de transporte

---

## 🗄️ Base de Datos

### Tablas Principales
1. `users` → Usuarios del sistema
2. `clientes` → Clientes registrados
3. `guias` → Guías turísticos
4. `transportes` → Medios de transporte
5. `paquetes` → Paquetes turísticos
6. `reservas` → Reservas de clientes
7. `opinions` → Opiniones de clientes
8. `hoteles` → Hoteles disponibles
9. `restaurantes` → Restaurantes asociados

### Tablas Pivot
- `guia_paquete` → Relación guías-paquetes
- `transporte_paquete` → Relación transportes-paquetes
- `hotel_paquete` → Relación hoteles-paquetes
- `paquete_restaurante` → Relación paquetes-restaurantes

---

## 🚀 Comandos Útiles

### Iniciar Servidor
```bash
php artisan serve
```

### Ejecutar Migraciones
```bash
php artisan migrate
```

### Ejecutar Seeder con Datos Completos
```bash
php artisan db:seed --class=DatosCompletosSeeder
```

### Limpiar Caché
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

---

## 📝 Datos de Prueba

El seeder `DatosCompletosSeeder` crea:
- ✅ 5 Clientes (con DNI y pasaporte)
- ✅ 3 Guías (especialidades variadas)
- ✅ 4 Transportes (Bus, Minivan, 4x4)
- ✅ 5 Paquetes (Machu Picchu, Valle Sagrado, Camino Inca, Lago Titicaca, Cañón del Colca)
- ✅ 5 Reservas (con precios calculados y estados variados)

---

## 🎯 Funcionalidades Clave

### Cálculo Automático de Precios
Al crear o editar una reserva:
1. Selecciona el paquete
2. Ingresa el número de personas
3. El sistema calcula automáticamente: `precio_total = precio_paquete × num_personas`
4. Las fechas se calculan automáticamente según la duración del paquete

### Estado de Pago
- **Pendiente:** Badge rojo con icono ❌
- **Pagado:** Badge verde con icono ✅

---

## 🛠️ Mantenimiento

### Agregar Nuevas Imágenes
1. Ve al módulo correspondiente (Paquetes, Hoteles, Restaurantes)
2. Clic en "Editar" o "Nuevo"
3. Selecciona la imagen (máx. 2MB)
4. Guarda - la imagen se almacena automáticamente

### Eliminar Imágenes Antiguas
Las imágenes se eliminan automáticamente al:
- Eliminar un registro
- Reemplazar una imagen existente

---

## 📞 Soporte

Para cualquier duda o problema, revisa:
- Logs de Laravel: `storage/logs/laravel.log`
- Errores de Base de Datos: Verifica migraciones con `php artisan migrate:status`

---

**✨ Sistema listo para usar - Todo configurado automáticamente ✨**
