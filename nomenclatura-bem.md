# Nomenclatura BEM — Landing page EventPro

Convención usada en todo el proyecto: `bloque__elemento--modificador`, minúsculas, palabras separadas con un guion (`site-header`, no `siteHeader`).

## Bloques reutilizables (se usan en más de una sección)

Estos son los bloques que aparecen repetidos en distintas partes de la página. Se separaron como bloques independientes en vez de repetir estilos, siguiendo el tip de reutilización.

| Bloque | Dónde se usa | Por qué es un bloque aparte |
|---|---|---|
| `.btn` | Header, hero, pricing, contacto | El mismo botón cambia de color según el contexto (`--primary`, `--outline`, `--ghost`) pero su forma, padding y tipografía son siempre los mismos. |
| `.badge` | Hero (estado de evento), features (etiqueta "Lo más pedido"), pricing (etiqueta "Recomendado") | Es la misma píldora de texto en tres secciones distintas; solo cambia el color con `--accent`. |
| `.logo` | Header y footer | Mismo logo, pero sobre fondo claro en el header y fondo oscuro en el footer (`--on-dark`). |
| `.section-heading` | Features, testimonios, pricing | Título + subtítulo centrado se repite igual en tres secciones; solo cambia el color del título cuando el fondo es de color (`--on-tint`). |
| `.field` | Formulario de contacto | Cada campo (nombre, correo, mensaje) repite la misma estructura de etiqueta + input + mensaje de error. |

## Bloques de sección (uno por cada parte de la página)

- `.site-header` → `__inner`, con los bloques `.logo` y `.nav` adentro.
- `.nav` → `__list`, `__item`, `__link` (modificador `--active` para la página actual).
- `.hero` → `__backdrop`, `__pattern`, `__inner`, `__content`, `__title`, `__subtitle`, `__actions`, `__visual`, `__panel` (con `__panel-header`, `__panel-list`, `__panel-row`, modificador `--blocked`), `__stat`.
- `.features` → `__grid`. El bloque `.feature-card` vive adentro, con `__icon`, `__title`, `__description`, `__tag`, y el modificador `--highlight` para la característica principal.
- `.testimonials` → `__grid`. El bloque `.testimonial-card` vive adentro, con `__quote`, `__footer`, `__avatar`, `__identity`, `__name`, `__role`, y el modificador `--highlight` para el testimonio destacado.
- `.pricing` → `__grid`. El bloque `.pricing-card` vive adentro, con `__name`, `__price`, `__amount`, `__period`, `__description`, `__features`, `__feature`, `__tag`, y el modificador `--featured` para el plan recomendado.
- `.contact` → `__inner`, `__intro`, `__title`, `__text`. El formulario es su propio bloque `.contact-form`, con `__row` y `__actions`.
- `.site-footer` → `__inner`, `__brand`, `__tagline`, `__nav`, `__contact`, `__social`, `__heading`, `__link`, `__bottom`, `__copy`. El bloque `.social-list` vive adentro con `__item` y `__link`.

## Decisiones de nomenclatura

- **`feature-card`, `testimonial-card` y `pricing-card` son bloques separados**, no `card__feature`, `card__testimonial`, etc. Aunque visualmente los tres son "tarjetas", cada uno tiene su propia estructura interna de elementos (una tarjeta de precio no tiene avatar, una de testimonio no tiene lista de características), así que mezclarlos bajo un solo bloque `card` hubiera obligado a usar elementos que no aplican en todos los contextos.
- **`--highlight` vs `--featured`**: se usó `--highlight` cuando la variación destaca una tarjeta *entre otras iguales* (feature-card, testimonial-card), y `--featured` cuando además esa tarjeta es la opción recomendada por el negocio (pricing-card). Es la misma idea de "destacado", pero se documentó distinto porque en precios conlleva una decisión comercial (plan recomendado), no solo visual.
- **`site-header` y `site-footer`** (y no `header`/`footer` a secas) para que el nombre del bloque no choque con las etiquetas HTML `<header>` y `<footer>`, y quede claro en el CSS que se trata del encabezado/pie de *todo el sitio*.
- **El formulario es `contact-form`, no `contact__form`**: un formulario de contacto podría reutilizarse en otra página sin la sección `contact` alrededor (por ejemplo, en un modal), así que se dejó como bloque independiente en vez de elemento de `.contact`.
- **Los estados del menú** (`nav__link--active`, y el estado abierto del menú móvil controlado por el checkbox `.nav-toggle`) se resolvieron como modificadores/atributos en vez de clases nuevas por cada estado, para no duplicar los estilos base del enlace.

## Cambios en la versión Laravel

- **Contenido de empresa de eventos**: `.features` ahora presenta qué se ofrece (recintos, servicios, cotización/contrato); `.pricing` se usa para las tarifas por recinto (se mantiene el nombre del bloque para reutilizar los estilos); `.testimonials` son opiniones de clientes (de ejemplo).
- **`.alert` + `--success`**: nuevo bloque para el mensaje flash que muestra Laravel tras enviar el formulario.
- **`.field--error`**: modificador del bloque `.field`. Lo aplica Blade cuando `$errors->has('campo')`, para mostrar el error que devuelve el servidor (el CSS `:invalid` solo cubre la validación del navegador).
- **Vistas**: un partial por bloque de sección (`sections/hero`, `servicios`, `recintos`, `testimonios`, `contacto`) más `partials/header` y `partials/footer`.
