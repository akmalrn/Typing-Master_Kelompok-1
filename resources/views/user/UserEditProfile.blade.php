Certainly! Below is an updated version of your HTML with a modal for editing the profile:

```html
<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

:root {
    --light: #f6f6f9;
    --primary: #1976D2;
    --light-primary: #CFE8FF;
    --grey: #eee;
    --dark-grey: #AAAAAA;
    --dark: #363949;
    --danger: #D32F2F;
	--light-danger: #FECDD3;
    --warning: #FBC02D;
    --light-warning: #FFF2C6;
    --success: #388E3C;
    --light-success: #BBF7D0;
}

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

.bx{
    font-size: 1.7rem;
}

a{
    text-decoration: none;
}

li{
    list-style: none;
}

html{
    overflow-x: hidden;
}

body.dark{
    --light: #181a1e;
    --grey: #25252c;
    --dark: #fbfbfb
}

body{
    background: var(--grey);
    overflow-x: hidden;
}

.sidebar{
    position: fixed;
    top: 0;
    left: 0;
    background: var(--light);
    width: 230px;
    height: 100%;
    z-index: 2000;
    overflow-x: hidden;
    scrollbar-width: none;
    transition: all 0.3s ease;
}

.sidebar::-webkit-scrollbar{
    display: none;
}

.sidebar.close{
    width: 60px;
}

.sidebar .logo{
    font-size: 24px;
    font-weight: 700;
    height: 56px;
    display: flex;
    align-items: center;
    color: var(--primary);
    z-index: 500;
    padding-bottom: 20px;
    box-sizing: content-box;
}

.sidebar .logo .logo-name span{
    color: var(--dark);
}

.sidebar .logo .bx{
    min-width: 60px;
    display: flex;
    justify-content: center;
    font-size: 2.2rem;
}

.sidebar .side-menu{
    width: 100%;
    margin-top: 48px;
}

.sidebar .side-menu li{
    height: 48px;
    background: transparent;
    margin-left: 6px;
    border-radius: 48px 0 0 48px;
    padding: 4px;
}

.sidebar .side-menu li.active{
    background: var(--grey);
    position: relative;
}

.sidebar .side-menu li.active::before{
    content: "";
    position: absolute;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    top: -40px;
    right: 0;
    box-shadow: 20px 20px 0 var(--grey);
    z-index: -1;
}

.sidebar .side-menu li.active::after{
    content: "";
    position: absolute;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    bottom: -40px;
    right: 0;
    box-shadow: 20px -20px 0 var(--grey);
    z-index: -1;
}

.sidebar .side-menu li a{
    width: 100%;
    height: 100%;
    background: var(--light);
    display: flex;
    align-items: center;
    border-radius: 48px;
    font-size: 16px;
    color: var(--dark);
    white-space: nowrap;
    overflow-x: hidden;
    transition: all 0.3s ease;
}

.sidebar .side-menu li.active a{
    color: var(--success);
}

.sidebar.close .side-menu li a{
    width: calc(48px - (4px * 2));
    transition: all 0.3s ease;
}

.sidebar .side-menu li a .bx{
    min-width: calc(60px - ((4px + 6px) * 2));
    display: flex;
    font-size: 1.6rem;
    justify-content: center;
}

.sidebar .side-menu li a.logout{
    color: var(--danger);
}

.content{
    position: relative;
    width: calc(100% - 230px);
    left: 230px;
    transition: all 0.3s ease;
}

.sidebar.close~.content{
    width: calc(100% - 60px);
    left: 60px;
}

.content nav{
    height: 56px;
    background: var(--light);
    padding: 0 24px 0 0;
    display: flex;
    align-items: center;
    grid-gap: 24px;
    position: sticky;
    top: 0;
    left: 0;
    z-index: 1000;
}

.content nav::before{
    content: "";
    position: absolute;
    width: 40px;
    height: 40px;
    bottom: -40px;
    left: 0;
    border-radius: 50%;
    box-shadow: -20px -20px 0 var(--light);
}

.content nav a{
    color: var(--dark);
}

.content nav .bx.bx-menu{
    cursor: pointer;
    color: var(--dark);
}

.content nav form{
    max-width: 400px;
    width: 100%;
    margin-right: auto;
}

.content nav form .form-input{
    display: flex;
    align-items: center;
    height: 36px;
}

.content nav form .form-input input{
    flex-grow: 1;
    padding: 0 16px;
    height: 100%;
    border: none;
    background: var(--grey);
    border-radius: 36px 0 0 36px;
    outline: none;
    width: 100%;
    color: var(--dark);
}

.content nav form .form-input button{
    width: 80px;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background: var(--primary);
    color: var(--light);
    font-size: 18px;
    border: none;
    outline: none;
    border-radius: 0 36px 36px 0;
    cursor: pointer;
}

.content nav .notif{
    font-size: 20px;
    position: relative;
}

.content nav .notif .count{
    position: absolute;
    top: -6px;
    right: -6px;
    width: 20px;
    height: 20px;
    background: var(--danger);
    border-radius: 50%;
    color: var(--light);
    border: 2px solid var(--light);
    font-weight: 700;
    font-size: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.content nav .profile img{
    width: 36px;
    height: 36px;
    object-fit: cover;
    border-radius: 50%;
}

.content nav .theme-toggle{
    display: block;
    min-width: 50px;
    height: 25px;
    background: var(--grey);
    cursor: pointer;
    position: relative;
    border-radius: 25px;
}

.content nav .theme-toggle::before{
    content: "";
    position: absolute;
    top: 2px;
    left: 2px;
    bottom: 2px;
    width: calc(25px - 4px);
    background: var(--primary);
    border-radius: 50%;
    transition: all 0.3s ease;
}

.content nav #theme-toggle:checked+.theme-toggle::before{
    left: calc(100% - (25px - 4px) - 2px);
}

.content main{
    width: 100%;
    padding: 36px 24px;
    max-height: calc(100vh - 56px);
}

.content main .header{
    display: flex;
    align-items: center;
    justify-content: space-between;
    grid-gap: 16px;
    flex-wrap: wrap;
}

.content main .header .left h1{
    font-size: 36px;
    font-weight: 600;
    margin-bottom: 10px;
    color: var(--dark);
}

.content main .header .left .breadcrumb{
    display: flex;
    align-items: center;
    grid-gap: 16px;
}

.content main .header .left .breadcrumb li{
    color: var(--dark);
}

.content main .header .left .breadcrumb li a{
    color: var(--dark-grey);
    pointer-events: none;
}

.content main .header .left .breadcrumb li a.active{
    color: var(--primary);
    pointer-events: none;
}

.content main .header .report{
    height: 36px;
    padding: 0 16px;
    border-radius: 36px;
    background: var(--primary);
    color: var(--light);
    display: flex;
    align-items: center;
    justify-content: center;
    grid-gap: 10px;
    font-weight: 500;
}

.content main .insights{
    display:

 grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    grid-gap: 24px;
    margin-top: 36px;
}

.content main .insights .card{
    background: var(--light);
    padding: 24px;
    display: flex;
    align-items: center;
    grid-gap: 24px;
    border-radius: 24px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    cursor: pointer;
    transition: all 0.3s ease;
}

.content main .insights .card:hover{
    box-shadow: 0 4px 8px rgba(0,0,0,0.3);
}

.content main .insights .card .icon{
    width: 50px;
    height: 50px;
    background: var(--primary);
    border-radius: 50%;
    color: var(--light);
    display: flex;
    align-items: center;
    justify-content: center;
}

.content main .insights .card .middle{
    display: flex;
    flex-direction: column;
    grid-gap: 10px;
}

.content main .insights .card .middle .left{
    font-size: 20px;
    font-weight: 600;
    color: var(--dark);
}

.content main .insights .card .middle .right{
    font-size: 12px;
    color: var(--dark-grey);
}

.content main .insights .card .percentage{
    font-size: 12px;
    color: var(--dark-grey);
}

.content main .recent-orders{
    background: var(--light);
    border-radius: 24px;
    padding: 24px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    margin-top: 24px;
}

.content main .recent-orders h2{
    font-size: 24px;
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 24px;
}

.content main .recent-orders table{
    width: 100%;
    border-collapse: collapse;
}

.content main .recent-orders table th{
    padding-bottom: 12px;
    text-align: left;
    color: var(--dark);
    font-weight: 500;
    font-size: 14px;
    border-bottom: 1px solid var(--grey);
}

.content main .recent-orders table td{
    padding: 12px 0;
    color: var(--dark-grey);
    font-size: 14px;
}

.content main .recent-orders table td.primary{
    color: var(--primary);
    font-weight: 500;
}

.content main .recent-orders table td.warning{
    color: var(--warning);
    font-weight: 500;
}

.content main .recent-orders table td.success{
    color: var(--success);
    font-weight: 500;
}

.content main .recent-orders table td.danger{
    color: var(--danger);
    font-weight: 500;
}

.content main .recent-orders table td.edit, .content main .recent-orders table td.delete {
    cursor: pointer;
}

.content main .recent-orders table tr:hover td {
    background: var(--grey);
}

.content main .recent-orders .edit-button {
    background: var(--primary);
    color: var(--light);
    padding: 6px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.modal {
  display: none; 
  position: fixed; 
  z-index: 1000; 
  padding-top: 100px; 
  left: 0;
  top: 0;
  width: 100%; 
  height: 100%; 
  overflow: auto; 
  background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
  background-color: var(--light);
  margin: auto;
  padding: 20px;
  border: 1px solid var(--grey);
  width: 80%; 
  max-width: 500px;
  border-radius: 12px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.modal-header, .modal-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 1px solid var(--grey);
  padding: 10px;
}

.modal-header h2 {
  margin: 0;
}

.modal-footer {
  border-top: 1px solid var(--grey);
}

.modal-footer button {
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.modal-footer button.save {
  background-color: var(--primary);
  color: var(--light);
}

.modal-footer button.cancel {
  background-color: var(--danger);
  color: var(--light);
}

.close {
  color: var(--dark-grey);
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover, .close:focus {
  color: var(--dark);
  text-decoration: none;
  cursor: pointer;
}

input[type=text], input[type=email], input[type=password] {
  width: 100%;
  padding: 12px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid var(--grey);
  border-radius: 4px;
  box-sizing: border-box;
}
  </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <div class="sidebar">
    <div class="logo">
      <i class='bx bx-menu'></i>
      <span class="logo-name">Dashboard</span>
    </div>
    <ul class="side-menu">
      <li>
        <a href="#">
          <i class='bx bxs-dashboard'></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-user'></i>
          <span>Profile</span>
        </a>
      </li>
      <li>
        <a href="#" class="logout">
          <i class='bx bx-log-out'></i>
          <span>Logout</span>
        </a>
      </li>
    </ul>
  </div>

  <div class="content">
    <nav>
      <i class='bx bx-menu'></i>
      <form action="#">
        <div class="form-input">
          <input type="search" placeholder="Search...">
          <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
        </div>
      </form>
      <input type="checkbox" id="theme-toggle">
      <label class="theme-toggle" for="theme-toggle"></label>
      <div class="notif">
        <i class='bx bxs-bell'></i>
        <span class="count">5</span>
      </div>
      <a href="#" class="profile">
        <img src="https://via.placeholder.com/36" alt="Profile">
      </a>
    </nav>

    <main>
      <div class="header">
        <div class="left">
          <h1>Profile</h1>
          <ul class="breadcrumb">
            <li><a href="#" class="active">Home</a></li>
            <li><a href="#">Profile</a></li>
          </ul>
        </div>
      </div>
      <div class="insights">
        <!-- Cards will go here -->
      </div>
      <div class="recent-orders">
        <h2>Recent Activities</h2>
        <table>
          <thead>
            <tr>
              <th>Activity</th>
              <th>Date</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Activity 1</td>
              <td>01/01/2023</td>
              <td class="success">Completed</td>
              <td class="edit"><button class="edit-button" onclick="openModal()">Edit</button></td>
            </tr>
            <tr>
              <td>Activity 2</td>
              <td>02/01/2023</td>
              <td class="warning">Pending</td>
              <td class="edit"><button class="edit-button" onclick="openModal()">Edit</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>

  <!-- The Modal -->
  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <h2>Edit Profile</h2>
        <span class="close" onclick="closeModal()">&times;</span>
      </div>
      <div class="modal-body">
        <form id="edit-profile-form">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" placeholder="Enterusername">

          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Enter email">

          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Enter password">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="cancel" onclick="closeModal()">Cancel</button>
        <button type="button" class="save">Save</button>
      </div>
    </div>

  </div>

  <script>
    function openModal() {
      document.getElementById("myModal").style.display = "block";
    }

    function closeModal() {
      document.getElementById("myModal").style.display = "none";
    }

    window.onclick = function(event) {
      if (event.target == document.getElementById("myModal")) {
        closeModal();
      }
    }
  </script>
</body>

</html>