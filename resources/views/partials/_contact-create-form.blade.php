<div class="px-6" id='create-contact-form'>
  <div class="text-base font-semibold leading-7 text-gray-900">Create contact</div>
  <div class="border-b border-gray-900/10 pb-12">
    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
      <div class="sm:col-span-5">
        <label class="block text-sm font-medium leading-6 text-gray-900" for="name">Name</label>
        <div class="mt-2">
          <input
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            id="name" name="name" type="text" autocomplete="given-name">
        </div>
      </div>

      <div class="sm:col-span-5">
        <label class="block text-sm font-medium leading-6 text-gray-900" for="email">Email</label>
        <div class="mt-2">
          <input
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            id="email" name="email" type="email" autocomplete="email">
        </div>
      </div>
    </div>
  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button
      class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
      id='create-contact'>Save</button>
  </div>
</div>

<script>
  $('#create-contact').on('click', function() {
    const email = $('#email').val();
    const name = $('#name').val();

    axios('api/contacts', {
      method: 'POST',
      data: {
        email: email.trim(),
        name: name.trim(),
      }
    }).then(res => {
      //   $('#contact-list').load(location.href + "#contact-list>*", "");
      //   $('#create-contact-form').remove();
      window.location.reload()
      console.log(res)
    }).catch(error => {
      console.log(error)
    })
  })
</script>
