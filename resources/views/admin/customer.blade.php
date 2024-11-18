@extends('admin.adminlayout')
@section('customer')
<main class="h-full overflow-y-auto">
  <div class="container grid px-6 mx-auto">
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Customers
    </h2>
    <!-- CTA -->
    <div class="flex items-center p-4 mb-8 border border-purple-600 rounded-lg focus-within:border-purple-700 focus:outline-none">
      <svg
        class="w-5 h-5 mr-2 text-gray-500"
        fill="currentColor"
        viewBox="0 0 20 20">
        <path
          d="M12.9 14.32a8 8 0 111.42-1.42l4.1 4.1a1 1 0 01-1.42 1.42l-4.1-4.1zM8 14a6 6 0 100-12 6 6 0 000 12z">
        </path>
      </svg>
      <input
        class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
        type="text"
        placeholder="Search for customers"
        aria-label="Search" />

    </div>




    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">User ID</th>
              <th class="px-4 py-3">Role ID</th>
              <th class="px-4 py-3">Username</th>
              <th class="px-4 py-3">Password</th>
              <th class="px-4 py-3">Full Name</th>
              <th class="px-4 py-3">Gender</th>
              <th class="px-4 py-3">Address</th>
              <th class="px-4 py-3">Phone Number</th>
              <th class="px-4 py-3">Actions</th>
            </tr>
          </thead>
          <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            <tr class="text-gray-700 dark:text-gray-400">
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->user_id }}</td>
                    <td>{{ $user->role_id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->full_name }}</td>
                    <td>{{ $user->gender == 1 ? 'Male' : 'Female' }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->phone_number }}</td>
                </tr>
            @endforeach
            </tr>
          </tbody>
        </table>
      </div>
      <div>
      </div>

</main>
@endsection