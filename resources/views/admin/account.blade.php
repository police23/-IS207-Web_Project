@extends('admin.adminlayout')
@section('account')
<style>
        /* Đặt toàn bộ trang vào giữa */
    .profile-container body{
      align-items: center;
    }

        /* Hộp profile */
        .profile-container {
            width: 300px;
            padding: 20px;
            text-align: center;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Hình đại diện */
        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 15px;
          
        }

        .edit-profile {
  background-color: white;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.edit-profile h3 {
  color: #333;
  margin-bottom: 20px;
}

.profile-picture {
  text-align: center;
  margin-bottom: 20px;
}

.profile-picture img {
  border-radius: 50%;
  width: 100px;
  height: 100px;
}

form {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 15px;
}

.form-group {
  display: flex;
  flex-direction: column;
}

.form-group label {
  margin-bottom: 5px;
  font-size: 0.9em;
  color: #333;
}

.form-group input {
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
}

.save-button {
  grid-column: span 2;
  padding: 10px;
  border: none;
  background-color: #7e3af2;
  color: white;
  font-size: 1em;
  border-radius: 5px;
  cursor: pointer;
  margin-top: 20px;
}

.save-button:hover {
  background-color: #1E90FF;
}
    </style>
<main class="h-full overflow-y-auto">
  <div class="container grid px-6 mx-auto">
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Admin profile
    </h2>
    <!-- CTA -->

</head>
<body>

<section class="edit-profile">
        <h3>Edit Profile</h3>
        <div class="profile-picture">
          <img src="https://picsum.photos/200" alt="Profile Picture">
        </div>
        <form>
          <div class="form-group">
            <label for="first-name">First Name</label>
            <input type="text" id="first-name" placeholder="First Name">
          </div>
          <div class="form-group">
            <label for="last-name">Last Name</label>
            <input type="text" id="last-name" placeholder="Last Name">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="contact-number">Contact Number</label>
            <input type="text" id="contact-number" placeholder="Contact Number">
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" placeholder="Address">
          </div>
          <div class="form-group">
            <label for="city">City</label>
            <input type="text" id="city" placeholder="City">
          </div>
          <div class="form-group">
            <label for="state">State</label>
            <input type="text" id="state" placeholder="State">
          </div>
          <div class="form-group">
            <label for="zipcode">Zip Code</label>
            <input type="text" id="zipcode" placeholder="Zip Code">
          </div>
          <div class="form-group">
            <label for="country">Country</label>
            <input type="text" id="country" placeholder="Country">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" placeholder="Password">
          </div>
          <button type="submit" class="save-button">Save</button>
        </form>
      </section>
</body>
</main>
@endsection