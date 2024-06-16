<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Typing Master</title>
</head>
<body>
<div class="container emp-profile">
            <form method="post">
            <button type="button" id="logout-button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                     <path fill="currentColor" d="M20 12H8.828l2.586-2.586-1.414-1.414L4.586 12l5.414 5.414 1.414-1.414L8.828 14H20v-2z"/>
                    </svg> Back
                </button>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="file"/>
                        </div>
                        <div class="profile-head">
                                    <h5>
                                        Kshiti Ghelani
                                    </h5>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                    </div>
                </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Kshiti123</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Kshiti Ghelani</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>kshitighelani@gmail.com</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>123 456 7890</p>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
</body>
<style>
    body {
    font-family: 'Arial', sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    width: 100%;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    border-radius: 8px;
}

/* Profile Image */
.profile-img {
    text-align: center;
    margin-bottom: 20px;
}

.profile-img img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #fff;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

/* Change Photo Button */
.profile-img .file {
    display: block;
    width: 150px;
    margin-top: 10px;
    padding: 8px 12px;
    font-size: 14px;
    font-weight: 600;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    text-align: center;
    cursor: pointer;
    text-decoration: none;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.profile-img .file:hover {
    background-color: #0056b3;
}

/* Profile Head */
.profile-head {
    text-align: center;
    margin-bottom: 30px;
}

.profile-head h5 {
    font-size: 24px;
    color: #333;
    margin-bottom: 5px;
}

.profile-head h6 {
    font-size: 18px;
    color: #666;
    margin-bottom: 10px;
}

.profile-head .proile-rating {
    font-size: 16px;
    color: #555;
    margin-bottom: 10px;
}

/* Navigation Tabs */
.nav-tabs {
    border-bottom: 2px solid #dee2e6;
    margin-bottom: 20px;
}

.nav-tabs .nav-item {
    margin-bottom: -1px;
}

.nav-tabs .nav-link {
    font-size: 16px;
    color: #555;
    font-weight: 600;
    border: none;
    border-radius: 0;
    background-color: transparent;
    transition: all 0.3s ease;
}

.nav-tabs .nav-link.active {
    color: #007bff;
    border-bottom-color: #007bff;
}

/* Profile Tab */
.profile-tab label {
    font-size: 16px;
    font-weight: 600;
    color: #333;
    margin-bottom: 5px;
}

.profile-tab p {
    font-size: 16px;
    color: #555;
    margin-bottom: 10px;
}

/* Profile Edit Button */
.profile-edit-btn {
    display: block;
    width: 100%;
    margin-top: 10px; /* Menambahkan margin atas */
    padding: 10px;
    font-size: 16px;
    font-weight: 600;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    text-align: center;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s ease;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.profile-edit-btn:hover {
    background-color: #0056b3;
}
/* Responsiveness for smaller screens */
@media (max-width: 768px) {
    .profile-img img {
        width: 120px;
        height: 120px;
    }
}
/*Logout button*/
#logout-button {
      border: none;
      background-color: transparent;
      cursor: pointer;
      padding: 0;
      color: inherit; /* Gunakan warna teks yang diwariskan */
      font-family: 'Poppins';
      font-weight: 600;
      font-size: 25px;
      text-align: center;
      display: flex;
      align-items: center;
    }

    /* Gaya tambahan untuk ikon SVG */
    #logout-button svg {
      fill: currentColor;
      margin-right: 8px; /* Spasi antara ikon dan teks */
    }

    /* Gaya tambahan untuk efek hover */
    #logout-button:hover {
      text-decoration: underline; /* Garis bawah saat hover */
    }
</style>
</html>