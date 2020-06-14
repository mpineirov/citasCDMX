<p align="center">
<img src="https://www.semovi.cdmx.gob.mx/themes/base/assets/images/logos/Logo_CDMX.png" width="400"></p>

## SEMOVI OBJETIVO
Regular, programar, orientar, organizar, controlar, aprobar y, en su caso, modificar, la presentación de los servicios público, mercantil y privado de transporte de pasajeros y de carga en la Ciudad de México, conforme a lo establecido en la Ley y demás disposiciones jurídicas y administrativas aplicables; así como también, a las necesidades de movilidad de la Ciudad, procurando la preservación del medio ambiente y la seguridad de los usuarios del sistema de movilidad.


## SISTEMA DE CITAS

Este sistema tiene como objetivo realizar citas para generar trámites de reposición y renovación de Tarjetas de Circulación de los vehículos a gasolina de la Ciudad de México, con los siguientes módulos de atención de control vehicular:

- Oficina Central Insurgentes
- Módulo Móvil 30
- Módulo Móvil 18


## Requerimientos funcionales

1. Las citas sólo pueden generarse en días hábiles
2. CURP de un ciudadano no puede generar más de 1 cita por semana
3. Los trámites que puede realizar son:
  - Alta 
  - Baja
  - Cambio de Propietario
  - Cambio de Domicilio
  - Cambio de Motor
  - Reposición de Tarjeta de Circulación  
  - Renovación de Tarjeta de Circulación
4. Las citas inician desde las 9 am hasta las 3pm con una diferencia de 15 minutos entre cita y cita
5. El sistema tiene vista al ciudadano y una vista de revisor para ver las citas (ponerlas en estatus usada o no se presento con el id de la cita)


## Requerimientos no funcionales
1. PHP
2. MYSQL
3. LARAVEL 