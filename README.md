# Entidades y Campos para la Aplicación de Centro de Adopción de Mascotas

## Entidades y Campos

### 1. Mascota
- ID
- Nombre
- RazaID
- Tamaño
- Peso
- Edad
- Personalidad
- AdopciónID

### 2. Raza
- ID
- Nombre
- Descripción

### 3. Adopción
- ID
- MascotaID
- UserID
- FechaAdopción
- Estado

### 4. User
- ID
- Nombre
- Email
- ContactID
- VoluntariadoID

### 5. Contact
- ID
- Teléfono
- Email
- Dirección

### 6. Soporte (WhatsApp)
- ID
- UserID
- Mensaje
- Fecha

### 7. Entrada de Blog
- ID
- Título
- Contenido
- FechaPublicación
- AutorID

### 8. Donaciones y Apadrinamiento
- ID
- UserID
- MascotaID
- Monto
- Fecha
- Tipo

### 9. Voluntariado
- ID
- UserID
- Actividades
- Horas
- Fecha

### 10. Educación y Recursos
- ID
- Título
- Descripción
- Material

### 11. Historia
- ID
- MascotaID
- Fecha
- Descripción

### 12. Necesidad
- ID
- MascotaID
- Descripción

## Relaciones

- **Mascota y Raza**: Una mascota pertenece a una raza. (1 a 1)
- **Mascota y Adopción**: Una mascota puede ser adoptada una vez. (1 a 1)
- **User y Adopción**: Un usuario puede adoptar varias mascotas. (1 a muchos)
- **User y Contact**: Un usuario tiene un contacto. (1 a 1)
- **User y Soporte (WhatsApp)**: Un usuario puede tener varios mensajes de soporte. (1 a muchos)
- **User y Entrada de Blog**: Un usuario puede escribir varias entradas de blog. (1 a muchos)
- **User y Donaciones y Apadrinamiento**: Un usuario puede realizar varias donaciones o apadrinamientos. (1 a muchos)
- **Mascota y Donaciones y Apadrinamiento**: Una mascota puede ser apadrinada o recibir donaciones de varios usuarios. (1 a muchos)
- **User y Voluntariado**: Un usuario puede participar en varias actividades de voluntariado. (1 a muchos)
- **Mascota y Historia**: Una mascota puede tener múltiples historias. (1 a muchos)
- **Mascota y Necesidad**: Una mascota puede tener múltiples necesidades. (1 a muchos)