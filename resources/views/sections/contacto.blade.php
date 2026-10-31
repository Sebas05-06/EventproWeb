<section class="contact" id="contacto">
  <div class="contact__inner">
    <div class="contact__intro">
      <h2 class="contact__title">Cuéntanos qué evento tienes en mente</h2>
      <p class="contact__text">Dinos la fecha aproximada, el tipo de evento y cuántas personas esperas. Te respondemos con una propuesta de recinto y servicios.</p>
    </div>

    <form class="contact-form" method="POST" action="{{ route('contacto.store') }}" novalidate>
      @csrf

      @if (session('exito'))
        <div class="alert alert--success" role="status">{{ session('exito') }}</div>
      @endif

      <div class="contact-form__row">
        <label class="field {{ $errors->has('nombre') ? 'field--error' : '' }}">
          <span class="field__label">Nombre</span>
          <input class="field__control" type="text" name="nombre" value="{{ old('nombre') }}" placeholder="Tu nombre" required minlength="2">
          <span class="field__error">{{ $errors->first('nombre') ?: 'Escribe tu nombre para continuar.' }}</span>
        </label>

        <label class="field {{ $errors->has('email') ? 'field--error' : '' }}">
          <span class="field__label">Correo</span>
          <input class="field__control" type="email" name="email" value="{{ old('email') }}" placeholder="tu@correo.com" required>
          <span class="field__error">{{ $errors->first('email') ?: 'Escribe un correo válido.' }}</span>
        </label>
      </div>

      <label class="field {{ $errors->has('tipo_evento') ? 'field--error' : '' }}">
        <span class="field__label">Tipo de evento</span>
        <select class="field__control" name="tipo_evento">
          <option value="">Selecciona uno</option>
          @foreach (['congreso' => 'Congreso', 'boda' => 'Boda', 'feria' => 'Feria', 'concierto' => 'Concierto', 'otro' => 'Otro'] as $valor => $texto)
            <option value="{{ $valor }}" @selected(old('tipo_evento') === $valor)>{{ $texto }}</option>
          @endforeach
        </select>
        <span class="field__error">{{ $errors->first('tipo_evento') }}</span>
      </label>

      <label class="field {{ $errors->has('mensaje') ? 'field--error' : '' }}">
        <span class="field__label">Mensaje</span>
        <textarea class="field__control field__control--textarea" name="mensaje" rows="4" placeholder="Fecha, número de asistentes y servicios que necesitas" required minlength="10">{{ old('mensaje', request('recinto') ? 'Me interesa cotizar el recinto ' . request('recinto') . '. ' : '') }}</textarea>
        <span class="field__error">{{ $errors->first('mensaje') ?: 'Cuéntanos un poco más (mínimo 10 caracteres).' }}</span>
      </label>

      <div class="contact-form__actions">
        <button class="btn btn--primary btn--large" type="submit">Pedir cotización</button>
        <p class="contact-form__hint">Los campos marcados son obligatorios.</p>
      </div>
    </form>
  </div>
</section>
