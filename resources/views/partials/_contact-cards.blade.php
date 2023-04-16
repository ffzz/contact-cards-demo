<div id="contact-list">
  <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
    <div class="text-base font-semibold leading-7 text-gray-900">Contact list</div>
    <div class="mt-10 grid grid-cols-1 gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
      @foreach ($contacts as $contact)
        <div class="overflow-hidden rounded-lg bg-white shadow-md" id="contact-item-{{ $contact->id }}">
          <div class="px-4 py-5 sm:p-6">
            <div class="mb-4 flex items-center justify-between" id="contact-{{ $contact->id }}">
              <h3 class="text-lg font-medium text-gray-900" id="contact-name-{{ $contact->id }}">{{ $contact->name }}
              </h3>
              <div class="justisfy-center flex items-center space-x-2">
                <button class="text-blue-500 hover:text-blue-600" title="Edit"
                  onclick="showEditModal('{{ $contact->id }}')">
                  <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M14.121 7.879l-1.414-1.414L5 14.586V17h2.414l8.121-8.121zM4 18h12a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1z">
                    </path>
                  </svg>
                </button>
                <button class="contact-delete h-[20px] leading-[20px] text-red-500 hover:text-red-600"
                  data-id="{{ $contact->id }}" type="submit" title="Delete">
                  <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M3 5a2 2 0 012-2h10a2 2 0 012 2v1h2a1 1 0 011 1v2a1 1 0 01-1 1h-.586l-.707 7.07A1 1 0 0113.707 19H6.293a1 1 0 01-.97-.757L4.616 10H4a1 1 0 01-1-1V6a1 1 0 011-1h2V5zm2 0h8v1H5V5zm1.293 9.293A1 1 0 016.586 15h6.828a1 1 0 01.707-1.707l.707-.707V10H7.293l-.707 4.293z"
                      clip-rule="evenodd"></path>
                  </svg>
                </button>
              </div>
            </div>
            <div class="text-gray-500" id="contact-email-{{ $contact->id }}">{{ $contact->email }}</div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="fixed inset-0 z-10 flex hidden items-start justify-center overflow-y-auto pt-[20rem]" id="editModal">

  <div class="fixed inset-0 transition-opacity" aria-hidden="true">
    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
  </div>

  <div
    class="modal-dialog transform overflow-hidden rounded-lg bg-white shadow-lg transition-all sm:w-full sm:max-w-lg">
    <div class="px-4 py-5 sm:p-6">
      <div class="sm:flex sm:items-center sm:justify-between">
        <h3 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">Edit Contact</h3>
        <button
          class="text-gray-400 transition duration-150 ease-in-out hover:text-gray-500 focus:text-gray-500 focus:outline-none"
          type="button" onclick="hideEditModal()">
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>

      <div class="mt-4">
        <div id="edit-contact-form">
          <input name="_method" type="hidden" value="PUT">
          <input id="edit_id" name="id" type="hidden">
          <div>
            <label class="block text-sm font-medium text-gray-700" for="edit_name">Name</label>
            <div class="mt-1">
              <input
                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                id="edit_name" name="name" type="text" required>
            </div>
          </div>
          <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700" for="edit_email">Email</label>
            <div class="mt-1">
              <input
                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                id="edit_email" name="email" type="email" required>
            </div>
          </div>

          <div class="mt-4">
            <button
              class="mr-2 rounded-md bg-gray-200 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50"
              id="edit-cancel" type="button">Cancel</button>
            <button
              class="rounded-md bg-blue-500 px-4 py-2 text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50"
              id="edit-save" type="submit">Save</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<script>
  $('#edit-save').on('click', function(e) {
    e.preventDefault();
    const name = $('#edit_name').val();
    const email = $('#edit_email').val();
    const id = $('#edit_id').val();

    axios(`api/contacts/${id}`, {
      method: 'PUT',
      data: {
        name,
        email
      }
    }).then(res => {
      const {
        name,
        email,
        id
      } = res.data.data;
      $(`#contact-name-${id}`).text(name);

      $(`#contact-email-${id}`).text(email);

      hideEditModal()
    }).catch(error => {
      console.error('update contact failed: ', error)
    });
  })

  $('.contact-delete').on('click', function(e) {
    e.preventDefault();
    const id = $(this).data('id');

    axios(`api/contacts/${id}`, {
      method: 'DELETE',
    }).then(res => {
      $(`#contact-item-${id}`).remove();
    })

  })

  function showEditModal(id) {
    document.getElementById("edit_id").value = id;
    document.getElementById("edit_name").value = $(`#contact-name-${id}`).text();
    document.getElementById("edit_email").value = $(`#contact-email-${id}`).text();
    document.getElementById("editModal").classList.remove("hidden");
  }

  $('#edit-cancel').on('click', hideEditModal)

  function hideEditModal() {
    document.getElementById("editModal").classList.add("hidden");
  }
</script>
