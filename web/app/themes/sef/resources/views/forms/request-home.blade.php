<x-html-forms :form="$form" class="request-home" :messages="['success' => 'Thank you!', 'error' => 'Yikes! Try again.']">

  <label class="request-home__label" for="lastName">
    Nom*
  </label>

  <input
    class="request-home__input"
    name="last_name"
    id="lastName"
    type="text"
    placeholder="Doe"
  >

  <label for="firstName">
    Prénom*
  </label>

  <input
    id="firstName"
    name="first_name"
    type="text"
    placeholder="John"
  >

  <label for="email">
    Email*
  </label>

  <input
    id="email"
    name="emailAddress"
    type="email"
    placeholder="John.doe@mail.com"
  >

  <label for="phone">
    Téléphone
  </label>

  <input
    id="phone"
    name="phone"
    type="tel"
    placeholder="+32 85 21 57 52"
  >

  <input
    type="submit"
    value="Submit"
  />
</x-html-forms>
